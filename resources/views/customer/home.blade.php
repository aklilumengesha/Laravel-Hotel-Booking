@extends('customer.layout.app')

@section('heading', 'Dashboard')

@section('main_content')
<!-- Welcome Section -->
<div class="welcome-section mb-4">
    <div class="card welcome-card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="welcome-title">Welcome back, {{ Auth::guard('customer')->user()->name }}! 👋</h3>
                    <p class="welcome-text">Here's what's happening with your bookings and favorite rooms.</p>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('room') }}" class="btn btn-explore">
                        <i class="fas fa-search me-2"></i>Explore Rooms
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 stat-card">
            <div class="card-icon stat-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Completed Orders</h4>
                </div>
                <div class="card-body stat-number">
                    {{ $total_completed_orders }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 stat-card">
            <div class="card-icon stat-icon bg-warning">
                <i class="fas fa-clock"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pending Orders</h4>
                </div>
                <div class="card-body stat-number">
                    {{ $total_pending_orders }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 stat-card">
            <div class="card-icon stat-icon bg-danger">
                <i class="fas fa-heart"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Liked Rooms</h4>
                </div>
                <div class="card-body stat-number">
                    {{ $liked_rooms->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 stat-card">
            <div class="card-icon stat-icon bg-info">
                <i class="fas fa-bookmark"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Saved Rooms</h4>
                </div>
                <div class="card-body stat-number">
                    {{ $favorited_rooms->count() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liked Rooms Section -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card rooms-section-card">
            <div class="card-header section-header">
                <h4><i class="fas fa-heart text-danger me-2"></i>Your Liked Rooms</h4>
                @if($liked_rooms->count() > 0)
                <a href="{{ route('room') }}" class="btn btn-sm btn-view-all">View All Rooms</a>
                @endif
            </div>
            <div class="card-body">
                @if($liked_rooms->count() > 0)
                <div class="row">
                    @foreach($liked_rooms as $item)
                    @if($item->room)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="room-mini-card">
                            <div class="room-mini-image">
                                <img src="{{ asset('uploads/'.$item->room->featured_photo) }}" alt="{{ $item->room->name }}">
                                <div class="room-mini-price">${{ $item->room->price }}</div>
                            </div>
                            <div class="room-mini-content">
                                <h5 class="room-mini-title">{{ $item->room->name }}</h5>
                                <div class="room-mini-features">
                                    <span><i class="fas fa-users"></i> {{ $item->room->total_guests ?? $item->room->total_adult }}</span>
                                    <span><i class="fas fa-bed"></i> {{ $item->room->total_beds }}</span>
                                </div>
                                <a href="{{ route('room_detail', $item->room->id) }}" class="btn btn-mini-view">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-heart empty-icon"></i>
                    <h5>No Liked Rooms Yet</h5>
                    <p>Start exploring and like rooms you're interested in!</p>
                    <a href="{{ route('room') }}" class="btn btn-explore-empty">Explore Rooms</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Favorite Rooms Section -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card rooms-section-card">
            <div class="card-header section-header">
                <h4><i class="fas fa-bookmark text-primary me-2"></i>Your Saved Rooms</h4>
                @if($favorited_rooms->count() > 0)
                <a href="{{ route('room') }}" class="btn btn-sm btn-view-all">View All Rooms</a>
                @endif
            </div>
            <div class="card-body">
                @if($favorited_rooms->count() > 0)
                <div class="row">
                    @foreach($favorited_rooms as $item)
                    @if($item->room)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="room-mini-card">
                            <div class="room-mini-image">
                                <img src="{{ asset('uploads/'.$item->room->featured_photo) }}" alt="{{ $item->room->name }}">
                                <div class="room-mini-price">${{ $item->room->price }}</div>
                                <div class="room-mini-badge">
                                    <i class="fas fa-bookmark"></i>
                                </div>
                            </div>
                            <div class="room-mini-content">
                                <h5 class="room-mini-title">{{ $item->room->name }}</h5>
                                <div class="room-mini-features">
                                    <span><i class="fas fa-users"></i> {{ $item->room->total_guests ?? $item->room->total_adult }}</span>
                                    <span><i class="fas fa-bed"></i> {{ $item->room->total_beds }}</span>
                                </div>
                                <a href="{{ route('room_detail', $item->room->id) }}" class="btn btn-mini-view">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-bookmark empty-icon"></i>
                    <h5>No Saved Rooms Yet</h5>
                    <p>Save rooms to easily find them later!</p>
                    <a href="{{ route('room') }}" class="btn btn-explore-empty">Explore Rooms</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header section-header">
                <h4><i class="fas fa-bolt text-warning me-2"></i>Quick Actions</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('room') }}" class="quick-action-card">
                            <div class="quick-action-icon bg-primary">
                                <i class="fas fa-bed"></i>
                            </div>
                            <div class="quick-action-text">
                                <h6>Browse Rooms</h6>
                                <p>Find your perfect stay</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('customer.order.view') }}" class="quick-action-card">
                            <div class="quick-action-icon bg-success">
                                <i class="fas fa-receipt"></i>
                            </div>
                            <div class="quick-action-text">
                                <h6>My Orders</h6>
                                <p>View booking history</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('customer.profile') }}" class="quick-action-card">
                            <div class="quick-action-icon bg-info">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <div class="quick-action-text">
                                <h6>Edit Profile</h6>
                                <p>Update your info</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('contact') }}" class="quick-action-card">
                            <div class="quick-action-icon bg-warning">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="quick-action-text">
                                <h6>Contact Support</h6>
                                <p>Get help anytime</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Welcome Section */
.welcome-card {
    background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
    border: none;
    border-radius: 15px;
    overflow: hidden;
}
.welcome-title {
    color: white;
    font-weight: 700;
    margin-bottom: 10px;
}
.welcome-text {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
}
.btn-explore {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-explore:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    color: white;
    transform: translateY(-2px);
}

/* Stats Cards */
.stat-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}
.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}
.stat-icon {
    border-radius: 12px !important;
}
.stat-number {
    font-size: 2rem !important;
    font-weight: 700 !important;
    color: #1a365d;
}

/* Section Cards */
.rooms-section-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}
.section-header {
    background: #f8f9fa;
    border-bottom: 2px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 25px;
}
.section-header h4 {
    margin: 0;
    font-weight: 700;
    color: #1a365d;
}
.btn-view-all {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    border: none;
    border-radius: 20px;
    padding: 8px 20px;
    font-weight: 600;
}
.btn-view-all:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    color: white;
}

/* Room Mini Cards */
.room-mini-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
}
.room-mini-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}
.room-mini-image {
    position: relative;
    height: 150px;
    overflow: hidden;
}
.room-mini-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.room-mini-card:hover .room-mini-image img {
    transform: scale(1.1);
}
.room-mini-price {
    position: absolute;
    bottom: 10px;
    left: 10px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 13px;
}
.room-mini-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #1a365d;
    color: white;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.room-mini-content {
    padding: 15px;
}
.room-mini-title {
    font-size: 15px;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 10px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.room-mini-features {
    display: flex;
    gap: 15px;
    margin-bottom: 12px;
    font-size: 12px;
    color: #666;
}
.room-mini-features i {
    color: #b8a055;
    margin-right: 4px;
}
.btn-mini-view {
    width: 100%;
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: white !important;
    border: none;
    padding: 10px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: block;
    text-align: center;
    text-decoration: none;
}
.btn-mini-view:hover {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(184, 160, 85, 0.4);
    text-decoration: none;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 50px 20px;
}
.empty-icon {
    font-size: 60px;
    color: #ddd;
    margin-bottom: 20px;
}
.empty-state h5 {
    color: #1a365d;
    font-weight: 700;
    margin-bottom: 10px;
}
.empty-state p {
    color: #666;
    margin-bottom: 20px;
}
.btn-explore-empty {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
}
.btn-explore-empty:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    color: white;
}

/* Quick Actions */
.quick-action-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    height: 100%;
}
.quick-action-card:hover {
    background: #fff;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transform: translateY(-3px);
    text-decoration: none;
}
.quick-action-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.quick-action-icon i {
    font-size: 20px;
    color: white;
}
.quick-action-text h6 {
    margin: 0 0 5px 0;
    font-weight: 700;
    color: #1a365d;
}
.quick-action-text p {
    margin: 0;
    font-size: 12px;
    color: #666;
}

/* Responsive */
@media (max-width: 768px) {
    .welcome-card .row {
        text-align: center;
    }
    .welcome-card .text-right {
        text-align: center !important;
        margin-top: 15px;
    }
    .section-header {
        flex-direction: column;
        gap: 10px;
    }
}
</style>
@endsection
