@extends('admin.layout.app')

@section('heading', 'Customer Details')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin-customer.css') }}">
@endpush

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Customer Information</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.customer') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            @if($customer->photo!='')
                                <img src="{{ asset('uploads/'.$customer->photo) }}" alt="" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <img src="{{ asset('uploads/default.png') }}" alt="" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            @endif
                            <h5>{{ $customer->name }}</h5>
                            <p class="text-muted">{{ $customer->email }}</p>
                            @if($customer->status == 1)
                                <span class="badge badge-success badge-lg">Active</span>
                            @else
                                <span class="badge badge-danger badge-lg">Inactive</span>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <h6 class="mb-3">Personal Information</h6>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Full Name</th>
                                    <td>{{ $customer->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $customer->phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $customer->country ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $customer->address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $customer->city ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{ $customer->state ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Zip Code</th>
                                    <td>{{ $customer->zip ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Registration Date</th>
                                    <td>{{ $customer->created_at->format('F d, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ $customer->updated_at->format('F d, Y h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking History -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Booking History</h4>
                </div>
                <div class="card-body">
                    @if($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Order No</th>
                                        <th>Booking Date</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Total Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>#{{ $order->order_no }}</td>
                                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->booking_date)->format('M d, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->checkout_date)->format('M d, Y') }}</td>
                                        <td>${{ number_format($order->paid_amount, 2) }}</td>
                                        <td>
                                            <span class="badge badge-primary">{{ ucfirst($order->payment_method) }}</span>
                                        </td>
                                        <td>
                                            @if($order->status == 'Completed')
                                                <span class="badge badge-success">Completed</span>
                                            @elseif($order->status == 'Pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @else
                                                <span class="badge badge-danger">Cancelled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.invoice', $order->id) }}" class="btn btn-info btn-sm" target="_blank">
                                                <i class="fas fa-file-invoice"></i> Invoice
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center text-muted">No booking history found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Customer Reviews ({{ $customer->reviews->count() }})</h4>
                </div>
                <div class="card-body">
                    @if($customer->reviews->count() > 0)
                        @foreach($customer->reviews as $review)
                        <div class="media mb-4">
                            <div class="media-body">
                                <h6 class="mt-0">
                                    {{ $review->room->name ?? 'Room' }}
                                    <span class="text-warning ml-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </span>
                                </h6>
                                <p class="text-muted small">{{ $review->created_at->format('F d, Y') }}</p>
                                <p>{{ $review->comment }}</p>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    @else
                        <p class="text-center text-muted">No reviews yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Quick Actions</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.customer.change_status', $customer->id) }}" class="btn btn-warning">
                        <i class="fas fa-toggle-on"></i> Toggle Status
                    </a>
                    <a href="{{ route('admin.customer.delete', $customer->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer? This action cannot be undone.')">
                        <i class="fas fa-trash"></i> Delete Customer
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
