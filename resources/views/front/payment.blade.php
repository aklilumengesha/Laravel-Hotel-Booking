@extends('front.layout.app')

@section('main_content')

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<!-- Hero Section -->
<section class="page-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Payment" class="hero-image">
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
                        <a href="{{ route('checkout') }}">Checkout</a>
                        <span class="separator">→</span>
                        <span class="current">{{ $global_page_data->payment_heading }}</span>
                    </nav>
                    <h1 class="hero-title">{{ $global_page_data->payment_heading }}</h1>
                    <p class="hero-subtitle">Choose your preferred payment method</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Content -->
<section class="payment-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Payment Method Selection -->
            <div class="col-lg-4">
                <div class="payment-method-card">
                    <div class="payment-card-header">
                        <h4><i class="fas fa-credit-card me-2"></i>Payment Method</h4>
                        <p>Select how you'd like to pay</p>
                    </div>
                    <div class="payment-card-body">
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
                            $d1 = explode('/',$arr_cart_checkin_date[$i]);
                            $d2 = explode('/',$arr_cart_checkout_date[$i]);
                            $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                            $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                            $t1 = strtotime($d1_new);
                            $t2 = strtotime($d2_new);
                            $diff = ($t2-$t1)/60/60/24;
                            $total_price = $total_price+($room_data->price*$diff);
                        }
                        @endphp

                        <div class="payment-method-selector">
                            <label class="method-option">
                                <input type="radio" name="payment_method" value="Chapa" id="chapaMethod">
                                <div class="method-card">
                                    <div class="method-logo chapa-logo">
                                        <img src="https://dashboard.chapa.co/img/chapa_logo_black.png" alt="Chapa" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 60%22%3E%3Ctext x=%2210%22 y=%2245%22 font-family=%22Arial%22 font-size=%2236%22 font-weight=%22bold%22 fill=%22%237CB342%22%3EChapa%3C/text%3E%3C/svg%3E';" style="width: 100%; height: auto; max-width: 120px;">
                                    </div>
                                    <div class="method-info">
                                        <h5>Chapa</h5>
                                        <p>Pay with Chapa Payment Gateway</p>
                                    </div>
                                    <div class="method-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            </label>

                            <label class="method-option">
                                <input type="radio" name="payment_method" value="PayPal" id="paypalMethod">
                                <div class="method-card">
                                    <div class="method-logo paypal-logo">
                                        <img src="https://www.paypalobjects.com/webstatic/icon/pp258.png" alt="PayPal" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%230070ba%22 width=%22100%22 height=%22100%22 rx=%2210%22/%3E%3Ctext x=%2250%22 y=%2260%22 font-size=%2235%22 fill=%22white%22 text-anchor=%22middle%22 font-weight=%22bold%22%3EPayPal%3C/text%3E%3C/svg%3E';">
                                    </div>
                                    <div class="method-info">
                                        <h5>PayPal</h5>
                                        <p>Pay securely with PayPal</p>
                                    </div>
                                    <div class="method-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            </label>

                            <label class="method-option">
                                <input type="radio" name="payment_method" value="Stripe" id="stripeMethod">
                                <div class="method-card">
                                    <div class="method-logo stripe-logo">
                                        <img src="https://stripe.com/favicon.ico" alt="Stripe" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23635bff%22 width=%22100%22 height=%22100%22 rx=%2210%22/%3E%3Ctext x=%2250%22 y=%2260%22 font-size=%2235%22 fill=%22white%22 text-anchor=%22middle%22 font-weight=%22bold%22%3EStripe%3C/text%3E%3C/svg%3E';">
                                    </div>
                                    <div class="method-info">
                                        <h5>Stripe</h5>
                                        <p>Pay with Credit/Debit Card</p>
                                    </div>
                                    <div class="method-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Payment Forms -->
                        <div class="payment-forms mt-4">
                            <!-- Chapa Payment -->
                            <div class="payment-form chapa-form" style="display: none;">
                                <div class="form-header">
                                    <i class="fas fa-wallet me-2"></i>
                                    <h5>Chapa Payment</h5>
                                </div>
                                <form method="POST" action="{{ route('payment.chapa') }}">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $arr_cart_room_id[0] }}">
                                    <input type="hidden" name="amount" value="{{ $total_price }}">
                                    <input type="hidden" name="first_name" value="{{ session()->get('billing_name') }}">
                                    <input type="hidden" name="last_name" value="">
                                    <input type="hidden" name="email" value="{{ session()->get('billing_email') }}">
                                    <button type="submit" class="btn-pay-now">
                                        <i class="fas fa-lock me-2"></i>Pay ${{ $total_price }} Now
                                    </button>
                                </form>
                            </div>

                            <!-- PayPal Payment -->
                            <div class="payment-form paypal-form" style="display: none;">
                                <div class="form-header">
                                    <i class="fas fa-dollar-sign me-2"></i>
                                    <h5>PayPal Payment</h5>
                                </div>
                                <div id="paypal-button"></div>
                            </div>

                            <!-- Stripe Payment -->
                            <div class="payment-form stripe-form" style="display: none;">
                                <div class="form-header">
                                    <i class="fas fa-credit-card me-2"></i>
                                    <h5>Stripe Payment</h5>
                                </div>
                                @php
                                $cents = $total_price*100;
                                $customer_email = Auth::guard('customer')->user()->email;
                                $stripe_publishable_key = 'pk_test_51LT28GF67T3XLjgLXbAMW8YNgvDyv6Yrg7mB6yHJhfmWgLrAL79rSBPvxcbKrsKtCesqJmxlOd259nMrNx4Qlhoa00zX7rOhOq';
                                @endphp
                                <form action="{{ route('stripe',$total_price) }}" method="post">
                                    @csrf
                                    <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{ $stripe_publishable_key }}"
                                        data-amount="{{ $cents }}"
                                        data-name="{{ env('APP_NAME') }}"
                                        data-description=""
                                        data-image="{{ asset('stripe.png') }}"
                                        data-currency="usd"
                                        data-email="{{ $customer_email }}"
                                    >
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Billing Details -->
            <div class="col-lg-4">
                <div class="info-card">
                    <div class="info-card-header">
                        <h4><i class="fas fa-user me-2"></i>Billing Details</h4>
                    </div>
                    <div class="info-card-body">
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-user me-2"></i>Name:</span>
                            <span class="info-value">{{ session()->get('billing_name') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-envelope me-2"></i>Email:</span>
                            <span class="info-value">{{ session()->get('billing_email') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-phone me-2"></i>Phone:</span>
                            <span class="info-value">{{ session()->get('billing_phone') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-globe me-2"></i>Country:</span>
                            <span class="info-value">{{ session()->get('billing_country') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-map-marker-alt me-2"></i>Address:</span>
                            <span class="info-value">{{ session()->get('billing_address') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-map me-2"></i>State:</span>
                            <span class="info-value">{{ session()->get('billing_state') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-city me-2"></i>City:</span>
                            <span class="info-value">{{ session()->get('billing_city') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-mail-bulk me-2"></i>Zip:</span>
                            <span class="info-value">{{ session()->get('billing_zip') }}</span>
                        </div>
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
            </div>
        </div>
    </div>
</section>

@php
$client = 'ARw2VtkTvo3aT7DILgPWeSUPjMK_AS5RlMKkUmB78O8rFCJcfX6jFSmTDpgdV3bOFLG2WE-s11AcCGTD';
@endphp
<script>
	paypal.Button.render({
		env: 'sandbox',
		client: {
			sandbox: '{{ $client }}',
			production: '{{ $client }}'
		},
		locale: 'en_US',
		style: {
			size: 'medium',
			color: 'blue',
			shape: 'rect',
		},
		payment: function (data, actions) {
			return actions.payment.create({
				redirect_urls:{
					return_url: '{{ url("payment/paypal/$total_price") }}'
				},
				transactions: [{
					amount: {
						total: '{{ $total_price }}',
						currency: 'USD'
					}
				}]
			});
		},
		onAuthorize: function (data, actions) {
			return actions.redirect();
		}
	}, '#paypal-button');
</script>

<script>
$(document).ready(function() {
    $('input[name="payment_method"]').on('change', function() {
        var selectedMethod = $(this).val();
        
        // Hide all payment forms
        $('.payment-form').hide();
        
        // Show the selected payment form
        if (selectedMethod === 'Chapa') {
            $('.chapa-form').show();
        } else if (selectedMethod === 'PayPal') {
            $('.paypal-form').show();
        } else if (selectedMethod === 'Stripe') {
            $('.stripe-form').show();
        }
    });
});
</script>

<style>
/* Page Hero */
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

/* Payment Section */
.payment-section {
    background: linear-gradient(135deg, #fefcf7 0%, #f7f3e9 100%);
    min-height: 60vh;
}

/* Payment Method Card */
.payment-method-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.payment-card-header {
    background: linear-gradient(135deg, #1a365d, #2c5282);
    padding: 25px 30px;
    color: white;
}

.payment-card-header h4 {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0 0 5px 0;
    color: white;
}

.payment-card-header p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 14px;
}

.payment-card-body {
    padding: 30px;
}

/* Payment Method Selector */
.payment-method-selector {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.method-option {
    cursor: pointer;
    margin: 0;
}

.method-option input[type="radio"] {
    display: none;
}

.method-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: #f8f9fa;
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.method-option input[type="radio"]:checked + .method-card {
    border-color: #b8a055;
    background: linear-gradient(135deg, rgba(184, 160, 85, 0.1), rgba(184, 160, 85, 0.05));
}

.method-card:hover {
    border-color: #b8a055;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.method-logo {
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    padding: 8px;
    border: 2px solid #e0e0e0;
    transition: all 0.3s ease;
}

.method-option input[type="radio"]:checked + .method-card .method-logo {
    border-color: #b8a055;
    box-shadow: 0 0 0 3px rgba(184, 160, 85, 0.1);
}

.method-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.method-logo.chapa-logo {
    background: white;
    padding: 10px;
}

.method-logo.chapa-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.method-logo.paypal-logo {
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
}

.method-logo.stripe-logo {
    background: linear-gradient(135deg, #f5f3ff, #ede9fe);
}

.method-info {
    flex: 1;
}

.method-info h5 {
    margin: 0 0 5px 0;
    font-size: 1.1rem;
    font-weight: 700;
    color: #1a365d;
}

.method-info p {
    margin: 0;
    font-size: 13px;
    color: #666;
}

.method-check {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #e0e0e0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.method-option input[type="radio"]:checked + .method-card .method-check {
    background: #b8a055;
}

.method-check i {
    font-size: 16px;
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.method-option input[type="radio"]:checked + .method-card .method-check i {
    opacity: 1;
}

/* Payment Forms */
.payment-form {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 25px;
    border: 2px solid #e0e0e0;
}

.form-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e0e0e0;
}

.form-header h5 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 700;
    color: #1a365d;
}

.btn-pay-now {
    width: 100%;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 15px;
    border: none;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
    cursor: pointer;
}

.btn-pay-now:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
}

/* Info Card */
.info-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.info-card-header {
    background: linear-gradient(135deg, #f7f3e9, #e9e5d7);
    padding: 20px 25px;
    border-bottom: 2px solid #b8a055;
}

.info-card-header h4 {
    margin: 0;
    color: #1a365d;
    font-weight: 700;
}

.info-card-body {
    padding: 25px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
}

.info-row:last-child {
    border-bottom: none;
}

.info-label {
    font-weight: 600;
    color: #666;
    font-size: 14px;
}

.info-label i {
    color: #b8a055;
}

.info-value {
    color: #1a365d;
    font-weight: 600;
    text-align: right;
}

/* Order Summary */
.order-summary-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
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

/* Responsive */
@media (max-width: 768px) {
    .page-hero .hero-title {
        font-size: 2rem;
    }
    
    .payment-card-body {
        padding: 20px;
    }
}
</style>

@endsection
