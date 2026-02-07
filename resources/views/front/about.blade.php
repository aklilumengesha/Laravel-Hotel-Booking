@extends('front.layout.app')

@section('main_content')

<!-- Hero Section -->
<section class="about-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Hotel Lobby" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">About Us</span>
                    </nav>
                    <h1 class="hero-title">About Our Hotel</h1>
                    <p class="hero-subtitle">Luxury, Comfort & Unforgettable Experiences</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Who We Are Section -->
<section class="who-we-are py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="content-wrapper">
                    <h2 class="section-title">Who We Are</h2>
                    <div class="title-underline"></div>
                    <p class="lead-text">
                        {{ $about->subtitle ?? 'Welcome to a world of luxury and comfort where every detail is crafted to perfection.' }}
                    </p>
                    <div class="story-content">
                        {!! $about->description ?? 'At our hotel, we believe in creating extraordinary experiences that go beyond accommodation. Our commitment to excellence, attention to detail, and warm hospitality ensures that every guest feels valued and pampered. From the moment you step into our elegant lobby to the time you bid farewell, we strive to make your stay memorable and comfortable.' !!}
                    </div>
                    <div class="mission-values mt-4">
                        <div class="value-item">
                            <i class="fas fa-heart text-gold"></i>
                            <span><strong>Our Mission:</strong> To provide exceptional hospitality experiences</span>
                        </div>
                        <div class="value-item">
                            <i class="fas fa-star text-gold"></i>
                            <span><strong>Our Values:</strong> Excellence, integrity, and genuine care</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="image-wrapper">
                    @if(!empty($about->images) && count($about->images) >= 1)
                        <img src="{{ asset('storage/' . $about->images[0]['path']) }}" alt="Hotel Interior" class="main-image">
                    @else
                        <img src="{{ asset('uploads/slide2.jpg') }}" alt="Hotel Interior" class="main-image">
                    @endif
                    <div class="image-decoration"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Why Choose Us</h2>
                <div class="title-underline mx-auto"></div>
                <p class="section-subtitle">Discover what makes us the perfect choice for your stay</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <h4 class="feature-title">Luxury Rooms</h4>
                    <p class="feature-description">Elegantly designed rooms with premium amenities and stunning views for ultimate comfort.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-swimming-pool"></i>
                    </div>
                    <h4 class="feature-title">Swimming Pool</h4>
                    <p class="feature-description">Relax and unwind in our pristine swimming pool with poolside service and comfortable loungers.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h4 class="feature-title">Free WiFi</h4>
                    <p class="feature-description">Stay connected with complimentary high-speed internet access throughout the property.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h4 class="feature-title">Fine Dining</h4>
                    <p class="feature-description">Savor exquisite cuisine at our restaurant featuring local and international delicacies.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-plane"></i>
                    </div>
                    <h4 class="feature-title">Airport Pickup</h4>
                    <p class="feature-description">Convenient airport transfer service to ensure a smooth start and end to your journey.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="feature-title">24/7 Support</h4>
                    <p class="feature-description">Round-the-clock assistance from our dedicated staff to cater to all your needs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hotel Statistics Section -->
<section class="hotel-stats-clean py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Excellence in Numbers</h2>
                <div class="title-underline mx-auto"></div>
                <p class="section-subtitle mt-3">Our commitment to quality reflected in every milestone</p>
            </div>
        </div>
        <div class="row g-4">
            @if(!empty($about->counters))
                @foreach($about->counters as $counter)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="stat-card-clean">
                        <div class="stat-icon-clean">
                            <i class="{{ $counter['icon'] ?? 'fas fa-star' }}"></i>
                        </div>
                        <div class="stat-number-clean" data-target="{{ $counter['number'] ?? 0 }}">0</div>
                        <div class="stat-label-clean">{{ $counter['label'] ?? '' }}</div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card-clean">
                        <div class="stat-icon-clean">
                            <i class="fas fa-hotel"></i>
                        </div>
                        <div class="stat-number-clean" data-target="10">0</div>
                        <div class="stat-label-clean">Years Experience</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card-clean">
                        <div class="stat-icon-clean">
                            <i class="fas fa-smile"></i>
                        </div>
                        <div class="stat-number-clean" data-target="5000">0</div>
                        <div class="stat-label-clean">Happy Guests</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card-clean">
                        <div class="stat-icon-clean">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <div class="stat-number-clean" data-target="50">0</div>
                        <div class="stat-label-clean">Luxury Rooms</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-card-clean">
                        <div class="stat-icon-clean">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-number-clean" data-target="100">0</div>
                        <div class="stat-label-clean">% Satisfaction</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>



<!-- Guest Testimonials Section -->
<section class="guest-testimonials py-5">
    <div class="testimonials-background">
        <div class="testimonials-overlay"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title text-white">What Our Guests Say</h2>
                <div class="title-underline mx-auto"></div>
                <p class="section-subtitle text-white">Real experiences from our valued guests</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonials-carousel owl-carousel">
                    @if(isset($testimonial_all) && $testimonial_all->count() > 0)
                        @foreach($testimonial_all as $testimonial)
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">{{ $testimonial->comment }}</p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-image-wrapper">
                                        <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="{{ $testimonial->name }}" class="author-image">
                                    </div>
                                    <div class="author-details">
                                        <h5 class="author-name">{{ $testimonial->name }}</h5>
                                        <p class="author-title">{{ $testimonial->designation }}</p>
                                        <div class="author-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Verified Guest</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Default testimonials if none exist -->
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">Absolutely wonderful experience! The staff was incredibly friendly and the rooms were luxurious. The attention to detail and exceptional service made our stay truly memorable. Highly recommend this hotel to anyone visiting the area.</p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-image-wrapper">
                                        <img src="{{ asset('uploads/user.jpg') }}" alt="Alice Johnson" class="author-image">
                                    </div>
                                    <div class="author-details">
                                        <h5 class="author-name">Alice Johnson</h5>
                                        <p class="author-title">Travel Blogger</p>
                                        <div class="author-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>New York, USA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">Excellent facilities for business meetings and a very comfortable environment. The Wi-Fi was fast and reliable, which is crucial for my work. The business center and meeting rooms exceeded my expectations.</p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-image-wrapper">
                                        <img src="{{ asset('uploads/default.png') }}" alt="Robert Williams" class="author-image">
                                    </div>
                                    <div class="author-details">
                                        <h5 class="author-name">Robert Williams</h5>
                                        <p class="author-title">Business Executive</p>
                                        <div class="author-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>London, UK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">A perfect family getaway! The pool was a hit with the kids, and the dining options were superb. The family-friendly amenities and spacious rooms made our vacation unforgettable. We will definitely be coming back next year.</p>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-image-wrapper">
                                        <img src="{{ asset('uploads/user.jpg') }}" alt="Maria Garcia" class="author-image">
                                    </div>
                                    <div class="author-details">
                                        <h5 class="author-name">Maria Garcia</h5>
                                        <p class="author-title">Family Traveler</p>
                                        <div class="author-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Madrid, Spain</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Preview Section -->
<section class="gallery-preview py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Hotel Gallery</h2>
                <div class="title-underline mx-auto"></div>
                <p class="section-subtitle">Experience our luxurious spaces and amenities</p>
            </div>
        </div>
        <div class="row g-3">
            @if($photos && $photos->count() > 0)
                @foreach($photos as $photo)
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="gallery-item">
                        <img src="{{ asset('uploads/'.$photo->photo) }}" alt="{{ $photo->caption ?? 'Hotel Gallery' }}" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <i class="fas fa-search-plus"></i>
                                @if($photo->caption)
                                <h5>{{ $photo->caption }}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Fallback if no photos in database -->
                <div class="col-12 text-center">
                    <p class="text-muted">No photos available at the moment. Please check back later.</p>
                </div>
            @endif
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                @if(optional($global_page_data)->photo_gallery_status == 1)
                <a href="{{ route('photo_gallery') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-images me-2"></i>View Full Gallery
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Call-to-Action Section -->

<!-- FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* About Page Styles */
:root {
    --gold-color: #d4af37;
    --dark-blue: #1a365d;
    --beige: #f7f3e9;
    --warm-white: #fefcf7;
}

/* Hero Section */
.about-hero {
    position: relative;
    height: 60vh;
    min-height: 500px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.6));
    z-index: 2;
}

.hero-content {
    position: relative;
    z-index: 3;
    width: 100%;
}

.breadcrumb-nav {
    margin-bottom: 30px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
}

.breadcrumb-nav a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-nav a:hover {
    color: var(--gold-color);
}

.separator {
    margin: 0 15px;
    color: var(--gold-color);
}

.current {
    color: var(--gold-color);
    font-weight: 600;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 300;
    letter-spacing: 1px;
}

/* Who We Are Section */
.who-we-are {
    background-color: var(--warm-white);
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 20px;
}

.title-underline {
    width: 60px;
    height: 4px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    margin-bottom: 30px;
}

.lead-text {
    font-size: 1.2rem;
    color: #666;
    font-weight: 300;
    margin-bottom: 25px;
    line-height: 1.7;
}

.story-content {
    color: #555;
    line-height: 1.8;
    font-size: 16px;
}

.mission-values {
    padding-top: 20px;
}

.value-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    font-size: 15px;
    color: #555;
}

.value-item i {
    margin-right: 15px;
    font-size: 18px;
}

.text-gold {
    color: var(--gold-color);
}

.image-wrapper {
    position: relative;
}

.main-image {
    width: 100%;
    border-radius: 15px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.image-decoration {
    position: absolute;
    top: -20px;
    right: -20px;
    width: 100px;
    height: 100px;
    border: 3px solid var(--gold-color);
    border-radius: 15px;
    z-index: -1;
}

/* Why Choose Us Section */
.why-choose-us {
    background-color: #ffffff;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 0;
}

.feature-card {
    background: white;
    padding: 40px 30px;
    border-radius: 15px;
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-color: var(--gold-color);
}

.feature-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 25px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.feature-icon i {
    font-size: 32px;
    color: white;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1);
}

.feature-title {
    font-size: 20px;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 15px;
}

.feature-description {
    color: #666;
    line-height: 1.6;
    margin: 0;
}

/* Hotel Statistics Section */
.hotel-stats {
    position: relative;
    padding: 80px 0;
    background: linear-gradient(135deg, var(--dark-blue), #2c5282);
    overflow: hidden;
}

.stats-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset("uploads/slide2.jpg") }}');
    background-size: cover;
    background-position: center;
    opacity: 0.1;
}

.stats-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--dark-blue), #2c5282);
}

.stat-card {
    text-align: center;
    color: white;
}

.stat-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid var(--gold-color);
}

.stat-icon i {
    font-size: 32px;
    color: var(--gold-color);
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 16px;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
}

/* Modern Stats Cards */
.stat-card-modern {
    position: relative;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(212, 175, 55, 0.3);
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    color: white;
    transition: all 0.4s ease;
    overflow: hidden;
}

.stat-card-modern:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: var(--gold-color);
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.stat-icon-modern {
    width: 90px;
    height: 90px;
    margin: 0 auto 25px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
}

.stat-card-modern:hover .stat-icon-modern {
    transform: scale(1.1) rotate(360deg);
    box-shadow: 0 15px 40px rgba(212, 175, 55, 0.6);
}

.stat-icon-modern i {
    font-size: 40px;
    color: white;
}

.stat-content-modern {
    position: relative;
    z-index: 2;
}

.stat-number-modern {
    font-size: 3.5rem;
    font-weight: 800;
    color: white;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    line-height: 1;
}

.stat-label-modern {
    font-size: 16px;
    color: rgba(255, 255, 255, 0.95);
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.stat-decoration {
    position: absolute;
    bottom: -50px;
    right: -50px;
    width: 150px;
    height: 150px;
    background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    transition: all 0.4s ease;
}

.stat-card-modern:hover .stat-decoration {
    bottom: -30px;
    right: -30px;
    background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, transparent 70%);
}

.bg-gold {
    background: var(--gold-color) !important;
}

/* Clean Simple Stats Section */
.hotel-stats-clean {
    background-color: #ffffff;
}

.stat-card-clean {
    text-align: center;
    padding: 40px 20px;
    transition: all 0.3s ease;
}

.stat-card-clean:hover {
    transform: translateY(-5px);
}

.stat-icon-clean {
    width: 80px;
    height: 80px;
    margin: 0 auto 25px;
    background: white;
    border: 3px solid var(--gold-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s ease;
}

.stat-card-clean:hover .stat-icon-clean {
    background: var(--gold-color);
    transform: scale(1.1);
}

.stat-icon-clean i {
    font-size: 36px;
    color: var(--gold-color);
    transition: color 0.4s ease;
}

.stat-card-clean:hover .stat-icon-clean i {
    color: white;
}

.stat-number-clean {
    font-size: 3.5rem;
    font-weight: 800;
    color: var(--dark-blue);
    margin-bottom: 10px;
    line-height: 1;
}

.stat-label-clean {
    font-size: 15px;
    color: #666;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Our Team Section */
.our-team {
    background-color: var(--beige);
}

.team-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.team-image {
    position: relative;
    overflow: hidden;
    height: 300px;
}

.team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.team-card:hover .team-image img {
    transform: scale(1.1);
}

.team-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(26, 54, 93, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.team-card:hover .team-overlay {
    opacity: 1;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-links a {
    width: 45px;
    height: 45px;
    background: var(--gold-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: white;
    color: var(--gold-color);
    transform: translateY(-3px);
}

.team-content {
    padding: 30px 25px;
    text-align: center;
}

.team-name {
    font-size: 20px;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 8px;
}

.team-position {
    color: var(--gold-color);
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.team-description {
    color: #666;
    font-size: 14px;
    line-height: 1.6;
    margin: 0;
}

/* Guest Testimonials Section */
.guest-testimonials {
    position: relative;
    background: linear-gradient(135deg, var(--dark-blue), #2c5282);
    overflow: hidden;
}

.testimonials-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset("uploads/slide1.jpg") }}');
    background-size: cover;
    background-position: center;
    opacity: 0.1;
}

.testimonials-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(26, 54, 93, 0.9), rgba(44, 82, 130, 0.9));
}

.testimonial-item {
    padding: 0 15px;
}

.testimonial-content {
    background: rgba(255, 255, 255, 0.95);
    padding: 40px 35px;
    border-radius: 20px;
    text-align: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.testimonial-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
}

.quote-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
}

.quote-icon i {
    font-size: 24px;
    color: white;
}

.testimonial-text {
    color: #333;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 25px;
    font-style: italic;
    font-weight: 400;
}

.stars {
    color: var(--gold-color);
    font-size: 18px;
    margin-bottom: 30px;
    display: flex;
    justify-content: center;
    gap: 3px;
}

.testimonial-author {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.author-image-wrapper {
    position: relative;
}

.author-image {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--gold-color);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.author-details {
    text-align: left;
    flex: 1;
}

.author-name {
    color: var(--dark-blue);
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 5px;
}

.author-title {
    color: #666;
    font-size: 14px;
    margin-bottom: 8px;
    font-weight: 500;
}

.author-location {
    display: flex;
    align-items: center;
    gap: 5px;
    color: var(--gold-color);
    font-size: 13px;
    font-weight: 600;
}

.author-location i {
    font-size: 12px;
}

/* Gallery Preview Section */
.gallery-preview {
    background-color: var(--warm-white);
}

.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.gallery-item img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(26, 54, 93, 0.9), rgba(212, 175, 55, 0.8));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-content {
    text-align: center;
    color: white;
}

.gallery-content i {
    font-size: 40px;
    margin-bottom: 15px;
    display: block;
}

.gallery-content h5 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 8px;
    color: white;
}

.gallery-content p {
    font-size: 14px;
    margin: 0;
    opacity: 0.9;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2.2rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .testimonial-author {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .author-details {
        text-align: center;
    }
    
    .testimonial-content {
        padding: 30px 25px;
    }
    
    .gallery-item img {
        height: 220px;
    }
    
    .gallery-content h5 {
        font-size: 16px;
    }
    
    .gallery-content p {
        font-size: 13px;
    }
}

/* AOS Animation Overrides */
[data-aos] {
    pointer-events: none;
}

[data-aos].aos-animate {
    pointer-events: auto;
}
</style>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });
    
    // Counter Animation
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number, .stat-number-modern, .stat-number-clean');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const increment = target / 100;
            let current = 0;
            
            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.ceil(current);
                    setTimeout(updateCounter, 20);
                } else {
                    counter.textContent = target;
                }
            };
            
            // Start animation when element is in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            observer.observe(counter);
        });
    }
    
    // Initialize counter animation
    animateCounters();
    
    // Initialize testimonials carousel if owl carousel is available
    if (typeof $.fn.owlCarousel !== 'undefined') {
        $('.testimonials-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    }
});
</script>

@endsection