@extends('front.layout.app')

@php use Illuminate\Support\Str; @endphp

@section('main_content')
<div class="slider">
    <div class="slide-carousel owl-carousel">
        @foreach($slide_all as $item)
        <div class="item" style="background-image:url({{ asset('uploads/'.$item->photo) }});">
            <div class="bg"></div>
            <div class="text">
                <h2>{{ $item->heading }}</h2>
                <p>
                    {!! $item->text !!}
                </p>
                @if($item->button_text != '')
                <div class="button">
                    <a href="{{ $item->button_url }}">{{ $item->button_text }}</a>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="search-section">
    <div class="container">
        <form action="{{ route('cart_submit') }}" method="post">
            @csrf
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <select name="room_id" class="form-select">
                                <option value="">Select Room</option>
                                @foreach($room_all as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@if(optional($global_setting_data)->home_feature_status == 'Show')
<div class="modern-features py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h2 class="section-title">Why Choose Us</h2>
                <p class="section-subtitle">Discover the exceptional amenities and services that make us special</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($feature_all->unique('heading')->take(8) as $item)
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="{{ $item->icon }}"></i>
                    </div>
                    <div class="feature-content">
                        <h5 class="feature-title">{{ $item->heading }}</h5>
                        <p class="feature-description">{!! $item->text !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.modern-features {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}
.feature-card {
    background: #ffffff;
    padding: 40px 30px;
    border-radius: 15px;
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid rgba(184, 160, 85, 0.1);
    position: relative;
    overflow: hidden;
}
.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}
.feature-card:hover::before {
    transform: scaleX(1);
}
.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(184, 160, 85, 0.15);
    border-color: rgba(184, 160, 85, 0.2);
}
.feature-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 25px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}
.feature-icon i {
    font-size: 32px;
    color: #ffffff;
}
.feature-card:hover .feature-icon {
    transform: scale(1.1);
}
.feature-title {
    font-size: 18px;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 15px;
}
.feature-card:hover .feature-title {
    color: #b8a055;
}
.feature-description {
    color: #666;
    font-size: 14px;
    line-height: 1.6;
    margin: 0;
}
</style>
@endif

<!-- About Us Section - Discover Our Hotel -->
<section class="home-about-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <span class="section-label animate-fade-down">Discover Our Hotel</span>
                <h2 class="section-main-title animate-fade-up">Where Luxury Meets Comfort</h2>
                <p class="section-description animate-fade-up delay-1">Experience world-class hospitality in the heart of the city</p>
            </div>
        </div>
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6">
                <div class="about-image-container animate-slide-right">
                    <img src="{{ asset('uploads/slide1.jpg') }}" alt="Luxury Hotel" class="img-fluid about-main-img">
                    <div class="image-overlay-badge pulse-glow">
                        <i class="fas fa-award bounce-icon"></i>
                        <span>Award Winning Hotel</span>
                    </div>
                    <div class="floating-shapes">
                        <div class="shape shape-1"></div>
                        <div class="shape shape-2"></div>
                        <div class="shape shape-3"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-text-content">
                    <h3 class="about-heading animate-slide-left">Your Perfect Stay Awaits</h3>
                    <p class="about-text animate-fade-up delay-1">Welcome to our premium hotel where every detail is crafted for your comfort. We combine elegant design, exceptional service, and modern amenities to create an unforgettable experience for every guest.</p>
                    <p class="about-text animate-fade-up delay-2">Whether you're traveling for business or leisure, our dedicated team ensures your stay exceeds expectations.</p>
                    <div class="stats-row animate-fade-up delay-3">
                        <div class="stat-item">
                            <h4 class="stat-number" data-target="15">0</h4>
                            <span class="stat-plus">+</span>
                            <p class="stat-label">Years Experience</p>
                        </div>
                        <div class="stat-item">
                            <h4 class="stat-number" data-target="500">0</h4>
                            <span class="stat-plus">+</span>
                            <p class="stat-label">Happy Guests</p>
                        </div>
                        <div class="stat-item">
                            <h4 class="stat-number" data-target="50">0</h4>
                            <span class="stat-plus">+</span>
                            <p class="stat-label">Luxury Rooms</p>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn-discover animate-fade-up delay-4">
                        Discover More <i class="fas fa-arrow-right btn-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Base Section Styles */
.home-about-section {
    background: linear-gradient(135deg, #fefcf7 0%, #f7f3e9 100%);
    overflow: hidden;
    position: relative;
}

.section-label {
    display: inline-block;
    color: #b8a055;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 15px;
}

.section-main-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 15px;
}

.section-description {
    color: #666;
    font-size: 1.1rem;
}

/* Image Container with Animations */
.about-image-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.about-image-container:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
}

.about-main-img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.about-image-container:hover .about-main-img {
    transform: scale(1.05);
}

/* Floating Shapes */
.floating-shapes {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(184, 160, 85, 0.15);
}

.shape-1 {
    width: 80px;
    height: 80px;
    top: 10%;
    left: -20px;
    animation: floatShape 6s ease-in-out infinite;
}

.shape-2 {
    width: 50px;
    height: 50px;
    top: 60%;
    right: -10px;
    animation: floatShape 8s ease-in-out infinite reverse;
}

.shape-3 {
    width: 30px;
    height: 30px;
    bottom: 20%;
    left: 10%;
    animation: floatShape 5s ease-in-out infinite 1s;
}

@keyframes floatShape {
    0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.5; }
    50% { transform: translateY(-20px) rotate(180deg); opacity: 0.8; }
}

/* Badge with Pulse Glow */
.image-overlay-badge {
    position: absolute;
    bottom: 30px;
    right: 30px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    padding: 20px 30px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: white;
    font-weight: 600;
    z-index: 2;
}

.pulse-glow {
    animation: pulseGlow 2s ease-in-out infinite;
}

@keyframes pulseGlow {
    0%, 100% { box-shadow: 0 5px 30px rgba(184, 160, 85, 0.4); }
    50% { box-shadow: 0 5px 50px rgba(184, 160, 85, 0.7), 0 0 20px rgba(184, 160, 85, 0.3); }
}

.bounce-icon {
    font-size: 24px;
    animation: bounceIcon 2s ease-in-out infinite;
}

@keyframes bounceIcon {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    25% { transform: translateY(-5px) rotate(-5deg); }
    75% { transform: translateY(-3px) rotate(5deg); }
}

/* Text Content Styles */
.about-heading {
    font-size: 2rem;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 20px;
}

.about-text {
    color: #666;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 15px;
}

/* Stats Row with Counter Animation */
.stats-row {
    display: flex;
    gap: 30px;
    margin: 35px 0;
    padding: 30px 0;
    border-top: 2px solid rgba(184, 160, 85, 0.2);
    border-bottom: 2px solid rgba(184, 160, 85, 0.2);
}

.stat-item {
    text-align: center;
    flex: 1;
    position: relative;
    transition: transform 0.3s ease;
}

.stat-item:hover {
    transform: scale(1.1);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #b8a055;
    margin: 0;
    display: inline;
}

.stat-plus {
    font-size: 2rem;
    font-weight: 700;
    color: #b8a055;
}

.stat-label {
    font-size: 14px;
    color: #666;
    margin: 5px 0 0 0;
}

/* Discover Button */
.btn-discover {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 15px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
    position: relative;
    overflow: hidden;
}

.btn-discover::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
}

.btn-discover:hover::before {
    left: 100%;
}

.btn-discover:hover {
    background: linear-gradient(135deg, #a08f4a, #8a7a3f);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(184, 160, 85, 0.4);
}

.btn-arrow {
    transition: transform 0.3s ease;
}

.btn-discover:hover .btn-arrow {
    transform: translateX(5px);
}

/* Scroll Animations */
.animate-fade-up {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.animate-fade-down {
    opacity: 0;
    transform: translateY(-30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.animate-slide-right {
    opacity: 0;
    transform: translateX(-50px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.animate-slide-left {
    opacity: 0;
    transform: translateX(50px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.animate-fade-up.visible,
.animate-fade-down.visible,
.animate-slide-right.visible,
.animate-slide-left.visible {
    opacity: 1;
    transform: translate(0, 0);
}

/* Animation Delays */
.delay-1 { transition-delay: 0.1s; }
.delay-2 { transition-delay: 0.2s; }
.delay-3 { transition-delay: 0.3s; }
.delay-4 { transition-delay: 0.4s; }

/* Responsive */
@media (max-width: 768px) {
    .section-main-title { font-size: 1.75rem; }
    .about-main-img { height: 350px; }
    .stats-row { flex-direction: column; gap: 20px; }
    .image-overlay-badge { padding: 15px 20px; bottom: 20px; right: 20px; }
    .floating-shapes { display: none; }
}
</style>

<!-- Discover Section Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
    const animatedElements = document.querySelectorAll('.animate-fade-up, .animate-fade-down, .animate-slide-right, .animate-slide-left');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                // Trigger counter animation when stats become visible
                if (entry.target.classList.contains('stats-row') || entry.target.closest('.stats-row')) {
                    startCounterAnimation();
                }
            }
        });
    }, observerOptions);
    
    animatedElements.forEach(el => observer.observe(el));
    
    // Counter Animation
    let counterStarted = false;
    function startCounterAnimation() {
        if (counterStarted) return;
        counterStarted = true;
        
        const counters = document.querySelectorAll('.stat-number[data-target]');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const updateCounter = () => {
                current += step;
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            updateCounter();
        });
    }
    
    // Also observe the stats row directly
    const statsRow = document.querySelector('.stats-row');
    if (statsRow) {
        const statsObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounterAnimation();
                }
            });
        }, { threshold: 0.5 });
        statsObserver.observe(statsRow);
    }
});
</script>


@if(optional($global_setting_data)->home_room_status == 'Show')
<div class="modern-rooms py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h2 class="section-title">Rooms and Suites</h2>
                <p class="section-subtitle">Discover our luxurious accommodations designed for your comfort</p>
            </div>
        </div>
        <div class="row g-4" id="rooms-container">
            @foreach($room_all as $item)
            @if($loop->iteration > optional($global_setting_data)->home_room_total ?? 6) 
            @break
            @endif
            <div class="col-lg-4 col-md-6">
                <div class="room-card" data-room-id="{{ $item->id }}">
                    <div class="room-image">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="{{ $item->name }}" class="img-fluid">
                        <div class="room-badge">
                            <span class="price-badge">{{ $item->price }} ETB<small>/night</small></span>
                        </div>
                        <!-- Like & Favorite Action Buttons -->
                        <div class="room-action-buttons">
                            <button class="room-action-btn like-btn" data-room-id="{{ $item->id }}" data-type="like" title="Like this room">
                                <i class="far fa-heart"></i>
                                <span class="action-count like-count">0</span>
                            </button>
                            <button class="room-action-btn favorite-btn" data-room-id="{{ $item->id }}" data-type="favorite" title="Add to favorites">
                                <i class="far fa-bookmark"></i>
                                <span class="action-count favorite-count">0</span>
                            </button>
                        </div>
                        <div class="room-overlay">
                            <a href="{{ route('room_detail',$item->id) }}" class="view-details-btn">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                        </div>
                    </div>
                    <div class="room-content">
                        <div class="room-header">
                            <h3 class="room-title">
                                <a href="{{ route('room_detail',$item->id) }}">{{ $item->name }}</a>
                            </h3>
                            @php
                                $avgRating = round($item->averageRating(), 1);
                                $ratingCount = $item->ratingCount();
                            @endphp
                            @if($ratingCount > 0)
                            <div class="room-rating">
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($avgRating))
                                            <i class="fas fa-star"></i>
                                        @elseif ($i - $avgRating < 1)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="rating-text">{{ $avgRating }} ({{ $ratingCount }})</span>
                            </div>
                            @endif
                        </div>
                        
                        <div class="room-features">
                            <div class="feature-item">
                                <i class="fas fa-users"></i>
                                <span>{{ $item->total_guests ?? $item->total_adult }} Guests</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-bed"></i>
                                <span>{{ $item->total_beds }} Beds</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-bath"></i>
                                <span>{{ $item->total_bathrooms }} Bath</span>
                            </div>
                        </div>

                        <div class="room-footer">
                            <a href="{{ route('room_detail',$item->id) }}" class="book-now-btn">
                                Book Now <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a href="{{ route('room') }}" class="btn btn-outline-primary btn-lg px-5">
                    <i class="fas fa-th-large me-2"></i>View All Rooms
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.modern-rooms {
    background: #fff;
}
.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 10px;
}
.section-subtitle {
    color: #666;
    font-size: 1.1rem;
}
.room-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.room-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}
.room-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}
.room-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.room-card:hover .room-image img {
    transform: scale(1.1);
}
.room-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 5;
}
.price-badge {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 8px 18px;
    border-radius: 25px;
    font-weight: 700;
    font-size: 16px;
    box-shadow: 0 4px 15px rgba(184, 160, 85, 0.4);
}
.price-badge small {
    font-weight: 400;
    font-size: 12px;
    opacity: 0.9;
}
.room-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(26, 54, 93, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.room-card:hover .room-overlay {
    opacity: 1;
}
.view-details-btn {
    background: white;
    color: #1a365d;
    padding: 12px 30px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    transform: translateY(20px);
}
.room-card:hover .view-details-btn {
    transform: translateY(0);
}
.view-details-btn:hover {
    background: #b8a055;
    color: white;
}
.room-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.room-title {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 10px;
}
.room-title a {
    color: #1a365d;
    text-decoration: none;
    transition: color 0.3s ease;
}
.room-title a:hover {
    color: #b8a055;
}
.room-rating {
    margin-bottom: 15px;
}
.room-rating .stars {
    color: #ffc107;
    font-size: 14px;
}
.room-rating .rating-text {
    color: #666;
    font-size: 13px;
    margin-left: 8px;
}
.room-features {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}
.room-features .feature-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #666;
    font-size: 14px;
}
.room-features .feature-item i {
    color: #b8a055;
}
.room-footer {
    margin-top: auto;
}
.book-now-btn {
    display: block;
    width: 100%;
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: white;
    padding: 14px;
    border-radius: 12px;
    text-align: center;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}
.book-now-btn:hover {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    transform: translateY(-2px);
}
</style>
@endif


@if(optional($global_setting_data)->home_testimonial_status == 'Show')
<section class="modern-testimonials py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <span class="testimonial-label">Testimonials</span>
                <h2 class="testimonial-main-title">What Our Guests Say</h2>
                <p class="testimonial-subtitle">Real experiences from our valued guests</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(isset($testimonial_all) && $testimonial_all->count() > 0)
                <div class="testimonial-modern-carousel owl-carousel">
                    @foreach($testimonial_all as $item)
                    <div class="testimonial-card">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <div class="testimonial-content">
                            <p class="testimonial-text">{!! $item->comment !!}</p>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="{{ asset('uploads/'.$item->photo) }}" alt="{{ $item->name }}">
                            </div>
                            <div class="author-info">
                                <h4 class="author-name">{{ $item->name }}</h4>
                                <p class="author-designation">{{ $item->designation }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
.modern-testimonials {
    background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
}
.testimonial-label {
    display: inline-block;
    color: #d4af37;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 15px;
}
.testimonial-main-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 15px;
}
.testimonial-subtitle {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1rem;
}
.testimonial-card {
    background: white;
    border-radius: 20px;
    padding: 40px 35px;
    margin: 20px 15px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}
.testimonial-card:hover {
    transform: translateY(-10px);
}
.quote-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
}
.quote-icon i {
    font-size: 24px;
    color: white;
}
.testimonial-text {
    color: #666;
    font-size: 16px;
    line-height: 1.8;
    font-style: italic;
    margin-bottom: 25px;
}
.testimonial-rating {
    margin-bottom: 25px;
    color: #ffc107;
}
.testimonial-author {
    display: flex;
    align-items: center;
    gap: 15px;
    padding-top: 25px;
    border-top: 2px solid #f0f0f0;
}
.author-image {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #b8a055;
}
.author-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.author-name {
    font-size: 18px;
    font-weight: 700;
    color: #1a365d;
    margin: 0 0 5px 0;
}
.author-designation {
    font-size: 14px;
    color: #666;
    margin: 0;
}
.testimonial-modern-carousel.owl-carousel .owl-dots {
    margin-top: 30px;
    text-align: center;
}
.testimonial-modern-carousel.owl-carousel .owl-dots .owl-dot {
    width: 12px;
    height: 12px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: inline-block;
    margin: 0 5px;
}
.testimonial-modern-carousel.owl-carousel .owl-dots .owl-dot.active {
    background: #b8a055;
}
</style>
@endif

@if(optional($global_setting_data)->home_latest_post_status == 'Show')
<div class="modern-blog py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h2 class="section-title">Latest Posts</h2>
                <p class="section-subtitle">Stay updated with our latest news and insights</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($post_all as $item)
            @if($loop->iteration > optional($global_setting_data)->home_latest_post_total ?? 3) 
            @break
            @endif
            <div class="col-lg-4 col-md-6">
                <article class="blog-card">
                    <div class="blog-image">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="{{ $item->heading }}" class="img-fluid">
                        <div class="blog-overlay">
                            <a href="{{ route('post',$item->id) }}" class="read-more-btn">
                                <i class="fas fa-book-open"></i> Read Article
                            </a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date">
                                <i class="fas fa-calendar-alt"></i>
                                {{ $item->created_at->format('M d, Y') }}
                            </span>
                        </div>
                        <h3 class="blog-title">
                            <a href="{{ route('post',$item->id) }}">{{ $item->heading }}</a>
                        </h3>
                        <div class="blog-excerpt">
                            <p>{!! Str::limit(strip_tags($item->short_content), 120) !!}</p>
                        </div>
                        <div class="blog-footer">
                            <a href="{{ route('post',$item->id) }}" class="read-more-link">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.modern-blog {
    background-color: #f8f9fa;
}
.blog-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}
.blog-image {
    position: relative;
    overflow: hidden;
    height: 220px;
}
.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.blog-card:hover .blog-image img {
    transform: scale(1.1);
}
.blog-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(184, 160, 85, 0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.blog-card:hover .blog-overlay {
    opacity: 1;
}
.blog-overlay .read-more-btn {
    color: white;
    text-decoration: none;
    padding: 12px 25px;
    border: 2px solid white;
    border-radius: 25px;
    font-weight: 600;
}
.blog-overlay .read-more-btn:hover {
    background: white;
    color: #b8a055;
}
.blog-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.blog-date {
    color: #b8a055;
    font-size: 13px;
    font-weight: 600;
}
.blog-title {
    margin: 15px 0;
    font-size: 18px;
    font-weight: 700;
}
.blog-title a {
    color: #1a365d;
    text-decoration: none;
}
.blog-title a:hover {
    color: #b8a055;
}
.blog-excerpt p {
    color: #666;
    font-size: 14px;
    line-height: 1.6;
}
.blog-footer {
    margin-top: auto;
}
.read-more-link {
    color: #b8a055;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}
.read-more-link:hover {
    color: #1a365d;
}
</style>
@endif


<!-- Like & Favorite Styles -->
<style>
.room-action-buttons {
    position: absolute;
    top: 15px;
    right: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 10;
}
.room-action-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    border: none;
    background: rgba(255, 255, 255, 0.95);
    color: #1a365d;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}
.room-action-btn:hover {
    transform: scale(1.15);
}
.room-action-btn i {
    font-size: 18px;
}
.room-action-btn .action-count {
    position: absolute;
    top: -8px;
    right: -8px;
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    min-width: 20px;
    height: 20px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 5px;
    opacity: 0;
    transform: scale(0);
    transition: all 0.3s ease;
}
.room-action-btn .action-count.show {
    opacity: 1;
    transform: scale(1);
}
.room-action-btn.like-btn { color: #b8a055; }
.room-action-btn.like-btn.active {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
}
.room-action-btn.like-btn.active i { font-weight: 900; }
.room-action-btn.like-btn:hover:not(.active) {
    background: #fef9ed;
    color: #b8a055;
}
.room-action-btn.favorite-btn { color: #1a365d; }
.room-action-btn.favorite-btn.active {
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: white;
}
.room-action-btn.favorite-btn.active i { font-weight: 900; }
.room-action-btn.favorite-btn:hover:not(.active) {
    background: #e8eef5;
    color: #1a365d;
}

/* Interaction Bar */
.room-interaction-bar {
    display: flex;
    gap: 10px;
    padding: 15px 0;
    margin-bottom: 15px;
    border-top: 1px solid #f0f0f0;
}
.interaction-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 25px;
    background: white;
    color: #666;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    flex: 1;
    justify-content: center;
}
.interaction-btn i { font-size: 16px; }
.interaction-btn .interaction-count {
    background: #f0f0f0;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 11px;
}
.interaction-btn.like-interaction { color: #b8a055; border-color: #e8dfc4; }
.interaction-btn.like-interaction.active {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    border-color: #b8a055;
    color: white;
}
.interaction-btn.like-interaction.active i { font-weight: 900; }
.interaction-btn.like-interaction.active .interaction-count {
    background: rgba(255, 255, 255, 0.3);
    color: white;
}
.interaction-btn.like-interaction:hover:not(.active) {
    border-color: #b8a055;
    background: #fef9ed;
}
.interaction-btn.favorite-interaction { color: #1a365d; border-color: #c5d4e8; }
.interaction-btn.favorite-interaction.active {
    background: linear-gradient(135deg, #1a365d, #2c5282);
    border-color: #1a365d;
    color: white;
}
.interaction-btn.favorite-interaction.active i { font-weight: 900; }
.interaction-btn.favorite-interaction.active .interaction-count {
    background: rgba(255, 255, 255, 0.3);
    color: white;
}
.interaction-btn.favorite-interaction:hover:not(.active) {
    border-color: #1a365d;
    background: #e8eef5;
}

/* Animations */
@keyframes heartBeat {
    0% { transform: scale(1); }
    15% { transform: scale(1.3); }
    30% { transform: scale(1); }
    45% { transform: scale(1.2); }
    60% { transform: scale(1); }
}
.room-action-btn.like-btn.animating i,
.interaction-btn.like-interaction.animating i {
    animation: heartBeat 0.6s ease-in-out;
}
@keyframes bookmarkPop {
    0% { transform: scale(1) rotate(0deg); }
    50% { transform: scale(1.3) rotate(-10deg); }
    100% { transform: scale(1) rotate(0deg); }
}
.room-action-btn.favorite-btn.animating i,
.interaction-btn.favorite-interaction.animating i {
    animation: bookmarkPop 0.4s ease-in-out;
}
@keyframes floatUp {
    0% { opacity: 1; transform: translateY(0) scale(1); }
    100% { opacity: 0; transform: translateY(-50px) scale(0.5); }
}
.floating-heart {
    position: absolute;
    pointer-events: none;
    animation: floatUp 1s ease-out forwards;
    color: #b8a055;
    font-size: 20px;
}

@media (max-width: 768px) {
    .room-action-buttons { top: 10px; right: 10px; gap: 8px; }
    .room-action-btn { width: 40px; height: 40px; }
    .room-action-btn i { font-size: 16px; }
    .interaction-btn .interaction-text { display: none; }
}
</style>

<!-- Like & Favorite JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
    const roomCards = document.querySelectorAll('.room-card[data-room-id]');
    const roomIds = Array.from(roomCards).map(card => card.dataset.roomId);
    
    if (roomIds.length > 0) fetchRoomStatus(roomIds);
    
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.room-action-btn, .interaction-btn');
        if (!btn) return;
        const roomId = btn.dataset.roomId;
        const type = btn.dataset.type;
        if (roomId && type) toggleFavorite(roomId, type, btn);
    });
    
    function fetchRoomStatus(roomIds) {
        fetch('{{ route("room.favorite.status") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify({ room_ids: roomIds })
        })
        .then(r => r.json())
        .then(data => {
            if (data.success && data.status) {
                Object.keys(data.status).forEach(roomId => updateRoomUI(roomId, data.status[roomId]));
            }
        }).catch(e => console.error('Error:', e));
    }
    
    function toggleFavorite(roomId, type, btn) {
        btn.classList.add('animating');
        if (type === 'like' && !btn.classList.contains('active')) createFloatingHeart(btn);
        
        fetch('{{ route("room.favorite.toggle") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify({ room_id: roomId, type: type })
        })
        .then(r => {
            if (r.status === 401) {
                return r.json().then(data => {
                    showToast('info', 'Please login to ' + (type === 'like' ? 'like' : 'save') + ' rooms');
                    if (data.redirect) setTimeout(() => window.location.href = data.redirect, 1500);
                    throw new Error('Unauthorized');
                });
            }
            return r.json();
        })
        .then(data => {
            if (data.success) {
                updateRoomUI(roomId, {
                    liked: type === 'like' ? data.is_active : null,
                    favorited: type === 'favorite' ? data.is_active : null,
                    like_count: data.like_count,
                    favorite_count: data.favorite_count
                });
                showToast('success', data.message);
            }
        })
        .catch(e => { if (e.message !== 'Unauthorized') console.error('Error:', e); })
        .finally(() => setTimeout(() => btn.classList.remove('animating'), 600));
    }
    
    function updateRoomUI(roomId, status) {
        const card = document.querySelector(`.room-card[data-room-id="${roomId}"]`);
        if (!card) return;
        
        if (status.liked !== null && status.liked !== undefined) {
            card.querySelectorAll('[data-type="like"]').forEach(btn => {
                const icon = btn.querySelector('i');
                btn.classList.toggle('active', status.liked);
                if (icon) { icon.classList.toggle('fas', status.liked); icon.classList.toggle('far', !status.liked); }
            });
        }
        if (status.favorited !== null && status.favorited !== undefined) {
            card.querySelectorAll('[data-type="favorite"]').forEach(btn => {
                const icon = btn.querySelector('i');
                btn.classList.toggle('active', status.favorited);
                if (icon) { icon.classList.toggle('fas', status.favorited); icon.classList.toggle('far', !status.favorited); }
            });
        }
        if (status.like_count !== undefined) {
            card.querySelectorAll('.like-count').forEach(el => {
                el.textContent = status.like_count;
                el.classList.toggle('show', status.like_count > 0);
            });
        }
        if (status.favorite_count !== undefined) {
            card.querySelectorAll('.favorite-count').forEach(el => {
                el.textContent = status.favorite_count;
                el.classList.toggle('show', status.favorite_count > 0);
            });
        }
    }
    
    function createFloatingHeart(btn) {
        const heart = document.createElement('span');
        heart.className = 'floating-heart';
        heart.innerHTML = '<i class="fas fa-heart"></i>';
        heart.style.left = '50%';
        heart.style.top = '50%';
        btn.appendChild(heart);
        setTimeout(() => heart.remove(), 1000);
    }
    
    function showToast(type, message) {
        if (typeof iziToast !== 'undefined') {
            iziToast[type]({ title: '', message: message, position: 'topRight', timeout: 3000 });
        }
    }
});
</script>

<script>
$(document).ready(function() {
    if (typeof $.fn.owlCarousel !== 'undefined') {
        $('.testimonial-modern-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsive: { 0: { items: 1 }, 768: { items: 2 }, 1024: { items: 3 } }
        });
    }
});
</script>

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({ title: '', position: 'topRight', message: '{{ $error }}' });
        </script>
    @endforeach
@endif

@endsection
