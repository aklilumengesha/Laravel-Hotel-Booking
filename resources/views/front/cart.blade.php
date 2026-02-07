@extends('front.layout.app')

@section('main_content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Cart" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">{{ $global_page_data->cart_heading }}</span>
                    </nav>
                    <h1 class="hero-title">{{ $global_page_data->cart_heading }}</h1>
                    <p class="hero-subtitle">Review your selected rooms before checkout</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart Content -->
<section class="cart-section py-5">
    <div class="container">
        <div class="row cart">
            <div class="col-md-12">
                @if(session()->has('cart_room_id'))

                <div class="cart-table-wrapper">
                    <div class="table-responsive">
                        <table class="table modern-cart-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Serial</th>
                                    <th>Photo</th>
                                    <th>Room Info</th>
                                    <th>Price/Night</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Guests</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $arr_cart_room_id = array();
                                $i=0;
                                foreach(session()->get('cart_room_id') as $value) {
                                    $arr_cart_room_id[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_checkin_date = array();
                                $i=0;
                                foreach(session()->get('cart_checkin_date') as $value) {
                                    $arr_cart_checkin_date[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_checkout_date = array();
                                $i=0;
                                foreach(session()->get('cart_checkout_date') as $value) {
                                    $arr_cart_checkout_date[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_adult = array();
                                $i=0;
                                foreach(session()->get('cart_adult') as $value) {
                                    $arr_cart_adult[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_children = array();
                                $i=0;
                                foreach(session()->get('cart_children') as $value) {
                                    $arr_cart_children[$i] = $value;
                                    $i++;
                                }

                                $total_price = 0;
                                for($i=0;$i<count($arr_cart_room_id);$i++)
                                {
                                    $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('cart.delete',$arr_cart_room_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Are you sure you want to remove this item?');">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    <td><span class="serial-badge">{{ $i+1 }}</span></td>
                                    <td>
                                        <div class="cart-room-image">
                                            <img src="{{ asset('uploads/'.$room_data->featured_photo) }}" alt="{{ $room_data->name }}">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('room_detail',$room_data->id) }}" class="room-name">
                                            <i class="fas fa-bed me-2"></i>{{ $room_data->name }}
                                        </a>
                                    </td>
                                    <td><span class="price-text">${{ $room_data->price }}</span></td>
                                    <td><span class="date-text"><i class="fas fa-calendar-check me-1"></i>{{ $arr_cart_checkin_date[$i] }}</span></td>
                                    <td><span class="date-text"><i class="fas fa-calendar-times me-1"></i>{{ $arr_cart_checkout_date[$i] }}</span></td>
                                    <td>
                                        <div class="guest-info">
                                            <span><i class="fas fa-user me-1"></i>{{ $arr_cart_adult[$i] }} Adult(s)</span><br>
                                            <span><i class="fas fa-child me-1"></i>{{ $arr_cart_children[$i] }} Child(ren)</span>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $d1 = explode('/',$arr_cart_checkin_date[$i]);
                                            $d2 = explode('/',$arr_cart_checkout_date[$i]);
                                            $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                            $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                            $t1 = strtotime($d1_new);
                                            $t2 = strtotime($d2_new);
                                            $diff = ($t2-$t1)/60/60/24;
                                            echo '<span class="subtotal-text">$'.($room_data->price*$diff).'</span>';
                                            $total_price = $total_price+($room_data->price*$diff);
                                        @endphp
                                    </td>
                                </tr>
                                @php
                                }
                                @endphp                            
                                <tr class="total-row">
                                    <td colspan="8" class="text-end"><strong>Total Amount:</strong></td>
                                    <td><span class="total-price">${{ $total_price }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="cart-actions mt-4">
                    <a href="{{ route('room') }}" class="btn-continue-shopping">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a>
                    <a href="{{ route('checkout') }}" class="btn-checkout">
                        <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                    </a>
                </div>

                @else

                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Your Cart is Empty</h3>
                    <p>Looks like you haven't added any rooms to your cart yet.</p>
                    <a href="{{ route('room') }}" class="btn-browse-rooms">
                        <i class="fas fa-bed me-2"></i>Browse Rooms
                    </a>
                </div>

                @endif
            </div>
        </div>
    </div>
</section>

<style>
/* Page Hero Section */
.page-hero {
    position: relative;
    height: 50vh;
    min-height: 400px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.page-hero .hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.page-hero .hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.page-hero .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.6));
    z-index: 2;
}

.page-hero .hero-content {
    position: relative;
    z-index: 3;
    width: 100%;
}

.page-hero .breadcrumb-nav {
    margin-bottom: 20px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
}

.page-hero .breadcrumb-nav a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: color 0.3s ease;
}

.page-hero .breadcrumb-nav a:hover {
    color: #d4af37;
}

.page-hero .separator {
    margin: 0 10px;
}

.page-hero .current {
    color: #d4af37;
}

.page-hero .hero-title {
    font-size: 3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 15px;
}

.page-hero .hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
}

/* Cart Section */
.cart-section {
    background: linear-gradient(135deg, #fefcf7 0%, #f7f3e9 100%);
    min-height: 50vh;
}

.cart-table-wrapper {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
}

.modern-cart-table {
    margin: 0;
}

.modern-cart-table thead th {
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: white;
    font-weight: 600;
    padding: 15px;
    border: none;
    text-align: center;
    font-size: 14px;
}

.modern-cart-table tbody td {
    padding: 20px 15px;
    vertical-align: middle;
    text-align: center;
    border-bottom: 1px solid #f0f0f0;
}

.cart-delete-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
}

.cart-delete-link:hover {
    background: #c82333;
    transform: scale(1.1);
    color: white;
}

.serial-badge {
    display: inline-block;
    background: #b8a055;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
}

.cart-room-image {
    width: 80px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    margin: 0 auto;
}

.cart-room-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.room-name {
    color: #1a365d;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
}

.room-name:hover {
    color: #b8a055;
}

.price-text, .subtotal-text {
    color: #b8a055;
    font-weight: 700;
    font-size: 16px;
}

.date-text {
    color: #666;
    font-size: 14px;
}

.guest-info {
    font-size: 13px;
    color: #666;
}

.guest-info i {
    color: #b8a055;
}

.total-row {
    background: #f8f9fa;
}

.total-row td {
    padding: 20px 15px !important;
    font-size: 18px;
}

.total-price {
    color: #b8a055;
    font-weight: 700;
    font-size: 24px;
}

/* Cart Actions */
.cart-actions {
    display: flex;
    justify-content: space-between;
    gap: 15px;
}

.btn-continue-shopping, .btn-checkout {
    padding: 14px 30px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.btn-continue-shopping {
    background: white;
    color: #1a365d;
    border: 2px solid #1a365d;
}

.btn-continue-shopping:hover {
    background: #1a365d;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(26, 54, 93, 0.3);
}

.btn-checkout {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    border: none;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
}

.btn-checkout:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
    color: white;
}

/* Empty Cart */
.empty-cart {
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
}

.empty-cart-icon {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #f7f3e9, #e9e5d7);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
}

.empty-cart-icon i {
    font-size: 50px;
    color: #b8a055;
}

.empty-cart h3 {
    font-size: 2rem;
    color: #1a365d;
    margin-bottom: 15px;
}

.empty-cart p {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.btn-browse-rooms {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 14px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
}

.btn-browse-rooms:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
    color: white;
}

/* Responsive */
@media (max-width: 768px) {
    .page-hero .hero-title {
        font-size: 2rem;
    }
    
    .cart-table-wrapper {
        padding: 15px;
        overflow-x: auto;
    }
    
    .modern-cart-table {
        font-size: 13px;
    }
    
    .cart-actions {
        flex-direction: column;
    }
    
    .btn-continue-shopping, .btn-checkout {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection
