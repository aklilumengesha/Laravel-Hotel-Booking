@extends('front.layout.app')

@section('main_content')

<!-- Hero Section -->
<section class="gallery-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Photo Gallery" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">{{ $global_page_data->photo_gallery_heading ?? 'Photo Gallery' }}</span>
                    </nav>
                    <h1 class="hero-title">{{ $global_page_data->photo_gallery_heading ?? 'Photo Gallery' }}</h1>
                    <p class="hero-subtitle">Explore our beautiful collection of moments and memories</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Photo Gallery Section -->
<section class="photo-gallery-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Gallery</h2>
                <div class="title-underline mx-auto"></div>
                <p class="section-subtitle">Discover the beauty and elegance of our hotel through these stunning images</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($photo_all as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="{{ $item->caption ?? 'Gallery Image' }}" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="gallery-actions">
                                <a href="{{ asset('uploads/'.$item->photo) }}" class="gallery-btn magnific" data-fancybox="gallery" data-caption="{{ $item->caption ?? '' }}">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if($item->caption)
                    <div class="gallery-caption">
                        <p>{{ $item->caption }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($photo_all->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <div class="gallery-pagination">
                    {{ $photo_all->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<!-- Fancybox for Image Lightbox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<style>
/* Photo Gallery Page Styles */
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

/* Gallery Section */
.photo-gallery-section {
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

/* Gallery Cards */
.gallery-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.gallery-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.gallery-image {
    position: relative;
    height: 300px;
    overflow: hidden;
    background: #f8f9fa;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease;
    display: block;
}

.gallery-card:hover .gallery-image img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0 !important;
    visibility: hidden !important;
    transition: all 0.3s ease;
    z-index: 5;
    pointer-events: none;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1 !important;
    visibility: visible !important;
    pointer-events: auto;
}

.gallery-actions {
    display: flex;
    gap: 15px;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.gallery-card:hover .gallery-actions {
    opacity: 1;
    transform: translateY(0);
}

.gallery-btn {
    background: rgba(26, 54, 93, 0.95);
    border: 3px solid white;
    color: white;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 5px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    font-size: 13px;
    text-align: center;
    padding: 10px;
}

.gallery-btn i {
    font-size: 24px;
    display: block;
}

.gallery-btn span {
    display: block;
    line-height: 1.2;
}

.gallery-btn:hover {
    background: var(--gold-color);
    border-color: var(--gold-color);
    color: white;
    text-decoration: none;
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
}

.gallery-caption {
    padding: 20px;
    text-align: center;
    background: white;
}

.gallery-caption p {
    margin: 0;
    color: #666;
    font-size: 15px;
    line-height: 1.6;
}

/* Pagination */
.gallery-pagination {
    display: flex;
    justify-content: center;
}

.gallery-pagination .pagination {
    gap: 10px;
}

.gallery-pagination .page-link {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 10px 15px;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
}

.gallery-pagination .page-link:hover,
.gallery-pagination .page-item.active .page-link {
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
    
    .gallery-image {
        height: 250px;
    }
    
    .gallery-btn {
        width: 80px;
        height: 80px;
        font-size: 12px;
    }
    
    .gallery-btn i {
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
    
    // Initialize Fancybox
    Fancybox.bind("[data-fancybox]", {
        Toolbar: {
            display: {
                left: [],
                middle: [],
                right: ["close"],
            },
        },
        Images: {
            zoom: true,
        },
        Thumbs: {
            autoStart: true,
        },
    });
});
</script>

@endsection