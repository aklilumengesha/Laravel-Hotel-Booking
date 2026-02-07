@extends('front.layout.app')

@section('main_content')

<!-- Hero Section -->
<section class="blog-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Latest News" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">{{ $global_page_data->blog_heading ?? 'Latest News' }}</span>
                    </nav>
                    <h1 class="hero-title">{{ $global_page_data->blog_heading ?? 'Latest News & Updates' }}</h1>
                    <p class="hero-subtitle">Stay updated with the latest news, events, and stories from our hotel</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Post Section -->
@if($post_all->count() > 0)
<section class="featured-post-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-post-card" data-aos="fade-up">
                    @php $featured_post = $post_all->first(); @endphp
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="featured-image">
                                <img src="{{ asset('uploads/'.$featured_post->photo) }}" alt="{{ $featured_post->heading }}" class="img-fluid">
                                <div class="featured-badge">
                                    <i class="fas fa-star"></i>
                                    <span>Featured</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="featured-content">
                                <div class="post-meta">
                                    <span class="post-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ date('M d, Y', strtotime($featured_post->created_at)) }}
                                    </span>
                                    <span class="post-views">
                                        <i class="fas fa-eye"></i>
                                        {{ $featured_post->total_view ?? 0 }} views
                                    </span>
                                </div>
                                <h2 class="featured-title">
                                    <a href="{{ route('post', $featured_post->id) }}">{{ $featured_post->heading }}</a>
                                </h2>
                                <div class="featured-excerpt">
                                    <p>{!! Str::limit(strip_tags($featured_post->short_content), 200) !!}</p>
                                </div>
                                <div class="featured-actions">
                                    <a href="{{ route('post', $featured_post->id) }}" class="btn btn-primary featured-btn">
                                        <i class="fas fa-book-open me-2"></i>Read Full Article
                                    </a>
                                    <div class="social-share">
                                        <span>Share:</span>
                                        <a href="#" class="share-btn facebook" onclick="sharePost('facebook', '{{ route('post', $featured_post->id) }}', '{{ $featured_post->heading }}')">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="share-btn twitter" onclick="sharePost('twitter', '{{ route('post', $featured_post->id) }}', '{{ $featured_post->heading }}')">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="share-btn linkedin" onclick="sharePost('linkedin', '{{ route('post', $featured_post->id) }}', '{{ $featured_post->heading }}')">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Blog Posts Grid Section -->
<section class="blog-posts-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">All Articles</h2>
                <div class="title-underline mx-auto"></div>
                <p class="section-subtitle">Discover more stories and updates from our hotel</p>
            </div>
        </div>
        
        <!-- Filter Tabs -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="blog-filters text-center">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-th-large me-2"></i>All Posts
                    </button>
                    <button class="filter-btn" data-filter="recent">
                        <i class="fas fa-clock me-2"></i>Recent
                    </button>
                    <button class="filter-btn" data-filter="popular">
                        <i class="fas fa-fire me-2"></i>Popular
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4" id="blog-grid">
            @foreach($post_all->skip(1) as $item)
            <div class="col-lg-4 col-md-6 blog-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <article class="blog-card">
                    <div class="blog-image">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="{{ $item->heading }}" class="img-fluid">
                        <div class="blog-overlay">
                            <div class="blog-actions">
                                <a href="{{ route('post', $item->id) }}" class="action-btn read-btn">
                                    <i class="fas fa-book-open"></i>
                                    <span>Read</span>
                                </a>
                                <button class="action-btn share-btn-toggle" onclick="toggleShare({{ $item->id }})">
                                    <i class="fas fa-share-alt"></i>
                                    <span>Share</span>
                                </button>
                            </div>
                        </div>
                        <div class="blog-category">
                            <span class="category-badge">News</span>
                        </div>
                    </div>
                    
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                {{ date('M d, Y', strtotime($item->created_at)) }}
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-eye"></i>
                                {{ $item->total_view ?? 0 }} views
                            </span>
                        </div>
                        
                        <h3 class="blog-title">
                            <a href="{{ route('post', $item->id) }}">{{ $item->heading }}</a>
                        </h3>
                        
                        <div class="blog-excerpt">
                            <p>{!! Str::limit(strip_tags($item->short_content), 120) !!}</p>
                        </div>
                        
                        <div class="blog-footer">
                            <a href="{{ route('post', $item->id) }}" class="read-more-link">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="blog-share-mini" id="share-{{ $item->id }}" style="display: none;">
                                <a href="#" onclick="sharePost('facebook', '{{ route('post', $item->id) }}', '{{ $item->heading }}')" class="mini-share facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" onclick="sharePost('twitter', '{{ route('post', $item->id) }}', '{{ $item->heading }}')" class="mini-share twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" onclick="sharePost('linkedin', '{{ route('post', $item->id) }}', '{{ $item->heading }}')" class="mini-share linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="blog-pagination">
                    {{ $post_all->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Subscription -->
<section class="newsletter-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="newsletter-card" data-aos="fade-up">
                    <div class="newsletter-icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <h3 class="newsletter-title">Stay Updated</h3>
                    <p class="newsletter-subtitle">Subscribe to our newsletter and never miss our latest news and special offers</p>
                    
                    <form action="{{ route('subscriber_send_email') }}" method="post" class="newsletter-form form_subscribe_ajax">
                        @csrf
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Subscribe
                            </button>
                        </div>
                        <span class="text-danger error-text email_error"></span>
                    </form>
                    
                    <div class="newsletter-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Weekly updates</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Exclusive offers</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Event notifications</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Blog Page Styles - Updated v2.0 */
:root {
    --gold-color: #d4af37;
    --dark-blue: #1a365d;
    --beige: #f7f3e9;
    --warm-white: #fefcf7;
}

/* Hero Section */
.blog-hero {
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

/* Featured Post Section */
.featured-post-section {
    background-color: var(--warm-white);
}

.featured-post-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.featured-post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
}

.featured-image {
    position: relative;
    height: 400px;
    overflow: hidden;
    background: #f8f9fa;
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease;
    display: block;
}

.featured-post-card:hover .featured-image img {
    transform: scale(1.05);
}

.featured-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    color: white;
    padding: 8px 15px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    z-index: 15;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    pointer-events: none;
}

.featured-content {
    padding: 40px;
    height: 400px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.post-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
}

.post-date, .post-views {
    font-size: 14px;
    color: #666;
    display: flex;
    align-items: center;
    gap: 5px;
}

.post-date i, .post-views i {
    color: var(--gold-color);
}

.featured-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 15px;
    line-height: 1.3;
}

.featured-title a {
    color: var(--dark-blue);
    text-decoration: none;
    transition: color 0.3s ease;
}

.featured-title a:hover {
    color: var(--gold-color);
}

.featured-excerpt {
    margin-bottom: 25px;
    flex: 1;
}

.featured-excerpt p {
    color: #666;
    line-height: 1.6;
    font-size: 16px;
}

.featured-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 15px;
}

.featured-btn {
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.featured-btn:hover {
    background: linear-gradient(135deg, #b8941f, var(--gold-color));
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
}

.social-share {
    display: flex;
    align-items: center;
    gap: 10px;
}

.social-share span {
    font-size: 14px;
    color: #666;
    font-weight: 600;
}

.share-btn {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    background: #f8f9fa;
    color: #666;
}

.share-btn:hover {
    transform: translateY(-2px);
    text-decoration: none;
}

.share-btn.facebook:hover {
    background: #3b5998;
    color: white;
}

.share-btn.twitter:hover {
    background: #1da1f2;
    color: white;
}

.share-btn.linkedin:hover {
    background: #0077b5;
    color: white;
}

/* Blog Posts Section */
.blog-posts-section {
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

/* Filter Tabs */
.blog-filters {
    margin-bottom: 40px;
}

.filter-btn {
    background: transparent;
    border: 2px solid #e9ecef;
    padding: 12px 25px;
    margin: 0 10px 10px 0;
    border-radius: 25px;
    color: #666;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn:hover,
.filter-btn.active {
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    border-color: var(--gold-color);
    color: white;
}

/* Blog Cards */
.blog-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.blog-image {
    position: relative;
    height: 220px;
    overflow: hidden;
    background: #f8f9fa;
}

.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease;
    display: block;
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

.blog-card:hover .blog-overlay {
    opacity: 1 !important;
    visibility: visible !important;
    pointer-events: auto;
}

.blog-actions {
    display: flex;
    gap: 20px;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.blog-card:hover .blog-actions {
    opacity: 1;
    transform: translateY(0);
}

.action-btn {
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

.action-btn i {
    font-size: 20px;
    display: block;
}

.action-btn span {
    display: block;
    line-height: 1.2;
    white-space: nowrap;
}

.action-btn:hover {
    background: var(--gold-color);
    border-color: var(--gold-color);
    color: white;
    text-decoration: none;
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
}

.blog-category {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 15;
    pointer-events: none;
}

.category-badge {
    background: var(--gold-color);
    color: white;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    pointer-events: auto;
}

.blog-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.blog-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
}

.meta-item {
    font-size: 13px;
    color: #666;
    display: flex;
    align-items: center;
    gap: 5px;
}

.meta-item i {
    color: var(--gold-color);
}

.blog-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 15px;
    line-height: 1.4;
}

.blog-title a {
    color: var(--dark-blue);
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-title a:hover {
    color: var(--gold-color);
}

.blog-excerpt {
    margin-bottom: 20px;
    flex: 1;
}

.blog-excerpt p {
    color: #666;
    line-height: 1.6;
    font-size: 14px;
    margin: 0;
}

.blog-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: auto;
}

.read-more-link {
    color: #7B8CFF;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
}

.read-more-link:hover {
    color: #5c68e0;
    text-decoration: none;
}

.read-more-link i {
    transition: transform 0.3s ease;
}

.read-more-link:hover i {
    transform: translateX(3px);
}

.blog-share-mini {
    display: flex;
    gap: 8px;
}

.mini-share {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 12px;
    transition: all 0.3s ease;
}

.mini-share.facebook {
    background: #3b5998;
    color: white;
}

.mini-share.twitter {
    background: #1da1f2;
    color: white;
}

.mini-share.linkedin {
    background: #0077b5;
    color: white;
}

.mini-share:hover {
    transform: scale(1.1);
    text-decoration: none;
}

/* Newsletter Section */
.newsletter-section {
    background: linear-gradient(135deg, var(--dark-blue), #2c5282);
    color: white;
}

.newsletter-card {
    background: rgba(255, 255, 255, 0.1);
    padding: 50px 40px;
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.newsletter-icon {
    width: 80px;
    height: 80px;
    background: var(--gold-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
}

.newsletter-icon i {
    font-size: 32px;
    color: white;
}

.newsletter-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.newsletter-subtitle {
    margin-bottom: 30px;
    opacity: 0.9;
}

.newsletter-form .input-group {
    max-width: 400px;
    margin: 0 auto 25px;
}

.newsletter-form .form-control {
    border: none;
    padding: 15px 20px;
    border-radius: 25px 0 0 25px;
    background: white;
    color: #333;
}

.newsletter-form .btn {
    border-radius: 0 25px 25px 0;
    padding: 15px 25px;
    background: var(--gold-color);
    border: none;
    font-weight: 600;
}

.newsletter-features {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.feature-item i {
    color: var(--gold-color);
}

/* Pagination */
.blog-pagination {
    display: flex;
    justify-content: center;
}

.blog-pagination .pagination {
    gap: 10px;
}

.blog-pagination .page-link {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 10px 15px;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
}

.blog-pagination .page-link:hover,
.blog-pagination .page-item.active .page-link {
    background: var(--gold-color);
    border-color: var(--gold-color);
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .featured-content {
        padding: 25px;
        height: auto;
    }
    
    .featured-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .social-share {
        justify-content: center;
    }
    
    .blog-filters {
        text-align: left;
    }
    
    .filter-btn {
        margin-bottom: 10px;
    }
    
    .newsletter-features {
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }
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
    
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const blogItems = document.querySelectorAll('.blog-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            // Simple filter logic (you can enhance this based on your needs)
            blogItems.forEach(item => {
                if (filter === 'all') {
                    item.style.display = 'block';
                } else {
                    // You can add more sophisticated filtering logic here
                    item.style.display = 'block';
                }
            });
        });
    });
});

// Share functionality
function sharePost(platform, url, title) {
    let shareUrl = '';
    
    switch(platform) {
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
            break;
        case 'linkedin':
            shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
            break;
    }
    
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}

// Toggle share buttons
function toggleShare(postId) {
    const shareDiv = document.getElementById(`share-${postId}`);
    if (shareDiv.style.display === 'none' || shareDiv.style.display === '') {
        shareDiv.style.display = 'flex';
    } else {
        shareDiv.style.display = 'none';
    }
}

// Newsletter subscription
(function($){
    $(".form_subscribe_ajax").on('submit', function(e){
        e.preventDefault();
        $('#loader').show();
        var form = this;
        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:new FormData(form),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(form).find('span.error-text').text('');
            },
            success:function(data)
            {
                $('#loader').hide();
                if(data.code == 0)
                {
                    $.each(data.error_message, function(prefix, val) {
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }
                else if(data.code == 1)
                {
                    $(form)[0].reset();
                    iziToast.success({
                        title: 'Success!',
                        position: 'topRight',
                        message: data.success_message,
                        backgroundColor: '#d4af37',
                        titleColor: '#fff',
                        messageColor: '#fff',
                        iconColor: '#fff'
                    });
                }
                
            }
        });
    });
})(jQuery);
</script>

<div id="loader"></div>
@endsection