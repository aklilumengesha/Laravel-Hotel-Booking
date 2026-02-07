@extends('admin.layout.app')

@section('heading', 'Customer Management')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin-customer.css') }}">
@endpush

@section('main_content')
<div class="section-body">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ $customers->total() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Active Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ \App\Models\Customer::where('status', 1)->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-user-clock"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ \App\Models\Customer::where('status', 0)->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>New This Month</h4>
                    </div>
                    <div class="card-body">
                        {{ \App\Models\Customer::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Customer List</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.customer.export') }}" class="btn btn-success">
                            <i class="fas fa-file-excel"></i> Export CSV
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Search and Filter Form -->
                    <form method="GET" action="{{ route('admin.customer') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by name, email, or phone" value="{{ request('search') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="status" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="sort_by" class="form-control">
                                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date</option>
                                        <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                                        <option value="email" {{ request('sort_by') == 'email' ? 'selected' : '' }}>Email</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <select name="sort_order" class="form-control">
                                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>↓</option>
                                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>↑</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-search"></i> Filter
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Bulk Actions -->
                    <form method="POST" action="{{ route('admin.customer.bulk_delete') }}" id="bulkActionForm">
                        @csrf
                        <div class="mb-3">
                            <button type="button" class="btn btn-danger btn-sm" onclick="bulkDelete()">
                                <i class="fas fa-trash"></i> Delete Selected
                            </button>
                            <button type="button" class="btn btn-info btn-sm" id="selectAll">
                                <i class="fas fa-check-square"></i> Select All
                            </button>
                            <button type="button" class="btn btn-secondary btn-sm" id="deselectAll">
                                <i class="fas fa-square"></i> Deselect All
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="30">
                                            <input type="checkbox" id="checkAll">
                                        </th>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Reviews</th>
                                        <th>Status</th>
                                        <th>Registered</th>
                                        <th width="200">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($customers as $row)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="ids[]" value="{{ $row->id }}" class="customer-checkbox">
                                        </td>
                                        <td>{{ $customers->firstItem() + $loop->index }}</td>
                                        <td>
                                            @if($row->photo!='')
                                                <img src="{{ asset('uploads/'.$row->photo) }}" alt="" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('uploads/default.png') }}" alt="" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge badge-info">{{ $row->reviews_count }}</span>
                                        </td>
                                        <td>
                                            @if($row->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.customer.view', $row->id) }}" class="btn btn-info btn-sm" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.customer.change_status', $row->id) }}" class="btn btn-warning btn-sm" title="Toggle Status">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>
                                            <a href="{{ route('admin.customer.delete', $row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No customers found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $customers->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Check All functionality
    document.getElementById('checkAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.customer-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Select All button
    document.getElementById('selectAll').addEventListener('click', function() {
        const checkboxes = document.querySelectorAll('.customer-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = true);
        document.getElementById('checkAll').checked = true;
    });

    // Deselect All button
    document.getElementById('deselectAll').addEventListener('click', function() {
        const checkboxes = document.querySelectorAll('.customer-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = false);
        document.getElementById('checkAll').checked = false;
    });

    // Bulk Delete
    function bulkDelete() {
        const checkedBoxes = document.querySelectorAll('.customer-checkbox:checked');
        if (checkedBoxes.length === 0) {
            alert('Please select at least one customer to delete.');
            return;
        }
        
        if (confirm(`Are you sure you want to delete ${checkedBoxes.length} customer(s)?`)) {
            document.getElementById('bulkActionForm').submit();
        }
    }
</script>
@endpush
@endsection