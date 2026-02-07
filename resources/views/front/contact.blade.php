@extends('front.layout.app')

@section('main_content')

<!-- Hero Section -->
<section class="contact-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Contact Us" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">Contact Us</span>
                    </nav>
                    <h1 class="hero-title">{{ $page_data->contact_heading ?? 'Get In Touch' }}</h1>
                    <p class="hero-subtitle">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Map Section -->
<section class="contact-form-section py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="contact-form-wrapper">
                    <div class="form-header mb-4">
                        <h2 class="form-title">Send us a Message</h2>
                        <p class="form-subtitle">Fill out the form below and we'll get back to you as soon as possible</p>
                    </div>
                    
                    <form action="{{ route('contact.send_email') }}" method="post" class="contact-form form_contact_ajax">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-user me-2"></i>Full Name *
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-envelope me-2"></i>Email Address *
                                    </label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-phone me-2"></i>Phone Number
                                    </label>
                                    <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-tag me-2"></i>Subject
                                    </label>
                                    <select class="form-select" name="subject">
                                        <option value="">Select a subject</option>
                                        <option value="General Inquiry">General Inquiry</option>
                                        <option value="Reservation">Reservation</option>
                                        <option value="Event Planning">Event Planning</option>
                                        <option value="Feedback">Feedback</option>
                                        <option value="Complaint">Complaint</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-comment me-2"></i>Message *
                                    </label>
                                    <textarea class="form-control" rows="5" name="message" placeholder="Tell us how we can help you..." required></textarea>
                                    <span class="text-danger error-text message_error"></span>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        I would like to receive updates and special offers via email
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg contact-submit-btn">
                                    <span class="btn-text">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </span>
                                    <span class="btn-loading" style="display: none;">
                                        <i class="fas fa-spinner fa-spin me-2"></i>Sending...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Map & Additional Info -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="map-wrapper">
                    <div class="map-header mb-4">
                        <h3 class="map-title">Find Us Here</h3>
                        <p class="map-subtitle">Located in the heart of the city with easy access to major attractions</p>
                    </div>
                    
                    <div class="map-container">
                        @if(isset($page_data->contact_map) && $page_data->contact_map)
                            {!! $page_data->contact_map !!}
                        @else
                            <div class="map-placeholder">
                                <i class="fas fa-map-marked-alt"></i>
                                <p>Map will be displayed here</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="additional-info mt-4">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h5>Reception Hours</h5>
                                <p>24/7 - We're always here to help</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <div class="info-content">
                                <h5>Parking</h5>
                                <p>Free valet parking available for all guests</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-wifi"></i>
                            </div>
                            <div class="info-content">
                                <h5>Free WiFi</h5>
                                <p>High-speed internet throughout the property</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="contact-faq-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <div class="title-underline mx-auto"></div>
                <p class="section-subtitle">Quick answers to common questions</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(isset($faqs) && $faqs->count() > 0)
                    <div class="accordion" id="contactFAQ">
                        @foreach($faqs as $index => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq{{ $faq->id }}">
                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    {!! html_entity_decode($faq->answer) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-faqs text-center py-5">
                        <i class="fas fa-question-circle fa-3x mb-3" style="color: #ccc;"></i>
                        <h5 style="color: #666;">No FAQs Available</h5>
                        <p style="color: #999;">Frequently asked questions will appear here once added by the administrator.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
/* Contact Page Styles */
:root {
    --gold-color: #d4af37;
    --dark-blue: #1a365d;
    --beige: #f7f3e9;
    --warm-white: #fefcf7;
}

/* Hero Section */
.contact-hero {
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

/* Contact Form Section */
.contact-form-section {
    background-color: #ffffff;
}

.contact-form-wrapper {
    background: var(--warm-white);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.form-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 10px;
}

.form-subtitle {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 0;
}

.title-underline {
    width: 60px;
    height: 4px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    margin: 20px auto 30px;
}

.form-label {
    font-weight: 600;
    color: var(--dark-blue);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
}

.form-label i {
    color: var(--gold-color);
    width: 20px;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 12px 15px;
    font-size: 15px;
    transition: all 0.3s ease;
    background-color: white;
}

.form-control:focus, .form-select:focus {
    border-color: var(--gold-color);
    box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    background-color: white;
}

.contact-submit-btn {
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    border: none;
    padding: 15px 40px;
    font-weight: 600;
    border-radius: 50px;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    width: 100%;
}

.contact-submit-btn:hover {
    background: linear-gradient(135deg, #b8941f, var(--gold-color));
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(212, 175, 55, 0.4);
}

/* Map Section */
.map-wrapper {
    height: 100%;
}

.map-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 10px;
}

.map-subtitle {
    color: #666;
    margin-bottom: 0;
}

.map-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    height: 300px;
}

.map-container iframe {
    width: 100%;
    height: 100%;
    border: none;
}

.map-placeholder {
    height: 300px;
    background: var(--beige);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #999;
}

.map-placeholder i {
    font-size: 48px;
    margin-bottom: 15px;
}

.additional-info {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}

.info-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.info-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.info-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--gold-color), #b8941f);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    flex-shrink: 0;
}

.info-icon i {
    color: white;
    font-size: 18px;
}

.info-content h5 {
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 5px;
}

.info-content p {
    color: #666;
    margin: 0;
    font-size: 14px;
}

/* FAQ Section */
.contact-faq-section {
    background: linear-gradient(135deg, var(--beige), #f0ede4);
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 20px;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 0;
}

.accordion-item {
    border: none;
    margin-bottom: 15px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}

.accordion-button {
    background: white;
    border: none;
    padding: 20px 25px;
    font-weight: 600;
    color: var(--dark-blue);
    font-size: 16px;
}

.accordion-button:not(.collapsed) {
    background: var(--gold-color);
    color: white;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border: none;
}

.accordion-body {
    padding: 20px 25px;
    background: white;
    color: #666;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .form-title {
        font-size: 1.8rem;
    }
    
    .contact-form-wrapper {
        padding: 25px;
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

// Enhanced AJAX form submission
(function($){
    $(".form_contact_ajax").on('submit', function(e){
        e.preventDefault();
        
        const submitBtn = $(this).find('.contact-submit-btn');
        const btnText = submitBtn.find('.btn-text');
        const btnLoading = submitBtn.find('.btn-loading');
        
        // Show loading state
        btnText.hide();
        btnLoading.show();
        submitBtn.prop('disabled', true);
        
        $('#loader').show();
        var form = this;
        
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function(){
                $(form).find('span.error-text').text('');
                $(form).find('.form-control, .form-select').removeClass('is-invalid');
            },
            success: function(data) {
                $('#loader').hide();
                
                // Reset button state
                btnText.show();
                btnLoading.hide();
                submitBtn.prop('disabled', false);
                
                if(data.code == 0) {
                    // Show validation errors
                    $.each(data.error_message, function(prefix, val) {
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                        $(form).find('[name="'+prefix+'"]').addClass('is-invalid');
                    });
                } else if(data.code == 1) {
                    // Success
                    $(form)[0].reset();
                    
                    // Show success message with better styling
                    iziToast.success({
                        title: 'Success!',
                        position: 'topRight',
                        message: data.success_message,
                        timeout: 5000,
                        backgroundColor: '#d4af37',
                        titleColor: '#fff',
                        messageColor: '#fff',
                        iconColor: '#fff'
                    });
                    
                    // Add success animation to form
                    $(form).addClass('animate__animated animate__pulse');
                    setTimeout(() => {
                        $(form).removeClass('animate__animated animate__pulse');
                    }, 1000);
                }
            },
            error: function() {
                $('#loader').hide();
                btnText.show();
                btnLoading.hide();
                submitBtn.prop('disabled', false);
                
                iziToast.error({
                    title: 'Error!',
                    position: 'topRight',
                    message: 'Something went wrong. Please try again.',
                });
            }
        });
    });
})(jQuery);
</script>

<div id="loader"></div>
@endsection