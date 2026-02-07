@extends('front.layout.app')

@section('main_content')

<!-- Hero Section -->
<section class="post-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/'.$single_post_data->photo) }}" alt="{{ $single_post_data->heading }}" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <a href="{{ route('blog') }}">Blog</a>
                        <span class="separator">→</span>
                        <span class="current">{{ Str::limit($single_post_data->heading, 50) }}</span>
                    </nav>
                    <div class="post-meta-hero">
                        <span class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            {{ date('M d, Y', strtotime($single_post_data->created_at)) }}
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-eye"></i>
                            {{ $single_post_data->total_view }} views
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-clock"></i>
                            {{ ceil(str_word_count(strip_tags($single_post_data->content)) / 200) }} min read
                        </span>
                    </div>
                    <h1 class="post-title">{{ $single_post_data->heading }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Post Content -->
<section class="post-content-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="post-article">
                    <!-- Featured Image -->
                    <div class="post-featured-image mb-5" data-aos="fade-up">
                        <img src="{{ asset('uploads/'.$single_post_data->photo) }}" alt="{{ $single_post_data->heading }}" class="img-fluid">
                    </div>
                    
                    <!-- Post Meta -->
                    <div class="post-meta-detailed mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="meta-left">
                            <div class="author-info">
                                <div class="author-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="author-details">
                                    <span class="author-name">Hotel Admin</span>
                                    <span class="publish-date">Published on {{ date('F d, Y', strtotime($single_post_data->created_at)) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="meta-right">
                            <div class="post-stats">
                                <span class="stat-item">
                                    <i class="fas fa-eye"></i>
                                    {{ $single_post_data->total_view }}
                                </span>
                                <span class="stat-item">
                                    <i class="fas fa-clock"></i>
                                    {{ ceil(str_word_count(strip_tags($single_post_data->content)) / 200) }} min
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Post Content -->
                    <div class="post-body" data-aos="fade-up" data-aos-delay="200">
                        {!! $single_post_data->content !!}
                    </div>
                    
                    <!-- Tags -->
                    <div class="post-tags mt-5" data-aos="fade-up" data-aos-delay="300">
                        <h6 class="tags-title">Tags:</h6>
                        <div class="tags-list">
                            <span class="tag">Hotel News</span>
                            <span class="tag">Updates</span>
                            <span class="tag">Hospitality</span>
                        </div>
                    </div>
                    
                    <!-- Share Section -->
                    <div class="post-share mt-5" data-aos="fade-up" data-aos-delay="400">
                        <h6 class="share-title">Share this article:</h6>
                        <div class="share-buttons">
                            <a href="#" onclick="sharePost('facebook', '{{ url()->current() }}', '{{ $single_post_data->heading }}')" class="share-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                            <a href="#" onclick="sharePost('twitter', '{{ url()->current() }}', '{{ $single_post_data->heading }}')" class="share-btn twitter">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                            <a href="#" onclick="sharePost('linkedin', '{{ url()->current() }}', '{{ $single_post_data->heading }}')" class="share-btn linkedin">
                                <i class="fab fa-linkedin-in"></i>
                                <span>LinkedIn</span>
                            </a>
                            <a href="#" onclick="copyToClipboard('{{ url()->current() }}')" class="share-btn copy">
                                <i class="fas fa-link"></i>
                                <span>Copy Link</span>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="post-sidebar">
                    <!-- Back to Blog -->
                    <div class="sidebar-widget" data-aos="fade-left">
                        <a href="{{ route('blog') }}" class="back-to-blog">
                            <i class="fas fa-arrow-left me-2"></i>Back to All Articles
                        </a>
                    </div>
                    
                    <!-- Newsletter -->
                    <div class="sidebar-widget newsletter-widget" data-aos="fade-left" data-aos-delay="100">
                        <div class="widget-header">
                            <h5 class="widget-title">Stay Updated</h5>
                            <p class="widget-subtitle">Get the latest news and updates</p>
                        </div>
                        <form action="{{ route('subscriber_send_email') }}" method="post" class="sidebar-newsletter form_subscribe_ajax">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-paper-plane me-2"></i>Subscribe
                            </button>
                        </form>
                    </div>
                    
                    <!-- Quick Contact -->
                    <div class="sidebar-widget contact-widget" data-aos="fade-left" data-aos-delay="200">
                        <div class="widget-header">
                            <h5 class="widget-title">Need Help?</h5>
                            <p class="widget-subtitle">Contact our team</p>
                        </div>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <span class="contact-label">Call Us</span>
                                    <a href="tel:{{ optional($global_setting_data)->footer_phone }}" class="contact-value">{{ optional($global_setting_data)->footer_phone ?? '+1 (555) 123-4567' }}</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <span class="contact-label">Email Us</span>
                                    <a href="mailto:{{ optional($global_setting_data)->footer_email }}" class="contact-value">{{ optional($global_setting_data)->footer_email ?? 'info@hotel.com' }}</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100 mt-3">
                            <i class="fas fa-comments me-2"></i>Contact Us
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<style>
/* Single Post Styles */
:root {
    --gold-color: #d4af37;
    --dark-blue: #1a365d;
    --beige: #f7f3e9;
    --warm-white: #fefcf7;
}

/* Hero Section */
.post-hero {
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

.post-meta-hero {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.meta-item {
    color: rgba(255, 255, 255, 0.9);
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.meta-item i {
    color: var(--gold-color);
}

.post-title {
    font-size: 3rem;
    font-weight: 700;
    color: white;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

/* Post Content Section */
.post-content-section {
    background-color: var(--warm-white);
}

.post-article {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.post-featured-image {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.post-featured-image img {
    width: 100%;
    height: auto;
}

.post-meta-detailed {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
    border-bottom: 1px solid #eee;
    flex-wrap: wrap;
    gap: 20px;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.author-avatar {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
}

.author-details {
    display: flex;
    flex-direction: column;
}

.author-name {
    font-weight: 700;
    color: var(--dark-blue);
    font-size: 16px;
}

.publish-date {
    color: #666;
    font-size: 14px;
}

.post-stats {
    display: flex;
    gap: 20px;
}

.stat-item {
    color: #666;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.stat-item i {
    color: var(--gold-color);
}

.post-body {
    font-size: 16px;
    line-height: 1.8;
    color: #333;
}

.post-body h1, .post-body h2, .post-body h3, .post-body h4, .post-body h5, .post-body h6 {
    color: var(--dark-blue);
    margin-top: 30px;
    margin-bottom: 15px;
    font-weight: 700;
}

.post-body p {
    margin-bottom: 20px;
}

.post-body img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 20px 0;
}

.post-body blockquote {
    background: var(--beige);
    border-left: 4px solid var(--gold-color);
    padding: 20px 25px;
    margin: 25px 0;
    font-style: italic;
    border-radius: 0 10px 10px 0;
}

.post-tags {
    padding-top: 25px;
    border-top: 1px solid #eee;
}

.tags-title {
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 15px;
}

.tags-list {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.tag {
    background: var(--beige);
    color: var(--dark-blue);
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.tag:hover {
    background: var(--gold-color);
    color: white;
}

.post-share {
    padding-top: 25px;
    border-top: 1px solid #eee;
}

.share-title {
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 20px;
}

.share-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.share-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.share-btn.facebook {
    background: #3b5998;
    color: white;
}

.share-btn.twitter {
    background: #1da1f2;
    color: white;
}

.share-btn.linkedin {
    background: #0077b5;
    color: white;
}

.share-btn.copy {
    background: #6c757d;
    color: white;
}

.share-btn:hover {
    transform: translateY(-2px);
    text-decoration: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Sidebar */
.post-sidebar {
    padding-left: 30px;
}

.sidebar-widget {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.back-to-blog {
    display: inline-flex;
    align-items: center;
    color: var(--gold-color);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 12px 20px;
    border: 2px solid var(--gold-color);
    border-radius: 25px;
    width: 100%;
    justify-content: center;
}

.back-to-blog:hover {
    background: var(--gold-color);
    color: white;
    text-decoration: none;
}

.widget-header {
    margin-bottom: 20px;
}

.widget-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 8px;
}

.widget-subtitle {
    color: #666;
    font-size: 14px;
    margin: 0;
}

.newsletter-widget {
    background: linear-gradient(135deg, var(--beige), #f0ede4);
}

.newsletter-widget .widget-title {
    color: var(--dark-blue);
}

.newsletter-widget .widget-subtitle {
    color: #555;
}

.sidebar-newsletter .form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    margin-bottom: 15px;
}

.sidebar-newsletter .form-control:focus {
    border-color: var(--gold-color);
    box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
}

.contact-widget {
    background: linear-gradient(135deg, var(--dark-blue), #2c5282);
    color: white;
}

.contact-widget .widget-title,
.contact-widget .widget-subtitle {
    color: white;
}

.contact-info {
    margin-bottom: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.contact-item i {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #7B8CFF, #6a75ff);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    font-size: 18px;
}

.contact-label {
    display: block;
    font-size: 12px;
    opacity: 0.8;
    margin-bottom: 2px;
}

.contact-value {
    color: white;
    text-decoration: none;
    font-weight: 600;
}

.contact-value:hover {
    color: var(--gold-color);
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .post-title {
        font-size: 2.2rem;
    }
    
    .post-meta-hero {
        gap: 15px;
    }
    
    .post-article {
        padding: 25px;
    }
    
    .post-meta-detailed {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .post-sidebar {
        padding-left: 0;
        margin-top: 40px;
    }
    
    .share-buttons {
        justify-content: center;
    }
    
    .share-btn {
        flex: 1;
        justify-content: center;
        min-width: 120px;
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

// Copy to clipboard
function copyToClipboard(url) {
    navigator.clipboard.writeText(url).then(function() {
        // Show success message
        iziToast.success({
            title: 'Success!',
            position: 'topRight',
            message: 'Link copied to clipboard!',
            backgroundColor: '#d4af37',
            titleColor: '#fff',
            messageColor: '#fff',
            iconColor: '#fff'
        });
    }).catch(function() {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = url;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        
        iziToast.success({
            title: 'Success!',
            position: 'topRight',
            message: 'Link copied to clipboard!',
            backgroundColor: '#d4af37',
            titleColor: '#fff',
            messageColor: '#fff',
            iconColor: '#fff'
        });
    });
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