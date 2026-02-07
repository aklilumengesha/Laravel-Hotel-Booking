@extends('admin.layout.app')

@section('heading', 'Dashboard')

@section('main_content')

<!-- Simple Statistics Cards -->
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 simple-card">
            <div class="card-icon bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Revenue</h4>
                </div>
                <div class="card-body">
                    ${{ number_format($total_revenue, 0) }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 simple-card">
            <div class="card-icon bg-success">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Orders</h4>
                </div>
                <div class="card-body">
                    {{ $total_completed_orders + $total_pending_orders }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 simple-card">
            <div class="card-icon bg-info">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Customers</h4>
                </div>
                <div class="card-body">
                    {{ $total_active_customers + $total_pending_customers }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 simple-card">
            <div class="card-icon bg-warning">
                <i class="fas fa-bed"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Rooms</h4>
                </div>
                <div class="card-body">
                    {{ $total_rooms }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats Row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card simple-stat-card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-1">${{ number_format($monthly_revenue, 0) }}</h3>
                        <p class="mb-0">This Month</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card simple-stat-card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-1">{{ $total_completed_orders }}</h3>
                        <p class="mb-0">Completed Orders</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card simple-stat-card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-1">{{ $total_pending_orders }}</h3>
                        <p class="mb-0">Pending Orders</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card simple-stat-card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-1">{{ $total_subscribers }}</h3>
                        <p class="mb-0">Subscribers</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row">
    <!-- Revenue Chart -->
    <div class="col-lg-8 col-md-12">
        <div class="card simple-card">
            <div class="card-header">
                <h4>Revenue Overview</h4>
            </div>
            <div class="card-body">
                <canvas id="revenueChart" height="100"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Order Status Chart -->
    <div class="col-lg-4 col-md-12">
        <div class="card simple-card">
            <div class="card-header">
                <h4>Order Status</h4>
            </div>
            <div class="card-body text-center">
                <canvas id="orderStatusChart" height="150"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="row">
    <div class="col-12">
        <div class="card simple-card">
            <div class="card-header">
                <h4>Recent Orders</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.orders') }}" class="btn btn-primary btn-sm">View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $row)
                            <tr>
                                <td><strong>#{{ $row->order_no }}</strong></td>
                                <td>
                                    @if($row->customer)
                                        {{ $row->customer->name }}
                                    @else
                                        Guest
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($row->booking_date)->format('M d, Y') }}</td>
                                <td><strong>${{ number_format($row->paid_amount, 2) }}</strong></td>
                                <td>
                                    @if($row->status == 'Completed')
                                        <span class="badge badge-success">{{ $row->status }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $row->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.invoice',$row->id) }}" class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    No orders found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Simple Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart
    const revenueData = @json($monthly_revenue_chart);
    const orderStatusData = @json($order_status);

    if (revenueData && revenueData.length > 0) {
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: revenueData.map(item => item.month),
                datasets: [{
                    label: 'Revenue',
                    data: revenueData.map(item => item.revenue),
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    }

    // Order Status Chart
    if (orderStatusData && orderStatusData.length > 0) {
        const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
        new Chart(orderStatusCtx, {
            type: 'doughnut',
            data: {
                labels: orderStatusData.map(item => item.status),
                datasets: [{
                    data: orderStatusData.map(item => item.count),
                    backgroundColor: ['#28a745', '#ffc107'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
});
</script>

<style>
/* Simple Admin Dashboard Styles */
.simple-card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.simple-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

.simple-stat-card {
    border: none;
    border-radius: 10px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.simple-stat-card:hover {
    transform: translateY(-2px);
}

.simple-stat-card .stat-icon {
    font-size: 2rem;
    opacity: 0.8;
}

.card-statistic-1.simple-card {
    border: none;
    border-radius: 10px;
}

.card-statistic-1 .card-icon {
    border-radius: 10px;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.card-statistic-1 .card-body {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
}

.card-header {
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    border-radius: 10px 10px 0 0;
    padding: 15px 20px;
}

.card-header h4 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
}

.table th {
    border-top: none;
    font-weight: 600;
    color: #333;
    font-size: 0.9rem;
}

.table td {
    vertical-align: middle;
    font-size: 0.9rem;
}

.badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
}

.btn-sm {
    padding: 0.25rem 0.75rem;
    font-size: 0.8rem;
    border-radius: 5px;
}

/* Responsive */
@media (max-width: 768px) {
    .card-statistic-1 .card-body {
        font-size: 1.5rem;
    }
    
    .simple-stat-card h3 {
        font-size: 1.5rem;
    }
    
    .table-responsive {
        font-size: 0.8rem;
    }
}
</style>

@endsection