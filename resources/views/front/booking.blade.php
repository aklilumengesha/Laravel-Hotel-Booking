@extends('front.layout.app')

@section('main_content')

<style>
/* Booking Page Hero Styles */
.booking-hero .hero-overlay {
    background: linear-gradient(135deg, rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.6)) !important;
}
.booking-hero .separator {
    margin: 0 15px;
    color: #d4af37 !important;
}
.booking-hero .current {
    color: #d4af37 !important;
    font-weight: 600;
}
</style>

<!-- Hero Section -->
<section class="booking-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Book Your Stay" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">Book Now</span>
                    </nav>
                    <h1 class="hero-title">Book Your Perfect Stay</h1>
                    <p class="hero-subtitle">Experience luxury and comfort with our premium accommodations</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Steps -->
<section class="booking-steps py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="steps-wrapper" data-aos="fade-up">
                    <div class="step-item active" data-step="1">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h6>Select Room</h6>
                            <p>Choose your perfect room</p>
                        </div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item" data-step="2">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h6>Select Dates</h6>
                            <p>Pick your stay dates</p>
                        </div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item" data-step="3">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h6>Guest Details</h6>
                            <p>Add guest information</p>
                        </div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item" data-step="4">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <h6>Confirmation</h6>
                            <p>Review and book</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Booking Content -->
<section class="booking-content py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Booking Form -->
            <div class="col-lg-8">
                <div class="booking-form-card" data-aos="fade-right">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-calendar-check me-2"></i>
                            Make Your Reservation
                        </h3>
                        <p class="card-subtitle">Fill in the details below to book your stay</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('cart_submit') }}" method="post" id="bookingForm">
                            @csrf
                            
                            <!-- Step 1: Room Selection -->
                            <div class="booking-step active" id="step-1">
                                <div class="step-header">
                                    <h4><i class="fas fa-bed me-2"></i>Select Your Room</h4>
                                    <p>Choose from our available luxury rooms</p>
                                </div>
                                
                                <div class="room-selection">
                                    @if(isset($room_all) && $room_all->count() > 0)
                                        <div class="row g-3">
                                            @foreach($room_all as $room)
                                            <div class="col-md-6">
                                                <div class="room-option" data-room-id="{{ $room->id }}" data-room-price="{{ $room->price }}">
                                                    <input type="radio" name="room_id" value="{{ $room->id }}" id="room-{{ $room->id }}" 
                                                           @if(isset($selected_room) && $selected_room->id == $room->id) checked @endif required>
                                                    <label for="room-{{ $room->id }}" class="room-card">
                                                        <div class="room-image">
                                                            <img src="{{ asset('uploads/'.$room->featured_photo) }}" alt="{{ $room->name }}">
                                                            <div class="room-price">
                                                                <span class="price">${{ $room->price }}</span>
                                                                <span class="period">/night</span>
                                                            </div>
                                                        </div>
                                                        <div class="room-info">
                                                            <h5 class="room-name">{{ $room->name }}</h5>
                                                            <div class="room-features">
                                                                <span class="feature"><i class="fas fa-users"></i> {{ $room->total_guests }} Guests</span>
                                                                <span class="feature"><i class="fas fa-expand-arrows-alt"></i> {{ $room->size }} sqft</span>
                                                            </div>
                                                            <div class="room-amenities">
                                                                @if($room->amenities)
                                                                    @php
                                                                        $amenityIds = explode(',', $room->amenities);
                                                                        $amenityCount = 0;
                                                                    @endphp
                                                                    @foreach($amenityIds as $amenityId)
                                                                        @if($amenityCount < 3)
                                                                            @php
                                                                                $amenity = \App\Models\Amenity::find(trim($amenityId));
                                                                                if($amenity) $amenityCount++;
                                                                            @endphp
                                                                            @if($amenity)
                                                                                <span class="amenity">{{ $amenity->name }}</span>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="selection-indicator">
                                                            <i class="fas fa-check"></i>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="no-rooms">
                                            <i class="fas fa-bed fa-3x mb-3"></i>
                                            <h5>No Rooms Available</h5>
                                            <p>Please check back later or contact us for assistance.</p>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="step-actions">
                                    <button type="button" class="btn btn-primary btn-next" onclick="nextStep(2)">
                                        Continue to Dates <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Step 2: Date Selection -->
                            <div class="booking-step" id="step-2">
                                <div class="step-header">
                                    <h4><i class="fas fa-calendar-alt me-2"></i>Select Your Dates</h4>
                                    <p>Choose your check-in and check-out dates</p>
                                </div>
                                
                                <div class="date-selection">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Check-in & Check-out Dates</label>
                                            <div class="date-input-wrapper">
                                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Select your stay dates" required>
                                                <i class="fas fa-calendar-alt date-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="step-actions">
                                    <button type="button" class="btn btn-outline-secondary btn-prev" onclick="prevStep(1)">
                                        <i class="fas fa-arrow-left me-2"></i> Back
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next" onclick="nextStep(3)">
                                        Continue to Guests <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Step 3: Guest Details -->
                            <div class="booking-step" id="step-3">
                                <div class="step-header">
                                    <h4><i class="fas fa-users me-2"></i>Guest Information</h4>
                                    <p>Specify the number of guests</p>
                                </div>
                                
                                <div class="guest-selection">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Adults</label>
                                            <div class="guest-counter">
                                                <button type="button" class="counter-btn minus" data-target="adult">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <select name="adult" class="form-control guest-select" required>
                                                    <option value="">Select</option>
                                                    <option value="1">1 Adult</option>
                                                    <option value="2" selected>2 Adults</option>
                                                    <option value="3">3 Adults</option>
                                                    <option value="4">4 Adults</option>
                                                </select>
                                                <button type="button" class="counter-btn plus" data-target="adult">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Children</label>
                                            <div class="guest-counter">
                                                <button type="button" class="counter-btn minus" data-target="children">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <select name="children" class="form-control guest-select">
                                                    <option value="0" selected>0 Children</option>
                                                    <option value="1">1 Child</option>
                                                    <option value="2">2 Children</option>
                                                </select>
                                                <button type="button" class="counter-btn plus" data-target="children">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="step-actions">
                                    <button type="button" class="btn btn-outline-secondary btn-prev" onclick="prevStep(2)">
                                        <i class="fas fa-arrow-left me-2"></i> Back
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next" onclick="nextStep(4)">
                                        Review Booking <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Step 4: Confirmation -->
                            <div class="booking-step" id="step-4">
                                <div class="step-header">
                                    <h4><i class="fas fa-check-circle me-2"></i>Review Your Booking</h4>
                                    <p>Please review your booking details before confirming</p>
                                </div>
                                
                                <div class="booking-summary">
                                    <div class="summary-card">
                                        <div class="summary-header">
                                            <h5>Booking Summary</h5>
                                        </div>
                                        <div class="summary-body">
                                            <div class="summary-item">
                                                <span class="label">Room:</span>
                                                <span class="value" id="summary-room">-</span>
                                            </div>
                                            <div class="summary-item">
                                                <span class="label">Dates:</span>
                                                <span class="value" id="summary-dates">-</span>
                                            </div>
                                            <div class="summary-item">
                                                <span class="label">Guests:</span>
                                                <span class="value" id="summary-guests">-</span>
                                            </div>
                                            <div class="summary-item">
                                                <span class="label">Nights:</span>
                                                <span class="value" id="summary-nights">-</span>
                                            </div>
                                            <div class="summary-item total">
                                                <span class="label">Total Price:</span>
                                                <span class="value" id="summary-total">$0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="step-actions">
                                    <button type="button" class="btn btn-outline-secondary btn-prev" onclick="prevStep(3)">
                                        <i class="fas fa-arrow-left me-2"></i> Back
                                    </button>
                                    <button type="submit" class="btn btn-success btn-book">
                                        <i class="fas fa-credit-card me-2"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Booking Summary Sidebar -->
            <div class="col-lg-4">
                <div class="booking-sidebar" data-aos="fade-left">
                    <!-- Quick Info -->
                    <div class="sidebar-card">
                        <div class="card-header">
                            <h5><i class="fas fa-info-circle me-2"></i>Booking Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <strong>Check-in:</strong> 3:00 PM<br>
                                    <strong>Check-out:</strong> 11:00 AM
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-wifi"></i>
                                <div>
                                    <strong>Free WiFi</strong><br>
                                    High-speed internet access
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-car"></i>
                                <div>
                                    <strong>Free Parking</strong><br>
                                    Complimentary valet service
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-utensils"></i>
                                <div>
                                    <strong>Restaurant</strong><br>
                                    Fine dining experience
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Help & Support -->
                    <div class="sidebar-card">
                        <div class="card-header">
                            <h5><i class="fas fa-headset me-2"></i>Need Help?</h5>
                        </div>
                        <div class="card-body">
                            <p>Our booking specialists are here to help you 24/7</p>
                            <div class="contact-options">
                                <a href="tel:+1234567890" class="contact-btn">
                                    <i class="fas fa-phone"></i>
                                    <span>Call Us</span>
                                </a>
                                <a href="{{ route('contact') }}" class="contact-btn">
                                    <i class="fas fa-envelope"></i>
                                    <span>Email Us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Special Offers -->
                    <div class="sidebar-card special-offer">
                        <div class="card-body">
                            <div class="offer-icon">
                                <i class="fas fa-gift"></i>
                            </div>
                            <h5>Special Offer</h5>
                            <p>Book 3+ nights and get 15% off your stay!</p>
                            <small>*Terms and conditions apply</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection