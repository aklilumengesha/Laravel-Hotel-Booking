@extends('front.layout.app')

@section('main_content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Checkout" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <a href="{{ route('cart') }}">Cart</a>
                        <span class="separator">→</span>
                        <span class="current">{{ $global_page_data->checkout_heading }}</span>
                    </nav>
                    <h1 class="hero-title">{{ $global_page_data->checkout_heading }}</h1>
                    <p class="hero-subtitle">Complete your booking information</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Content -->
<section class="checkout-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Billing Information -->
            <div class="col-lg-8">
                <div class="checkout-card">
                    <div class="checkout-card-header">
                        <h4><i class="fas fa-file-invoice me-2"></i>Billing Information</h4>
                        <p>Please provide your billing details</p>
                    </div>
                    <div class="checkout-card-body">
                        <form action="{{ route('payment') }}" method="post" class="frm_checkout">
                            @csrf
                            @php
                            if(session()->has('billing_name')) {
                                $billing_name = session()->get('billing_name');
                            } else {
                                $billing_name = Auth::guard('customer')->user()->name;
                            }

                            if(session()->has('billing_email')) {
                                $billing_email = session()->get('billing_email');
                            } else {
                                $billing_email = Auth::guard('customer')->user()->email;
                            }

                            if(session()->has('billing_phone')) {
                                $billing_phone = session()->get('billing_phone');
                            } else {
                                $billing_phone = Auth::guard('customer')->user()->phone;
                            }

                            if(session()->has('billing_country')) {
                                $billing_country = session()->get('billing_country');
                            } else {
                                $billing_country = Auth::guard('customer')->user()->country;
                            }

                            if(session()->has('billing_address')) {
                                $billing_address = session()->get('billing_address');
                            } else {
                                $billing_address = Auth::guard('customer')->user()->address;
                            }

                            if(session()->has('billing_state')) {
                                $billing_state = session()->get('billing_state');
                            } else {
                                $billing_state = Auth::guard('customer')->user()->state;
                            }

                            if(session()->has('billing_city')) {
                                $billing_city = session()->get('billing_city');
                            } else {
                                $billing_city = Auth::guard('customer')->user()->city;
                            }

                            if(session()->has('billing_zip')) {
                                $billing_zip = session()->get('billing_zip');
                            } else {
                                $billing_zip = Auth::guard('customer')->user()->zip;
                            }
                            @endphp
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label"><i class="fas fa-user me-2"></i>Full Name *</label>
                                        <input type="text" class="form-control modern-input" name="billing_name" value="{{ $billing_name }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label"><i class="fas fa-envelope me-2"></i>Email Address *</label>
                                        <input type="email" class="form-control modern-input" name="billing_email" value="{{ $billing_email }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label"><i class="fas fa-phone me-2"></i>Phone Number *</label>
                                        <input type="text" class="form-control modern-input" name="billing_phone" value="{{ $billing_phone }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label"><i class="fas fa-globe me-2"></i>Country *</label>
                                        <input type="text" class="form-control modern-input" name="billing_country" value="{{ $billing_country }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label"><i class="fas fa-map-marker-alt me-2"></i>Address *</label>
                                        <input type="text" class="form-control modern-input" name="billing_address" value="{{ $billing_address }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label"><i class="fas fa-map me-2"></i>State *</label>
                                        <input type="text" class="form-control modern-input" name="billing_state" value="{{ $billing_state }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label"><i class="fas fa-city me-2"></i>City *</label>
                                        <input type="text" class="form-control modern-input" name="billing_city" value="{{ $billing_city }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label"><i class="fas fa-mail-bulk me-2"></i>Zip Code *</label>
                                        <input type="text" class="form-control modern-input" name="billing_zip" value="{{ $billing_zip }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-actions mt-4">
                                <a href="{{ route('cart') }}" class="btn-back-cart">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Cart
                                </a>
                                <button type="submit" class="btn-continue-payment">
                                    Continue to Payment <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="order-summary-card">
                    <div class="summary-header">
                        <h4><i class="fas fa-shopping-cart me-2"></i>Order Summary</h4>
                    </div>
                    <div class="summary-body">
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
                        
                        <div class="summary-item">
                            <div class="item-details">
                                <h5 class="item-name">{{ $room_data->name }}</h5>
                                <div class="item-info">
                                    <span class="info-badge">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ $arr_cart_checkin_date[$i] }} - {{ $arr_cart_checkout_date[$i] }}
                                    </span>
                                    <span class="info-badge">
                                        <i class="fas fa-users me-1"></i>
                                        {{ $arr_cart_adult[$i] }} Adults, {{ $arr_cart_children[$i] }} Children
                                    </span>
                                </div>
                            </div>
                            <div class="item-price">
                                @php
                                    $d1 = explode('/',$arr_cart_checkin_date[$i]);
                                    $d2 = explode('/',$arr_cart_checkout_date[$i]);
                                    $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                    $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                    $t1 = strtotime($d1_new);
                                    $t2 = strtotime($d2_new);
                                    $diff = ($t2-$t1)/60/60/24;
                                    $item_total = $room_data->price*$diff;
                                    echo '$'.$item_total;
                                    $total_price = $total_price+$item_total;
                                @endphp
                            </div>
                        </div>
                        
                        @php
                        }
                        @endphp
                        
                        <div class="summary-total">
                            <span class="total-label">Total Amount:</span>
                            <span class="total-price">${{ $total_price }}</span>
                        </div>
                    </div>
                </div>

                <!-- Security Badge -->
                <div class="security-badge mt-4">
                    <div class="badge-content">
                        <i class="fas fa-lock"></i>
                        <div class="badge-text">
                            <h6>Secure Checkout</h6>
                            <p>Your information is protected</p>
                        </div>
                    </div>
                </div>
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

/* Checkout Section */
.checkout-section {
    background: linear-gradient(135deg, #fefcf7 0%, #f7f3e9 100%);
    min-height: 60vh;
}

/* Checkout Card */
.checkout-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.checkout-card-header {
    background: linear-gradient(135deg, #1a365d, #2c5282);
    padding: 25px 30px;
    color: white;
}

.checkout-card-header h4 {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0 0 5px 0;
    color: white;
}

.checkout-card-header p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 14px;
}

.checkout-card-body {
    padding: 35px 30px;
}

/* Form Styling */
.form-group-modern .form-label {
    font-weight: 600;
    color: #1a365d;
    margin-bottom: 8px;
    display: block;
}

.form-group-modern .form-label i {
    color: #b8a055;
}

.modern-input {
    padding: 12px 18px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 15px;
    transition: all 0.3s ease;
    width: 100%;
}

.modern-input:focus {
    border-color: #b8a055;
    box-shadow: 0 0 0 0.2rem rgba(184, 160, 85, 0.15);
    outline: none;
}

/* Checkout Actions */
.checkout-actions {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    padding-top: 20px;
    border-top: 2px solid #f0f0f0;
}

.btn-back-cart, .btn-continue-payment {
    padding: 14px 30px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    border: none;
    cursor: pointer;
}

.btn-back-cart {
    background: white;
    color: #1a365d;
    border: 2px solid #1a365d;
}

.btn-back-cart:hover {
    background: #1a365d;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(26, 54, 93, 0.3);
}

.btn-continue-payment {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
}

.btn-continue-payment:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
    color: white;
}

/* Order Summary Card */
.order-summary-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    position: sticky;
    top: 20px;
}

.summary-header {
    background: linear-gradient(135deg, #f7f3e9, #e9e5d7);
    padding: 20px 25px;
    border-bottom: 2px solid #b8a055;
}

.summary-header h4 {
    margin: 0;
    color: #1a365d;
    font-weight: 700;
    font-size: 1.3rem;
}

.summary-body {
    padding: 25px;
}

.summary-item {
    padding: 20px 0;
    border-bottom: 1px solid #f0f0f0;
}

.summary-item:last-of-type {
    border-bottom: 2px solid #e0e0e0;
    margin-bottom: 20px;
}

.item-name {
    font-size: 1rem;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 10px;
}

.item-info {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.info-badge {
    display: inline-flex;
    align-items: center;
    font-size: 13px;
    color: #666;
}

.info-badge i {
    color: #b8a055;
}

.item-price {
    font-size: 1.1rem;
    font-weight: 700;
    color: #b8a055;
    margin-top: 10px;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0 0 0;
}

.total-label {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1a365d;
}

.total-price {
    font-size: 1.8rem;
    font-weight: 700;
    color: #b8a055;
}

/* Security Badge */
.security-badge {
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.badge-content {
    display: flex;
    align-items: center;
    gap: 15px;
}

.badge-content i {
    font-size: 30px;
    color: #28a745;
}

.badge-text h6 {
    margin: 0 0 5px 0;
    color: #1a365d;
    font-weight: 700;
}

.badge-text p {
    margin: 0;
    color: #666;
    font-size: 13px;
}

/* Responsive */
@media (max-width: 768px) {
    .page-hero .hero-title {
        font-size: 2rem;
    }
    
    .checkout-card-body {
        padding: 25px 20px;
    }
    
    .checkout-actions {
        flex-direction: column;
    }
    
    .btn-back-cart, .btn-continue-payment {
        width: 100%;
        justify-content: center;
    }
    
    .order-summary-card {
        position: static;
        margin-top: 30px;
    }
}
</style>
@endsection
