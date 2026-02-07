@extends('front.layout.app')

@section('main_content')

<!-- Hero Section -->
<section class="room-detail-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/'.$single_room_data->featured_photo) }}" alt="{{ $single_room_data->name }}" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <a href="{{ route('room') }}">Rooms</a>
                        <span class="separator">→</span>
                        <span class="current">{{ $single_room_data->name }}</span>
                    </nav>
                    <h1 class="hero-title">{{ $single_room_data->name }}</h1>
                    <div class="hero-meta">
                        @php
                            $avgRating = round($single_room_data->averageRating(), 1);
                            $ratingCount = $single_room_data->ratingCount();
                        @endphp
                        @if($ratingCount > 0)
                        <div class="rating-badge">
                            <i class="fas fa-star"></i>
                            <span>{{ $avgRating }} ({{ $ratingCount }} reviews)</span>
                        </div>
                        @endif
                        <div class="price-badge">
                            <span class="price">${{ $single_room_data->price }}</span>
                            <span class="period">/night</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="room-detail-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left-content">
                <!-- Photo Gallery -->
                <div class="photo-gallery-section">
                    <div class="main-gallery">
                        <div class="room-detail-carousel owl-carousel">
                            <div class="gallery-item">
                                <img src="{{ asset('uploads/'.$single_room_data->featured_photo) }}" alt="{{ $single_room_data->name }}" class="img-fluid">
                            </div>
                            @foreach($single_room_data->rRoomPhoto as $item)
                            <div class="gallery-item">
                                <img src="{{ asset('uploads/'.$item->photo) }}" alt="{{ $single_room_data->name }}" class="img-fluid">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Room Description -->
                <div class="room-description-card">
                    <h2 class="section-title">
                        <i class="fas fa-info-circle"></i> About This Room
                    </h2>
                    <div class="description-content">
                        {!! $single_room_data->description !!}
                    </div>
                </div>

                <!-- Room Features -->
                <div class="room-features-card">
                    <h2 class="section-title">
                        <i class="fas fa-list-check"></i> Room Features
                    </h2>
                    <div class="features-grid">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </div>
                            <div class="feature-info">
                                <h4>Room Size</h4>
                                <p>{{ $single_room_data->size }}</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-bed"></i>
                            </div>
                            <div class="feature-info">
                                <h4>Beds</h4>
                                <p>{{ $single_room_data->total_beds }} Beds</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-bath"></i>
                            </div>
                            <div class="feature-info">
                                <h4>Bathrooms</h4>
                                <p>{{ $single_room_data->total_bathrooms }} Bathrooms</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-door-open"></i>
                            </div>
                            <div class="feature-info">
                                <h4>Balconies</h4>
                                <p>{{ $single_room_data->total_balconies }} Balconies</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Amenities -->
                <div class="room-amenities-card">
                    <h2 class="section-title">
                        <i class="fas fa-star"></i> Amenities
                    </h2>
                    <div class="amenities-grid">
                        @php
                        $arr = explode(',', $single_room_data->amenities);
                        foreach ($arr as $amenity_id) {
                            $temp_row = \App\Models\Amenity::find(trim($amenity_id));
                            if ($temp_row) {
                                echo '<div class="amenity-item">';
                                echo '<i class="fas fa-check-circle"></i>';
                                echo '<span>' . $temp_row->name . '</span>';
                                echo '</div>';
                            }
                        }
                        @endphp
                    </div>
                </div>

                @if($single_room_data->video_id != '')
                <!-- Video Section -->
                <div class="room-video-card">
                    <h2 class="section-title">
                        <i class="fas fa-video"></i> Room Tour
                    </h2>
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/{{ $single_room_data->video_id }}" title="Room Tour" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                @endif

                <!-- Reviews Section -->
                <div class="reviews-section">
                    <h2 class="section-title">
                        <i class="fas fa-comments"></i> Customer Reviews
                    </h2>
                    
                    @if(Auth::guard('customer')->check())
                        @php
                            $customer_id = Auth::guard('customer')->id();
                            $hasBooked = \App\Models\OrderDetail::where('room_id', $single_room_data->id)
                                            ->whereHas('order', function($q) use ($customer_id) {
                                                $q->where('customer_id', $customer_id);
                                            })->exists();

                            $alreadyReviewed = \App\Models\Review::where('room_id', $single_room_data->id)
                                            ->where('customer_id', $customer_id)
                                            ->exists();
                        @endphp

                        @if($hasBooked && !$alreadyReviewed)
                            <div class="review-form-card">
                                <h3><i class="fas fa-pen"></i> Leave Your Review</h3>
                                <form action="{{ route('room.review.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $single_room_data->id }}">
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <div class="star-rating-input">
                                            <input type="radio" name="rating" value="5" id="star5" required>
                                            <label for="star5"><i class="fas fa-star"></i></label>
                                            <input type="radio" name="rating" value="4" id="star4">
                                            <label for="star4"><i class="fas fa-star"></i></label>
                                            <input type="radio" name="rating" value="3" id="star3">
                                            <label for="star3"><i class="fas fa-star"></i></label>
                                            <input type="radio" name="rating" value="2" id="star2">
                                            <label for="star2"><i class="fas fa-star"></i></label>
                                            <input type="radio" name="rating" value="1" id="star1">
                                            <label for="star1"><i class="fas fa-star"></i></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Your Review</label>
                                        <textarea name="comment" class="form-control" rows="4" placeholder="Share your experience..."></textarea>
                                    </div>
                                    <button type="submit" class="btn-submit-review">
                                        <i class="fas fa-paper-plane"></i> Submit Review
                                    </button>
                                </form>
                            </div>
                        @elseif($alreadyReviewed)
                            <div class="alert-info-custom">
                                <i class="fas fa-check-circle"></i> You have already reviewed this room.
                            </div>
                        @endif
                    @else
                        <div class="alert-warning-custom">
                            <i class="fas fa-sign-in-alt"></i> Please <a href="{{ route('customer_login') }}">login</a> to leave a review.
                        </div>
                    @endif

                    <div class="reviews-list">
                        @forelse($single_room_data->reviews as $review)
                            <div class="review-card">
                                <div class="review-header">
                                    <div class="reviewer-info">
                                        <div class="reviewer-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="reviewer-details">
                                            <h4>{{ $review->customer->name ?? 'Customer' }}</h4>
                                            <div class="review-rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-date">
                                        <i class="far fa-clock"></i> {{ $review->created_at->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="no-reviews">
                                <i class="far fa-comment-dots"></i>
                                <p>No reviews yet. Be the first to review this room!</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5 col-sm-12 right-sidebar">
                <div class="sidebar-sticky">
                    
                    <!-- Price Card -->
                    <div class="price-card">
                        <div class="price-header">
                            <h3>Room Price</h3>
                            <div class="price-amount">
                                <span class="price">${{ $single_room_data->price }}</span>
                                <span class="period">/night</span>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Card -->
                    <div class="booking-card">
                        <h3><i class="fas fa-calendar-check"></i> Reserve This Room</h3>
                        <form action="{{ route('cart_submit') }}" method="post">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $single_room_data->id }}">
                            
                            <div class="form-group">
                                <label><i class="far fa-calendar"></i> Check-in & Check-out</label>
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Select dates" required>
                            </div>
                            
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> Adults</label>
                                <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Number of adults" required>
                            </div>
                            
                            <div class="form-group">
                                <label><i class="fas fa-child"></i> Children</label>
                                <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Number of children">
                            </div>
                            
                            <button type="submit" class="btn-book-now">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>
                    </div>

                    <!-- Quick Info Card -->
                    <div class="quick-info-card">
                        <h3><i class="fas fa-info-circle"></i> Quick Info</h3>
                        <div class="info-list">
                            <div class="info-item">
                                <i class="fas fa-users"></i>
                                <span>Max {{ $single_room_data->total_guests }} Guests</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-bed"></i>
                                <span>{{ $single_room_data->total_beds }} Beds</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-bath"></i>
                                <span>{{ $single_room_data->total_bathrooms }} Bathrooms</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<style>
/* Room Detail Hero Section */
.room-detail-hero {
    position: relative;
    height: 50vh;
    min-height: 400px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.room-detail-hero .hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.room-detail-hero .hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.room-detail-hero .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(26, 54, 93, 0.85), rgba(26, 54, 93, 0.7));
    z-index: 2;
}

.room-detail-hero .hero-content {
    position: relative;
    z-index: 3;
    width: 100%;
}

.room-detail-hero .breadcrumb-nav {
    margin-bottom: 20px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
}

.room-detail-hero .breadcrumb-nav a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: color 0.3s ease;
}

.room-detail-hero .breadcrumb-nav a:hover {
    color: #d4af37;
}

.room-detail-hero .separator {
    margin: 0 10px;
    color: rgba(255, 255, 255, 0.5);
}

.room-detail-hero .current {
    color: #d4af37;
}

.room-detail-hero .hero-title {
    font-size: 3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.room-detail-hero .hero-meta {
    display: flex;
    gap: 20px;
    align-items: center;
    flex-wrap: wrap;
}

.room-detail-hero .rating-badge,
.room-detail-hero .price-badge {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 10px 20px;
    border-radius: 25px;
    color: white;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.room-detail-hero .rating-badge i {
    color: #ffc107;
}

.room-detail-hero .price-badge .price {
    font-size: 24px;
    color: #d4af37;
}

.room-detail-hero .price-badge .period {
    font-size: 14px;
    opacity: 1;
    color: #d4af37;
}

/* Main Content */
.room-detail-content {
    padding: 60px 0;
    background: #f8f9fa;
}

/* Photo Gallery */
.photo-gallery-section {
    margin-bottom: 40px;
}

.room-detail-carousel.owl-carousel {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.room-detail-carousel .gallery-item img {
    width: 100%;
    height: 500px;
    object-fit: cover;
}

.room-detail-carousel.owl-carousel .owl-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 0 20px;
}

.room-detail-carousel.owl-carousel .owl-nav button {
    width: 50px;
    height: 50px;
    background: white !important;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
}

.room-detail-carousel.owl-carousel .owl-nav button:hover {
    background: #b8a055 !important;
    transform: scale(1.1);
}

.room-detail-carousel.owl-carousel .owl-nav button span {
    font-size: 24px;
    color: #1a365d;
}

.room-detail-carousel.owl-carousel .owl-nav button:hover span {
    color: white;
}

/* Content Cards */
.room-description-card,
.room-features-card,
.room-amenities-card,
.room-video-card,
.reviews-section {
    background: white;
    border-radius: 20px;
    padding: 35px;
    margin-bottom: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.section-title {
    font-size: 24px;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.section-title i {
    color: #b8a055;
    font-size: 22px;
}

.description-content {
    color: #666;
    font-size: 16px;
    line-height: 1.8;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.feature-box {
    display: flex;
    gap: 15px;
    align-items: center;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.feature-box:hover {
    background: #b8a055;
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(184, 160, 85, 0.3);
}

.feature-box .feature-icon {
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.feature-box .feature-icon i {
    font-size: 22px;
    color: #b8a055;
    transition: color 0.3s ease;
}

.feature-box:hover .feature-icon i {
    color: #1a365d;
}

.feature-box .feature-info h4 {
    font-size: 16px;
    font-weight: 700;
    color: #1a365d;
    margin: 0 0 5px 0;
    transition: color 0.3s ease;
}

.feature-box:hover .feature-info h4 {
    color: white;
}

.feature-box .feature-info p {
    font-size: 14px;
    color: #666;
    margin: 0;
    transition: color 0.3s ease;
}

.feature-box:hover .feature-info p {
    color: rgba(255, 255, 255, 0.9);
}

/* Amenities Grid */
.amenities-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.amenity-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.amenity-item:hover {
    background: rgba(184, 160, 85, 0.1);
    transform: translateX(5px);
}

.amenity-item i {
    color: #b8a055;
    font-size: 18px;
}

.amenity-item span {
    color: #333;
    font-size: 15px;
    font-weight: 500;
}

/* Video Wrapper */
.video-wrapper {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    border-radius: 15px;
}

.video-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 15px;
}

/* Reviews Section */
.review-form-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 30px;
}

.review-form-card h3 {
    font-size: 20px;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.star-rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 5px;
    margin-bottom: 20px;
}

.star-rating-input input {
    display: none;
}

.star-rating-input label {
    cursor: pointer;
    font-size: 30px;
    color: #ddd;
    transition: color 0.2s ease;
}

.star-rating-input input:checked ~ label,
.star-rating-input label:hover,
.star-rating-input label:hover ~ label {
    color: #ffc107;
}

.btn-submit-review {
    background: #b8a055;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
    cursor: pointer;
}

.btn-submit-review:hover {
    background: #a08f4a;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
}

.alert-info-custom,
.alert-warning-custom {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-info-custom {
    background: #d1ecf1;
    color: #0c5460;
}

.alert-warning-custom {
    background: #fff3cd;
    color: #856404;
}

.alert-warning-custom a {
    color: #b8a055;
    font-weight: 600;
    text-decoration: underline;
}

.reviews-list {
    margin-top: 30px;
}

.review-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.review-card:hover {
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transform: translateY(-3px);
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.reviewer-info {
    display: flex;
    gap: 15px;
    align-items: center;
}

.reviewer-avatar {
    width: 50px;
    height: 50px;
    background: #b8a055;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
}

.reviewer-details h4 {
    font-size: 16px;
    font-weight: 700;
    color: #1a365d;
    margin: 0 0 5px 0;
}

.review-rating {
    color: #ffc107;
    font-size: 14px;
}

.review-date {
    font-size: 13px;
    color: #999;
}

.review-content p {
    color: #666;
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
}

.no-reviews {
    text-align: center;
    padding: 40px 20px;
    color: #999;
}

.no-reviews i {
    font-size: 48px;
    margin-bottom: 15px;
    opacity: 0.5;
}

/* Sidebar */
.sidebar-sticky {
    position: sticky;
    top: 100px;
}

.price-card,
.booking-card,
.quick-info-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 25px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.price-card .price-header h3 {
    font-size: 18px;
    font-weight: 600;
    color: #666;
    margin-bottom: 15px;
}

.price-card .price-amount {
    display: flex;
    align-items: baseline;
    gap: 8px;
}

.price-card .price {
    font-size: 36px;
    font-weight: 700;
    color: #b8a055;
}

.price-card .period {
    font-size: 16px;
    color: #666;
}

.booking-card h3,
.quick-info-card h3 {
    font-size: 20px;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.booking-card .form-group {
    margin-bottom: 20px;
}

.booking-card label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

.booking-card label i {
    color: #b8a055;
    margin-right: 5px;
}

.booking-card .form-control {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.booking-card .form-control:focus {
    border-color: #b8a055;
    outline: none;
    box-shadow: 0 0 0 3px rgba(184, 160, 85, 0.1);
}

.btn-book-now {
    width: 100%;
    background: #b8a055;
    color: white;
    padding: 15px;
    border: none;
    border-radius: 25px;
    font-weight: 700;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
    cursor: pointer;
    margin-top: 10px;
}

.btn-book-now:hover {
    background: #a08f4a;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
}

.info-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 10px;
}

.info-item i {
    color: #b8a055;
    font-size: 18px;
    width: 20px;
    text-align: center;
}

.info-item span {
    color: #333;
    font-size: 15px;
    font-weight: 500;
}

/* Responsive */
@media (max-width: 991px) {
    .room-detail-hero .hero-title {
        font-size: 2.5rem;
    }
    
    .features-grid,
    .amenities-grid {
        grid-template-columns: 1fr;
    }
    
    .sidebar-sticky {
        position: relative;
        top: 0;
        margin-top: 30px;
    }
}

@media (max-width: 768px) {
    .room-detail-hero {
        height: 40vh;
        min-height: 300px;
    }
    
    .room-detail-hero .hero-title {
        font-size: 2rem;
    }
    
    .room-detail-carousel .gallery-item img {
        height: 300px;
    }
    
    .room-description-card,
    .room-features-card,
    .room-amenities-card,
    .room-video-card,
    .reviews-section {
        padding: 25px 20px;
    }
}
</style>

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@endsection