@extends('front.layout.app')

@section('main_content')

<!-- Hero Section -->
<section class="gallery-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Video Gallery" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">{{ $global_page_data->video_gallery_heading ?? 'Video Gallery' }}</span>
                    </nav>
                    <h1 class="hero-title">{{ $global_page_data->video_gallery_heading ?? 'Video Gallery' }}</h1>
                    <p class="hero-subtitle">Watch our collection of videos showcasing our hotel and services</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Gallery Section -->
<section class="video-gallery-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Videos</h2>
                <div class="title-underline mx-auto"></div>
                <p class="section-subtitle">Experience our hotel through these captivating videos</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($video_all as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="video-card">
                    <div class="video-thumbnail">
                        <img src="http://img.youtube.com/vi/{{ $item->video_id }}/maxresdefault.jpg" 
                             alt="{{ $item->caption ?? 'Video' }}" 
                             class="img-fluid"
                             onerror="this.src='http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg'">
                        <div class="video-overlay">
                            <div class="video-play-btn">
                                <a href="http://www.youtube.com/watch?v={{ $item->video_id }}" 
                                   class="play-button" 
                                   data-fancybox="videos" 
                                   data-caption="{{ $item->caption ?? '' }}">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="video-duration-badge">
                            <i class="fas fa-video"></i>
                        </div>
                    </div>
                    @if($item->caption)
                    <div class="video-caption">
                        <p>{{ $item->caption }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($video_all->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <div class="video-pagination">
                    {{ $video_all->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<!-- Fancybox for Video Lightbox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<style>
/* Video Gallery Page Styles */
:root {
    --gold-color: #d4af37;
    --dark-blue: #1a365d;
    --beige: #f7f3e9;
    --warm-white: #fefcf7;
}

/* Hero Section */
.gallery-hero {
    position: relative;
    height: 50vh;
    min-height: 400px;
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
    margin-bottom: 20px;
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
    font-size: 3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 15px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 300;
}

/* Video Gallery Section */
.video-gallery-section {
    background-color: #ffffff;
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

.section-subtitle {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 0;
}

/* Video Cards */
.video-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.video-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.video-thumbnail {
    position: relative;
    height: 300px;
    overflow: hidden;
    background: #000;
}

.video-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease, opacity 0.3s ease;
    display: block;
}

.video-card:hover .video-thumbnail img {
    transform: scale(1.05);
    opacity: 0.8;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.video-card:hover .video-overlay {
    background: rgba(0, 0, 0, 0.5);
}

.video-play-btn {
    transform: scale(1);
    transition: all 0.3s ease;
}

.video-card:hover .video-play-btn {
    transform: scale(1.2);
}

.play-button {
    width: 80px;
    height: 80px;
    background: var(--gold-color);
    border: 4px solid white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    font-size: 28px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.play-button:hover {
    background: white;
    color: var(--gold-color);
    border-color: var(--gold-color);
    text-decoration: none;
    transform: scale(1.1);
}

.play-button i {
    margin-left: 4px;
}

.video-duration-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    z-index: 10;
}

.video-duration-badge i {
    margin-right: 5px;
}

.video-caption {
    padding: 20px;
    text-align: center;
    background: white;
}

.video-caption p {
    margin: 0;
    color: #666;
    font-size: 15px;
    line-height: 1.6;
    font-weight: 500;
}

/* Pagination */
.video-pagination {
    display: flex;
    justify-content: center;
}

.video-pagination .pagination {
    gap: 10px;
}

.video-pagination .page-link {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 10px 15px;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
}

.video-pagination .page-link:hover,
.video-pagination .page-item.active .page-link {
    background: var(--gold-color);
    border-color: var(--gold-color);
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .video-thumbnail {
        height: 250px;
    }
    
    .play-button {
        width: 60px;
        height: 60px;
        font-size: 20px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });
    
    // Initialize Fancybox for videos
    Fancybox.bind("[data-fancybox='videos']", {
        Toolbar: {
            display: {
                left: [],
                middle: [],
                right: ["close"],
            },
        },
        Youtube: {
            autoplay: 1,
            controls: 1,
        },
    });
});
</script>

@endsection