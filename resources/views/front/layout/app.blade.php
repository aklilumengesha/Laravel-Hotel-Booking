<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		
        <meta name="description" content="">
        <title>Ehostel Hotel </title>        
		
        <link rel="icon" type="image/png" href="{{ asset('uploads/'.optional($global_setting_data)->favicon) }}">

        @include('front.layout.styles')

        @include('front.layout.scripts')        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">
        
        
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ optional($global_setting_data)->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ optional($global_setting_data)->analytic_id }}');
        </script>

        <style>
            .main-nav nav .navbar-nav .nav-item a:hover,
            .main-nav nav .navbar-nav .nav-item:hover a,
            .home-feature .inner .icon i,
            .home-rooms .inner .text .price,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a,
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover {
                color: {{ optional($global_setting_data)->theme_color_1 }};
            }

            /* Slider arrows - gold hover */
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover {
                background: #b8a055 !important;
                color: #fff !important;
                border: none !important;
            }

            .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover,
            .primary-color {
                color: {{ optional($global_setting_data)->theme_color_1 }}!important;
            }

            .testimonial-carousel .owl-dots .owl-dot,
            .footer ul.social li a,
            .footer input[type="submit"],
            .room-detail .right .widget .book-now {
                background-color: {{ optional($global_setting_data)->theme_color_1 }};
            }

            .slider .text .button a,
            .search-section button[type="submit"],
            .home-rooms .big-button a,
            .bg-website {
                background-color: {{ optional($global_setting_data)->theme_color_1 }}!important;
            }

            .slider .text .button a,
            .search-section button[type="submit"],
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover,
            .room-detail .amenity .item {
                border-color: {{ optional($global_setting_data)->theme_color_1 }}!important;
            }

            .home-feature .inner .icon i,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a,
            .room-detail .amenity .item,
            .cart .table-cart tr th {
                background-color: {{ optional($global_setting_data)->theme_color_2 }}!important;
            }

            /* Override with new muted gold color for all buttons */
            .slider .text .button a,
            .search-section button[type="submit"],
            .home-rooms .big-button a,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a {
                background-color: #b8a055 !important;
                border-color: #b8a055 !important;
                transition: all 0.3s ease;
            }

            .slider .text .button a:hover,
            .search-section button[type="submit]:hover,
            .home-rooms .big-button a:hover,
            .home-rooms .inner .text .button a:hover,
            .blog-item .inner .text .button a:hover {
                background-color: #a08f4a !important;
                border-color: #a08f4a !important;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(184, 160, 85, 0.4);
            }


          /* ========================================
             ENHANCED HEADER & NAVIGATION STYLES
             ======================================== */
             
      /* Top Bar Styles */
      .top {
          background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
          padding: 12px 0;
          border-bottom: 2px solid rgba(212, 175, 55, 0.3);
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      .top .left-side ul {
          list-style: none;
          padding: 0;
          margin: 0;
          display: flex;
          gap: 30px;
      }

      .top .left-side ul li a {
          color: rgba(255, 255, 255, 0.9);
          text-decoration: none;
          font-size: 14px;
          display: flex;
          align-items: center;
          gap: 8px;
          transition: all 0.3s ease;
          font-weight: 500;
      }

      .top .left-side ul li a i {
          color: #d4af37;
          font-size: 13px;
      }

      .top .left-side ul li a:hover {
          color: #d4af37;
          transform: translateX(3px);
      }

      .top .right-side ul {
          list-style: none;
          padding: 0;
          margin: 0;
          display: flex;
          justify-content: flex-end;
          gap: 5px;
      }

      .top .right-side ul li a {
          color: rgba(255, 255, 255, 0.9);
          text-decoration: none;
          font-size: 13px;
          padding: 6px 18px;
          border-radius: 20px;
          background: rgba(255, 255, 255, 0.1);
          transition: all 0.3s ease;
          font-weight: 500;
          display: inline-block;
          backdrop-filter: blur(10px);
      }

      .top .right-side ul li a:hover {
          background: #b8a055;
          color: white;
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(184, 160, 85, 0.3);
      }

      .top .right-side ul li a sup {
          background: #b8a055;
          color: white;
          padding: 2px 6px;
          border-radius: 10px;
          font-size: 10px;
          margin-left: 4px;
          font-weight: 700;
      }

      /* Main Navigation Styles */
      .navbar-area {
          background: white;
          box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
          position: sticky;
          top: 0;
          z-index: 999;
          transition: all 0.3s ease;
      }

      .navbar-area.sticky {
          box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
      }

      .main-nav {
          background-color: white !important;
          padding: 8px 0;
      }

      .main-nav .navbar-brand img {
          max-height: 60px;
          transition: all 0.3s ease;
      }

      .main-nav .navbar-brand:hover img {
          transform: scale(1.05);
      }

      /* Nav links */
      .main-nav nav .navbar-nav {
          gap: 5px;
      }

      .main-nav nav .navbar-nav .nav-item {
          position: relative;
      }

      .main-nav nav .navbar-nav .nav-item a {
          color: #1a365d !important;
          font-weight: 600;
          font-size: 15px;
          padding: 12px 20px !important;
          border-radius: 8px;
          transition: all 0.3s ease;
          position: relative;
          letter-spacing: 0.3px;
      }

      .main-nav nav .navbar-nav .nav-item a::before {
          content: '';
          position: absolute;
          bottom: 8px;
          left: 20px;
          right: 20px;
          height: 2px;
          background: linear-gradient(90deg, #d4af37, #b8941f);
          transform: scaleX(0);
          transition: transform 0.3s ease;
      }

      /* Nav links on hover or active */
      .main-nav nav .navbar-nav .nav-item a:hover,
      .main-nav nav .navbar-nav .nav-item.active a {
          color: #d4af37 !important;
          background: rgba(212, 175, 55, 0.08);
      }

      .main-nav nav .navbar-nav .nav-item a:hover::before,
      .main-nav nav .navbar-nav .nav-item.active a::before {
          transform: scaleX(1);
      }

      /* Special styling for Book Now button */
      .main-nav nav .navbar-nav .nav-item:last-child a {
          background: #b8a055;
          color: white !important;
          padding: 12px 28px !important;
          border-radius: 25px;
          box-shadow: 0 4px 15px rgba(184, 160, 85, 0.3);
          font-weight: 700;
      }

      .main-nav nav .navbar-nav .nav-item:last-child a::before {
          display: none;
      }

      .main-nav nav .navbar-nav .nav-item:last-child a:hover {
          background: #a08f4a;
          transform: translateY(-2px);
          box-shadow: 0 6px 20px rgba(184, 160, 85, 0.4);
          color: white !important;
      }

      /* Dropdown Menu Styles */
      .main-nav nav .navbar-nav .nav-item .dropdown-menu {
          background: white;
          border: none;
          border-radius: 12px;
          box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
          padding: 10px;
          margin-top: 10px;
          min-width: 220px;
      }

      .main-nav nav .navbar-nav .nav-item .dropdown-menu li a {
          color: #1a365d !important;
          padding: 10px 18px !important;
          border-radius: 8px;
          font-size: 14px;
          transition: all 0.3s ease;
      }

      .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover {
          background: rgba(212, 175, 55, 0.1);
          color: #d4af37 !important;
          padding-left: 24px !important;
      }

      /* Mobile Navigation */
      .mobile-nav {
          background: white;
          padding: 15px 0;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      .mobile-nav .logo img {
          max-height: 50px;
      }

      /* Responsive Styles */
      @media (max-width: 991px) {
          .top .left-side ul,
          .top .right-side ul {
              flex-direction: column;
              gap: 10px;
          }

          .top .right-side ul {
              align-items: flex-end;
              margin-top: 10px;
          }

          .main-nav nav .navbar-nav {
              padding: 20px 0;
          }

          .main-nav nav .navbar-nav .nav-item {
              margin: 5px 0;
          }

          .main-nav nav .navbar-nav .nav-item a {
              padding: 12px 15px !important;
          }
      }

      @media (max-width: 768px) {
          .top {
              padding: 10px 0;
          }

          .top .left-side,
          .top .right-side {
              text-align: center;
          }

          .top .left-side ul,
          .top .right-side ul {
              justify-content: center;
          }

          .main-nav .navbar-brand img {
              max-height: 45px;
          }
      }

/* Footer background and text */
/* .footer {
    background-color: #6a75ff !important;
    color: #ffffff !important;
    padding: 40px 0;
}

.footer a {
    color: #ffffff !important;
    transition: color 0.3s ease;
}

.footer a:hover {
    color: #d1d4ff !important; 
} */

/* Optional: style footer form inputs/buttons if any */
/* .footer input[type="submit"],
.footer button {
    background-color: #ffffff;
    color: #6a75ff;
    border: none;
    padding: 10px 20px;
    font-weight: 600;
    border-radius: 4px;
}

.footer input[type="submit"]:hover,
.footer button:hover {
    background-color: #d1d4ff;
    color: #333333;
} */
/* Style buttons in room and post sections */
.home-rooms .btn,
.home-rooms a.btn,
.blog-item .btn,
.blog-item a.btn {
    background-color: #6a75ff !important;
    color: #ffffff !important;
    border: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.home-rooms .btn:hover,
.blog-item .btn:hover {
    background-color: #5c68e0 !important; /* darker hover */
    color: #ffffff !important;
}
.phone-text::before,
.email-text::before {
    content: none !important;
    display: none !important;
}
.phone-text i,
.email-text i {  
    color: #d4af37 !important;
    margin-right: 8px;
}
.footer .social li a i {  
    color: #6a75ff; 
    margin-right: 6px;
}

/* Home About Section */
.home-about-section {
    background: linear-gradient(135deg, #fefcf7 0%, #f7f3e9 100%);
    position: relative;
    overflow: hidden;
}

.about-image-wrapper {
    position: relative;
}

.about-main-image {
    position: relative;
    z-index: 2;
}

.about-main-image img {
    width: 100%;
    height: 500px;
    object-fit: cover;
}

.experience-badge {
    position: absolute;
    bottom: 30px;
    right: 30px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(184, 160, 85, 0.3);
    z-index: 3;
}

.badge-content {
    text-align: center;
    color: white;
}

.badge-number {
    font-size: 36px;
    font-weight: 700;
    margin: 0;
    line-height: 1;
}

.badge-text {
    font-size: 14px;
    margin: 5px 0 0 0;
    font-weight: 500;
}

.about-small-image {
    position: absolute;
    top: -30px;
    left: -30px;
    width: 200px;
    z-index: 1;
}

.about-small-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border: 5px solid white;
}

.about-content {
    padding-left: 20px;
}

.about-label {
    display: inline-block;
    color: #b8a055;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 15px;
}

.about-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 20px;
    line-height: 1.2;
}

.about-description {
    color: #666;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 15px;
}

.about-features {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin: 30px 0;
}

.feature-box {
    display: flex;
    gap: 15px;
    align-items: flex-start;
    padding: 20px;
    background: white;
    border-radius: 12px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.feature-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.feature-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.feature-icon i {
    font-size: 22px;
    color: white;
}

.feature-content h4 {
    font-size: 16px;
    font-weight: 700;
    color: #1a365d;
    margin: 0 0 5px 0;
}

.feature-content p {
    font-size: 13px;
    color: #666;
    margin: 0;
}

.about-cta {
    margin-top: 30px;
}

.btn-about-more {
    display: inline-flex;
    align-items: center;
    background: #b8a055;
    color: white;
    padding: 15px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
}

.btn-about-more:hover {
    background: #a08f4a;
    color: white;
    text-decoration: none;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
}

.btn-about-more i {
    transition: transform 0.3s ease;
}

.btn-about-more:hover i {
    transform: translateX(5px);
}

/* Responsive */
@media (max-width: 991px) {
    .about-content {
        padding-left: 0;
        margin-top: 30px;
    }
    
    .about-title {
        font-size: 2rem;
    }
    
    .about-small-image {
        width: 150px;
        top: -20px;
        left: -20px;
    }
    
    .about-small-image img {
        height: 150px;
    }
}

@media (max-width: 768px) {
    .about-features {
        grid-template-columns: 1fr;
    }
    
    .about-title {
        font-size: 1.75rem;
    }
    
    .about-main-image img {
        height: 350px;
    }
    
    .experience-badge {
        bottom: 20px;
        right: 20px;
        padding: 20px 25px;
    }
    
    .badge-number {
        font-size: 28px;
    }
}

/* Modern Room Cards */
.modern-rooms {
    background-color: #f8f9fa;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
}

.section-subtitle {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 0;
}

.room-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.room-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.room-image {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.room-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.room-card:hover .room-image img {
    transform: scale(1.1);
}

.room-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 2;
    display: none; /* Hide price badge since price is now in header */
}

.price-badge {
    background: linear-gradient(135deg, #6a75ff, #5c68e0);
    color: white;
    padding: 8px 15px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0 4px 15px rgba(106, 117, 255, 0.3);
}

.price-badge small {
    font-size: 11px;
    opacity: 0.9;
}

.room-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(106, 117, 255, 0.9);
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
    color: white;
    text-decoration: none;
    padding: 12px 25px;
    border: 2px solid white;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.view-details-btn:hover {
    background: white;
    color: #6a75ff;
    text-decoration: none;
}

.room-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.room-header {
    margin-bottom: 15px;
}

.room-title-price {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 10px;
}

.room-title {
    margin: 0;
    font-size: 20px;
    font-weight: 700;
    flex: 1;
}

.room-title a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.room-title a:hover {
    color: #b8a055;
}

.room-price-inline {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    flex-shrink: 0;
}

.room-price-inline .price {
    font-size: 24px;
    font-weight: 700;
    color: #b8a055;
    line-height: 1;
}

.room-price-inline .period {
    font-size: 13px;
    color: #666;
    font-weight: 500;
}

.room-rating {
    display: flex;
    align-items: center;
    gap: 8px;
}

.stars {
    color: #ffc107;
    font-size: 14px;
}

.rating-text {
    font-size: 13px;
    color: #666;
    font-weight: 500;
}

.room-features {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
    color: #666;
}

.feature-item i {
    color: #6a75ff;
    width: 16px;
}

.room-description {
    margin-bottom: 20px;
    flex: 1;
}

.room-description p {
    color: #666;
    font-size: 14px;
    line-height: 1.6;
    margin: 0;
}

.room-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: auto;
}

.room-price {
    display: flex;
    align-items: baseline;
    gap: 5px;
}

.price {
    font-size: 24px;
    font-weight: 700;
    color: #333;
}

.period {
    font-size: 14px;
    color: #666;
}

.book-now-btn {
    background: #b8a055;
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(184, 160, 85, 0.3);
    border: none;
}

.book-now-btn:hover {
    background: #a08f4a;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(184, 160, 85, 0.4);
}

.book-now-btn i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.book-now-btn:hover i {
    transform: translateX(3px);
}

@media (max-width: 768px) {
    .room-features {
        gap: 10px;
    }
    
    .feature-item {
        font-size: 12px;
    }
    
    .room-footer {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }
    
    .book-now-btn {
        text-align: center;
    }
    
    .section-title {
        font-size: 2rem;
    }
}

    /* ========================================
       ENHANCED HEADER & NAVIGATION STYLES
       ======================================== */
       
    /* Top Bar Styles */
    .top {
        background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
        padding: 12px 0;
        border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .top .left-side ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 30px;
    }

    .top .left-side ul li a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .top .left-side ul li a i {
        color: #d4af37;
        font-size: 13px;
    }

    .top .left-side ul li a:hover {
        color: #d4af37;
        transform: translateX(3px);
    }

    .top .right-side ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: flex-end;
        gap: 5px;
    }

    .top .right-side ul li a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-size: 13px;
        padding: 6px 18px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
        font-weight: 500;
        display: inline-block;
        backdrop-filter: blur(10px);
    }

    .top .right-side ul li a:hover {
        background: #b8a055;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(184, 160, 85, 0.3);
    }

    .top .right-side ul li a sup {
        background: #b8a055;
        color: white;
        padding: 2px 6px;
        border-radius: 10px;
        font-size: 10px;
        margin-left: 4px;
        font-weight: 700;
    }

    /* Main Navigation Styles */
    .navbar-area {
        background: white;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 0;
        z-index: 999;
        transition: all 0.3s ease;
    }

    .navbar-area.sticky {
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
    }

    .main-nav {
        background-color: white !important;
        padding: 8px 0;
    }

    .main-nav .navbar-brand img {
        max-height: 60px;
        transition: all 0.3s ease;
    }

    .main-nav .navbar-brand:hover img {
        transform: scale(1.05);
    }

    /* Nav links */
    .main-nav nav .navbar-nav {
        gap: 5px;
    }

    .main-nav nav .navbar-nav .nav-item {
        position: relative;
    }

    .main-nav nav .navbar-nav .nav-item a {
        color: #1a365d !important;
        font-weight: 600;
        font-size: 15px;
        padding: 12px 20px !important;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        letter-spacing: 0.3px;
    }

    .main-nav nav .navbar-nav .nav-item a::before {
        content: '';
        position: absolute;
        bottom: 8px;
        left: 20px;
        right: 20px;
        height: 2px;
        background: linear-gradient(90deg, #d4af37, #b8941f);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    /* Nav links on hover or active */
    .main-nav nav .navbar-nav .nav-item a:hover,
    .main-nav nav .navbar-nav .nav-item.active a {
        color: #d4af37 !important;
        background: rgba(212, 175, 55, 0.08);
    }

    .main-nav nav .navbar-nav .nav-item a:hover::before,
    .main-nav nav .navbar-nav .nav-item.active a::before {
        transform: scaleX(1);
    }

    /* Special styling for Book Now button */
    .main-nav nav .navbar-nav .nav-item:last-child a {
        background: #b8a055;
        color: white !important;
        padding: 12px 28px !important;
        border-radius: 25px;
        box-shadow: 0 4px 15px rgba(184, 160, 85, 0.3);
        font-weight: 700;
    }

    .main-nav nav .navbar-nav .nav-item:last-child a::before {
        display: none;
    }

    .main-nav nav .navbar-nav .nav-item:last-child a:hover {
        background: #a08f4a;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(184, 160, 85, 0.4);
        color: white !important;
    }

    /* Dropdown Menu Styles */
    .main-nav nav .navbar-nav .nav-item .dropdown-menu {
        background: white;
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        padding: 10px;
        margin-top: 10px;
        min-width: 220px;
    }

    .main-nav nav .navbar-nav .nav-item .dropdown-menu li a {
        color: #1a365d !important;
        padding: 10px 18px !important;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover {
        background: rgba(212, 175, 55, 0.1);
        color: #d4af37 !important;
        padding-left: 24px !important;
    }

    /* Mobile Navigation */
    .mobile-nav {
        background: white;
        padding: 15px 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .mobile-nav .logo img {
        max-height: 50px;
    }

    /* Responsive Styles */
    @media (max-width: 991px) {
        .top .left-side ul,
        .top .right-side ul {
            flex-direction: column;
            gap: 10px;
        }

        .top .right-side ul {
            align-items: flex-end;
            margin-top: 10px;
        }

        .main-nav nav .navbar-nav {
            padding: 20px 0;
        }

        .main-nav nav .navbar-nav .nav-item {
            margin: 5px 0;
        }

        .main-nav nav .navbar-nav .nav-item a {
            padding: 12px 15px !important;
        }
    }

    @media (max-width: 768px) {
        .top {
            padding: 10px 0;
        }

        .top .left-side,
        .top .right-side {
            text-align: center;
        }

        .top .left-side ul,
        .top .right-side ul {
            justify-content: center;
        }

        .main-nav .navbar-brand img {
            max-height: 45px;
        }
    }

    /* mystle  */
        </style>

        <!-- Booking Page Styles -->
        <style>
        /* Booking Hero Section */
        .booking-hero {
            position: relative;
            height: 60vh;
            min-height: 500px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .booking-hero .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .booking-hero .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .booking-hero .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.6));
            z-index: 2;
            transition: background 0.5s ease;
        }

        .booking-hero:hover .hero-overlay {
            background: linear-gradient(135deg, rgba(26, 54, 93, 0.7), rgba(26, 54, 93, 0.5));
        }

        .booking-hero .hero-content {
            position: relative;
            z-index: 3;
            width: 100%;
            animation: fadeInUp 1.2s ease-out;
        }

        .booking-hero .breadcrumb-nav {
            margin-bottom: 20px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .booking-hero .breadcrumb-nav a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .booking-hero .breadcrumb-nav a:hover {
            color: var(--gold-color);
        }

        .booking-hero .separator {
            margin: 0 15px;
            color: var(--gold-color);
        }

        .booking-hero .current {
            color: var(--gold-color);
            font-weight: 600;
        }

        .booking-hero .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .booking-hero .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            letter-spacing: 1px;
        }

        /* Booking Hero Responsive Styles */
        @media (max-width: 1200px) {
            .booking-hero .hero-title {
                font-size: 3rem;
            }
        }

        @media (max-width: 992px) {
            .booking-hero .hero-title {
                font-size: 2.5rem;
            }
            
            .booking-hero {
                height: 50vh;
                min-height: 400px;
            }
        }

        @media (max-width: 768px) {
            .booking-hero .hero-title {
                font-size: 2rem;
            }
            
            .booking-hero .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .booking-hero {
                height: 40vh;
                min-height: 350px;
            }
            
            .booking-hero .breadcrumb-nav {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 576px) {
            .booking-hero .hero-title {
                font-size: 1.8rem;
            }
            
            .booking-hero .hero-subtitle {
                font-size: 1rem;
            }
            
            .booking-hero {
                height: 35vh;
                min-height: 300px;
            }
        }

        /* Booking Steps */
        .booking-steps {
            background: #f8f9fa;
        }

        .steps-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .step-item {
            display: flex;
            align-items: center;
            flex-direction: column;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .step-number {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #e9ecef;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            border: 3px solid #e9ecef;
        }

        .step-item.active .step-number {
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            color: white;
            border-color: #6a75ff;
            transform: scale(1.1);
        }

        .step-item.completed .step-number {
            background: #28a745;
            color: white;
            border-color: #28a745;
        }

        .step-content h6 {
            margin: 0 0 5px 0;
            font-weight: 600;
            color: #333;
        }

        .step-content p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }

        .step-line {
            flex: 1;
            height: 3px;
            background: #e9ecef;
            margin: 0 20px;
            position: relative;
            top: -20px;
        }

        .step-line.completed {
            background: #28a745;
        }

        /* Booking Form Card */
        .booking-form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .booking-form-card .card-header {
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            color: white;
            padding: 30px;
            border: none;
        }

        .card-title {
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 10px 0;
        }

        .card-subtitle {
            margin: 0;
            opacity: 0.9;
        }

        .booking-form-card .card-body {
            padding: 40px;
        }

        /* Booking Steps */
        .booking-step {
            display: none;
        }

        .booking-step.active {
            display: block;
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .step-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .step-header h4 {
            color: #333;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .step-header p {
            color: #666;
            margin: 0;
        }

        /* Room Selection */
        .room-option {
            position: relative;
        }

        .room-option input[type="radio"] {
            display: none;
        }

        .room-card {
            display: block;
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .room-option input[type="radio"]:checked + .room-card {
            border-color: #6a75ff;
            box-shadow: 0 8px 25px rgba(106, 117, 255, 0.2);
            transform: translateY(-5px);
        }

        .room-card .room-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .room-card .room-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .room-card:hover .room-image img {
            transform: scale(1.05);
        }

        .room-card .room-price {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            color: white;
            padding: 8px 15px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
        }

        .room-card .room-info {
            padding: 20px;
        }

        .room-name {
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 15px 0;
            color: #333;
        }

        .room-features {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .room-features .feature {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #666;
        }

        .room-features .feature i {
            color: #6a75ff;
        }

        .room-amenities {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .amenity {
            background: #f8f9fa;
            color: #666;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 12px;
        }

        .selection-indicator {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 30px;
            height: 30px;
            background: #28a745;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s ease;
        }

        .room-option input[type="radio"]:checked + .room-card .selection-indicator {
            opacity: 1;
            transform: scale(1);
        }

        /* Date Selection */
        .date-input-wrapper {
            position: relative;
        }

        .date-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6a75ff;
            pointer-events: none;
        }

        /* Guest Counter */
        .guest-counter {
            display: flex;
            align-items: center;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            overflow: hidden;
        }

        .counter-btn {
            width: 40px;
            height: 48px;
            border: none;
            background: #f8f9fa;
            color: #6a75ff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .counter-btn:hover {
            background: #6a75ff;
            color: white;
        }

        .guest-select {
            flex: 1;
            border: none;
            padding: 12px 15px;
            text-align: center;
            font-weight: 600;
        }

        .guest-select:focus {
            outline: none;
            box-shadow: none;
        }

        /* Booking Summary */
        .summary-card {
            background: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
        }

        .summary-header {
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            color: white;
            padding: 20px;
        }

        .summary-header h5 {
            margin: 0;
            font-weight: 700;
        }

        .summary-body {
            padding: 20px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-item.total {
            font-weight: 700;
            font-size: 18px;
            color: #6a75ff;
            border-top: 2px solid #e9ecef;
            margin-top: 10px;
            padding-top: 15px;
        }

        /* Step Actions */
        .step-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e9ecef;
        }

        .btn-prev {
            min-width: 120px;
        }

        .btn-next, .btn-book {
            min-width: 180px;
        }

        /* Sidebar */
        .booking-sidebar {
            position: sticky;
            top: 20px;
        }

        .sidebar-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .sidebar-card .card-header {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .sidebar-card .card-header h5 {
            margin: 0;
            font-weight: 700;
            color: #333;
        }

        .sidebar-card .card-body {
            padding: 20px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-item i {
            color: #6a75ff;
            font-size: 18px;
            margin-top: 2px;
        }

        .contact-options {
            display: flex;
            gap: 10px;
        }

        .contact-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            background: #6a75ff;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .contact-btn:hover {
            background: #5c68e0;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .special-offer {
            background: linear-gradient(135deg, #d4af37, #b8941f);
            color: #1a365d;
        }

        .special-offer .card-body {
            text-align: center;
        }

        .offer-icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #1a365d;
        }

        .special-offer h5 {
            color: #1a365d;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .special-offer p {
            margin-bottom: 10px;
            color: #1a365d;
        }

        .special-offer small {
            opacity: 0.8;
            color: #1a365d;
        }

        /* No Rooms */
        .no-rooms {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .no-rooms i {
            color: #ddd;
            margin-bottom: 20px;
        }

        /* Form Controls */
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #6a75ff;
            box-shadow: 0 0 0 0.2rem rgba(106, 117, 255, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        /* Buttons */
        .btn {
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #b8a055;
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 25px;
            padding: 12px 28px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(184, 160, 85, 0.3);
        }

        .btn-primary:hover {
            background: #a08f4a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(184, 160, 85, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #20c997, #17a2b8);
            transform: translateY(-2px);
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            border-color: #6c757d;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .steps-wrapper {
                flex-direction: column;
                gap: 20px;
            }
            
            .step-line {
                display: none;
            }
            
            .booking-form-card .card-header,
            .booking-form-card .card-body {
                padding: 20px;
            }
            
            .step-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn-prev, .btn-next, .btn-book {
                width: 100%;
            }
            
            .room-features {
                justify-content: center;
            }
            
            .contact-options {
                flex-direction: column;
            }
        }
        /* Rooms Page Styles */
        .rooms-hero {
            position: relative;
            height: 60vh;
            min-height: 500px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .rooms-hero .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .rooms-hero .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .rooms-hero .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.6));
            z-index: 2;
            transition: background 0.5s ease;
        }

        .rooms-hero:hover .hero-overlay {
            background: linear-gradient(135deg, rgba(26, 54, 93, 0.7), rgba(26, 54, 93, 0.5));
        }

        .rooms-hero .hero-content {
            position: relative;
            z-index: 3;
            width: 100%;
            animation: fadeInUp 1.2s ease-out;
        }

        .rooms-hero .breadcrumb-nav {
            margin-bottom: 20px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .rooms-hero .breadcrumb-nav a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .rooms-hero .breadcrumb-nav a:hover {
            color: var(--gold-color);
        }

        .rooms-hero .separator {
            margin: 0 15px;
            color: var(--gold-color);
        }

        .rooms-hero .current {
            color: var(--gold-color);
            font-weight: 600;
        }

        .rooms-hero .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .rooms-hero .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            letter-spacing: 1px;
        }

        /* Hero Animation Keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Breadcrumb styles for rooms page */
        .breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 10px 20px;
            backdrop-filter: blur(10px);
        }

        .breadcrumb-item a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Filter Section */
        .rooms-filter {
            border-bottom: 1px solid #e9ecef;
        }

        .search-box {
            position: relative;
        }

        .search-box .form-control {
            padding-left: 45px;
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .search-box .form-control:focus {
            border-color: #6a75ff;
            box-shadow: 0 0 0 0.2rem rgba(106, 117, 255, 0.25);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            pointer-events: none;
        }

        .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            border-color: #6a75ff;
            box-shadow: 0 0 0 0.2rem rgba(106, 117, 255, 0.25);
        }

        .view-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .results-count {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .view-toggle {
            display: flex;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            overflow: hidden;
        }

        .view-btn {
            background: white;
            border: none;
            padding: 8px 12px;
            color: #6c757d;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .view-btn.active {
            background: #6a75ff;
            color: white;
        }

        .view-btn:hover:not(.active) {
            background: #f8f9fa;
        }

        /* Rooms Section */
        .rooms-section {
            background: #f8f9fa;
            min-height: 60vh;
        }

        .room-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .room-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .room-image {
            position: relative;
            overflow: hidden;
            height: 280px;
        }

        .room-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .room-card:hover .room-image img {
            transform: scale(1.1);
        }

        .room-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 3;
        }

        .price-badge {
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            color: white;
            padding: 10px 18px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 15px;
            box-shadow: 0 6px 20px rgba(106, 117, 255, 0.4);
            backdrop-filter: blur(10px);
        }

        .price-badge small {
            font-size: 12px;
            opacity: 0.9;
        }

        .room-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(106, 117, 255, 0.9), rgba(92, 104, 224, 0.9));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.4s ease;
            z-index: 2;
        }

        .room-card:hover .room-overlay {
            opacity: 1;
        }

        .view-details-btn {
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border: 2px solid white;
            border-radius: 30px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .view-details-btn:hover {
            background: white;
            color: #6a75ff;
            text-decoration: none;
            transform: scale(1.05);
        }

        .room-actions {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 3;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .room-card:hover .room-actions {
            opacity: 1;
        }

        .action-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            color: #6a75ff;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            backdrop-filter: blur(10px);
        }

        .action-btn:hover {
            background: #6a75ff;
            color: white;
            transform: scale(1.1);
        }

        .action-btn.active {
            background: #ff6b6b;
            color: white;
        }

        .room-content {
            padding: 30px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .room-header {
            margin-bottom: 20px;
        }

        .room-title {
            margin: 0 0 12px 0;
            font-size: 22px;
            font-weight: 700;
            line-height: 1.3;
        }

        .room-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .room-title a:hover {
            color: #6a75ff;
        }

        .room-rating {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stars {
            color: #ffc107;
            font-size: 16px;
        }

        .rating-text {
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        .room-features {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        .feature-item i {
            color: #6a75ff;
            width: 18px;
            font-size: 16px;
        }

        .room-amenities {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .amenity-tag {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: #666;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .amenity-tag:hover {
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            color: white;
            border-color: #6a75ff;
        }

        .amenity-tag.more {
            background: #6a75ff;
            color: white;
            border-color: #6a75ff;
        }

        .room-description {
            margin-bottom: 25px;
            flex: 1;
        }

        .room-description p {
            color: #666;
            font-size: 15px;
            line-height: 1.7;
            margin: 0;
        }

        .room-footer {
            margin-top: auto;
        }

        .room-price {
            display: flex;
            align-items: baseline;
            gap: 8px;
            margin-bottom: 20px;
        }

        .price {
            font-size: 28px;
            font-weight: 700;
            color: #333;
        }

        .period {
            font-size: 16px;
            color: #666;
            font-weight: 500;
        }

        .room-actions-footer {
            display: flex;
            gap: 12px;
            align-items: center;
            width: 100%;
        }

        .btn-details {
            flex: 1;
            background: transparent;
            color: #b8a055;
            padding: 12px 20px;
            border: 2px solid #b8a055;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-details:hover {
            background: #b8a055;
            color: white;
            text-decoration: none;
        }

        .book-now-btn {
            flex: 2;
            background: #b8a055;
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(184, 160, 85, 0.3);
            border: none;
        }

        .book-now-btn:hover {
            background: #a08f4a;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(184, 160, 85, 0.4);
        }

        .book-now-btn i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .book-now-btn:hover i {
            transform: translateX(3px);
        }

        /* List View Styles */
        .rooms-section.list-view .room-item {
            width: 100%;
        }

        .rooms-section.list-view .room-card {
            flex-direction: row;
            height: auto;
        }

        .rooms-section.list-view .room-image {
            width: 300px;
            height: 250px;
            flex-shrink: 0;
        }

        .rooms-section.list-view .room-content {
            flex: 1;
        }

        /* Pagination */
        .pagination-wrapper .pagination {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .pagination .page-link {
            border: none;
            color: #6a75ff;
            font-weight: 600;
            padding: 12px 18px;
            margin: 0 5px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: #6a75ff;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background: #6a75ff;
            color: white;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 25px 30px;
        }

        .modal-title {
            font-weight: 700;
            font-size: 20px;
        }

        .btn-close {
            filter: invert(1);
        }

        .modal-body {
            padding: 30px;
        }

        .modal-footer {
            padding: 20px 30px;
            border-top: 1px solid #e9ecef;
        }

        /* Loading and No Results */
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        #noResults i {
            color: #ddd;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .rooms-hero .hero-title {
                font-size: 3rem;
            }
        }

        @media (max-width: 992px) {
            .rooms-hero .hero-title {
                font-size: 2.5rem;
            }
            
            .rooms-hero {
                height: 50vh;
                min-height: 400px;
            }
            
            .filter-controls .row {
                justify-content: center;
            }
            
            .view-controls {
                justify-content: center;
                margin-top: 20px;
            }
        }

        @media (max-width: 768px) {
            .rooms-hero .hero-title {
                font-size: 2rem;
            }
            
            .rooms-hero .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .rooms-hero {
                height: 40vh;
                min-height: 350px;
            }
            
            .room-features {
                gap: 12px;
            }
            
            .feature-item {
                font-size: 13px;
            }
            
            .room-actions-footer {
                flex-direction: column;
            }
            
            .btn-details, .book-now-btn {
                flex: none;
                width: 100%;
            }
            
            .rooms-section.list-view .room-card {
                flex-direction: column;
            }
            
            .rooms-section.list-view .room-image {
                width: 100%;
                height: 250px;
            }
            
            .view-toggle {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .room-content {
                padding: 20px;
            }
            
            .room-image {
                height: 220px;
            }
            
            .price {
                font-size: 24px;
            }
            
            .filter-controls .col-md-4,
            .filter-controls .col-md-3,
            .filter-controls .col-md-2 {
                margin-bottom: 15px;
            }
        }
        </style>

        @livewireStyles
    </head>
    <body>
        
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
    <ul>
        @if(optional($global_setting_data)->top_bar_phone != '')
        <li class="phone-text">
            {{-- Link added here --}}
            <a href="tel:{{ optional($global_setting_data)->top_bar_phone }}">
                <i class="fas fa-phone-alt"></i>{{ optional($global_setting_data)->top_bar_phone }}
            </a>
        </li>
        @endif
        
        @if(optional($global_setting_data)->top_bar_email != '')
        <li class="email-text">
            {{-- Link added here --}}
            <a href="mailto:{{ optional($global_setting_data)->top_bar_email }}">
                <i class="fas fa-envelope"></i>{{ optional($global_setting_data)->top_bar_email }}
            </a>
        </li>
        @endif
    </ul>
</div>
                    <div class="col-md-6 right-side">
                        <ul class="right">

                            @if(optional($global_page_data)->cart_status == 1)
                            <li class="menu"><a href="{{ route('cart') }}">{{ optional($global_page_data)->cart_heading }} @if(session()->has('cart_room_id'))<sup>{{ count(session()->get('cart_room_id')) }}</sup>@endif</a></li>
                            @endif

                            @if(optional($global_page_data)->checkout_status == 1)
                            <li class="menu"><a href="{{ route('checkout') }}">{{ optional($global_page_data)->checkout_heading }}</a></li>
                            @endif


                            @if(!Auth::guard('customer')->check())

                                @if(optional($global_page_data)->signup_status == 1)
                                <li class="menu"><a href="{{ route('customer_signup') }}">{{ optional($global_page_data)->signup_heading }}</a></li>
                                @endif

                                @if(optional($global_page_data)->signin_status == 1)
                                <li class="menu"><a href="{{ route('customer_login') }}">{{ optional($global_page_data)->signin_heading }}</a></li>
                                @endif

                            @else   

                                <li class="menu"><a href="{{ route('customer.home') }}">Dashboard</a></li>

                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="navbar-area" id="stickymenu">

            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="{{ asset('uploads/'.optional($global_setting_data)->logo) }}" alt="">
                </a>
            </div>
        
            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('uploads/'.optional($global_setting_data)->logo) }}" alt="">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">        
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                                </li>

                                @if(optional($global_page_data)->about_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('about') }}" class="nav-link">{{ optional($global_page_data)->about_heading }}</a>
                                </li>
                                @endif

                                <li class="nav-item">
                                    <a href="{{ route('room') }}" class="nav-link">Rooms & Suites</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('booking') }}" class="nav-link">Book Now</a>
                                </li>

                                @if(optional($global_page_data)->photo_gallery_status == 1 || optional($global_page_data)->video_gallery_status == 1)
                                <li class="nav-item">
                                    <!-- <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a> -->
                                    <ul class="dropdown-menu">

                                        @if(optional($global_page_data)->photo_gallery_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route('photo_gallery') }}" class="nav-link">{{ optional($global_page_data)->photo_gallery_heading }}</a>
                                        </li>
                                        @endif
                                        
                                        @if(optional($global_page_data)->video_gallery_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route('video_gallery') }}" class="nav-link">{{ optional($global_page_data)->video_gallery_heading }}</a>
                                        </li>
                                        @endif

                                    </ul>
                                </li>
                                @endif


                                @if(optional($global_page_data)->blog_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('blog') }}" class="nav-link">{{ optional($global_page_data)->blog_heading }}</a>
                                </li>
                                @endif

                                @if(optional($global_page_data)->contact_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('contact') }}" class="nav-link">{{ optional($global_page_data)->contact_heading }}</a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        
        @yield('main_content')


        <footer class="modern-footer">
            <div class="footer-main">
                <div class="container">
                    <div class="row g-4">
                        <!-- Company Info -->
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widget">
                                <div class="footer-logo mb-4">
                                    <img src="{{ asset('uploads/'.optional($global_setting_data)->logo) }}" alt="Hotel Logo" class="img-fluid">
                                </div>
                                <p class="footer-description">
                                    Experience luxury and comfort at our premium hotel. We provide exceptional service and unforgettable stays for travelers from around the world.
                                </p>
                                <div class="footer-social">
                                    <h6 class="social-title">Follow Us</h6>
                                    <div class="social-links">
                                        @if(optional($global_setting_data)->facebook != '')
                                        <a href="{{ optional($global_setting_data)->facebook }}" class="social-link facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        @endif
                                        @if(optional($global_setting_data)->twitter != '')
                                        <a href="{{ optional($global_setting_data)->twitter }}" class="social-link twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        @endif
                                        @if(optional($global_setting_data)->linkedin != '')
                                        <a href="{{ optional($global_setting_data)->linkedin }}" class="social-link linkedin">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        @endif
                                        @if(optional($global_setting_data)->pinterest != '')
                                        <a href="{{ optional($global_setting_data)->pinterest }}" class="social-link pinterest">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="col-lg-2 col-md-6">
                            <div class="footer-widget">
                                <h5 class="widget-title">Quick Links</h5>
                                <ul class="footer-links">
                                    <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i>Home</a></li>
                                    @if(optional($global_page_data)->about_status == 1)
                                    <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i>{{ optional($global_page_data)->about_heading }}</a></li>
                                    @endif
                                    <li><a href="{{ route('room') }}"><i class="fas fa-chevron-right"></i>Rooms & Suites</a></li>
                                    @if(optional($global_page_data)->blog_status == 1)
                                    <li><a href="{{ route('blog') }}"><i class="fas fa-chevron-right"></i>{{ optional($global_page_data)->blog_heading }}</a></li>
                                    @endif
                                    @if(optional($global_page_data)->contact_status == 1)
                                    <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i>{{ optional($global_page_data)->contact_heading }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Services -->
                        <div class="col-lg-2 col-md-6">
                            <div class="footer-widget">
                                <h5 class="widget-title">Services</h5>
                                <ul class="footer-links">
                                    @if(optional($global_page_data)->photo_gallery_status == 1)
                                    <li><a href="{{ route('photo_gallery') }}"><i class="fas fa-chevron-right"></i>{{ optional($global_page_data)->photo_gallery_heading }}</a></li>
                                    @endif
                                    @if(optional($global_page_data)->video_gallery_status == 1)
                                    <li><a href="{{ route('video_gallery') }}"><i class="fas fa-chevron-right"></i>{{ optional($global_page_data)->video_gallery_heading }}</a></li>
                                    @endif
                                    @if(optional($global_page_data)->faq_status == 1)
                                    <li><a href="{{ route('faq') }}"><i class="fas fa-chevron-right"></i>{{ optional($global_page_data)->faq_heading }}</a></li>
                                    @endif
                                    @if(optional($global_page_data)->terms_status == 1)
                                    <li><a href="{{ route('terms') }}"><i class="fas fa-chevron-right"></i>{{ optional($global_page_data)->terms_heading }}</a></li>
                                    @endif
                                    @if(optional($global_page_data)->privacy_status == 1)
                                    <li><a href="{{ route('privacy') }}"><i class="fas fa-chevron-right"></i>{{ optional($global_page_data)->privacy_heading }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widget">
                                <h5 class="widget-title">Contact Information</h5>
                                <div class="contact-info">
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-details">
                                            <h6>Address</h6>
                                            <p>{!! nl2br(optional($global_setting_data)->footer_address) !!}</p>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="contact-details">
                                            <h6>Phone</h6>
                                            <p><a href="tel:{{ optional($global_setting_data)->footer_phone }}">{{ optional($global_setting_data)->footer_phone }}</a></p>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="contact-details">
                                            <h6>Email</h6>
                                            <p><a href="mailto:{{ optional($global_setting_data)->footer_email }}">{{ optional($global_setting_data)->footer_email }}</a></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Newsletter -->
                                <div class="newsletter-section mt-4">
                                    <h6 class="newsletter-title">Stay Updated</h6>
                                    <p class="newsletter-text">Subscribe to get special offers and updates</p>
                                    <form action="{{ route('subscriber_send_email') }}" method="post" class="newsletter-form form_subscribe_ajax">
                                        @csrf
                                        <div class="input-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                        <span class="text-danger error-text email_error"></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="copyright-text">
                                <p>
                                    {{ $global_setting_data->copyright }}
                                    @if(strpos($global_setting_data->copyright, 'Aklilu Mengesha') === false)
                                        | Developed by <a href="mailto:aklilumengesha57@gmail.com" style="color: #4caf50; text-decoration: none;">Aklilu Mengesha</a>
                                    @else
                                        {!! str_replace('Aklilu Mengesha', '<a href="mailto:aklilumengesha57@gmail.com" style="color: #4caf50; text-decoration: none;">Aklilu Mengesha</a>', $global_setting_data->copyright) !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <style>
        /* Modern Footer Styles */
        .modern-footer {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .modern-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.05"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.05"/><circle cx="50" cy="10" r="0.5" fill="%23ffffff" opacity="0.03"/><circle cx="10" cy="60" r="0.5" fill="%23ffffff" opacity="0.03"/><circle cx="90" cy="40" r="0.5" fill="%23ffffff" opacity="0.03"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .footer-main {
            padding: 60px 0 40px;
            position: relative;
            z-index: 1;
        }

        .footer-widget {
            height: 100%;
        }

        .footer-logo img {
            max-height: 60px;
            width: auto;
            object-fit: contain;
        }

        .footer-description {
            color: #b8c5d6;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .widget-title {
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .widget-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #b8c5d6;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .footer-links a i {
            font-size: 10px;
            margin-right: 10px;
            color: #6a75ff;
            transition: transform 0.3s ease;
        }

        .footer-links a:hover {
            color: #ffffff;
            transform: translateX(5px);
        }

        .footer-links a:hover i {
            transform: translateX(3px);
        }

        .social-title {
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
            transition: all 0.3s ease;
        }

        .social-link:hover::before {
            background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(255,255,255,0.1));
        }

        .social-link i {
            color: #ffffff;
            font-size: 18px;
            position: relative;
            z-index: 1;
        }

        .social-link.facebook:hover {
            background: #3b5998;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(59, 89, 152, 0.4);
        }

        .social-link.twitter:hover {
            background: #1da1f2;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(29, 161, 242, 0.4);
        }

        .social-link.linkedin:hover {
            background: #0077b5;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 119, 181, 0.4);
        }

        .social-link.pinterest:hover {
            background: #bd081c;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(189, 8, 28, 0.4);
        }

        .contact-info {
            margin-bottom: 30px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .contact-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #7B8CFF, #6a75ff);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .contact-icon i {
            color: #ffffff;
            font-size: 16px;
        }

        .contact-details h6 {
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .contact-details p {
            color: #b8c5d6;
            margin: 0;
            font-size: 14px;
            line-height: 1.5;
        }

        .contact-details a {
            color: #b8c5d6;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-details a:hover {
            color: #6a75ff;
        }

        .newsletter-section {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .newsletter-title {
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .newsletter-text {
            color: #b8c5d6;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .newsletter-form .input-group {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .newsletter-form .form-control {
            border: none;
            padding: 12px 20px;
            background: #ffffff;
            color: #333;
            font-size: 14px;
        }

        .newsletter-form .form-control:focus {
            box-shadow: none;
            background: #ffffff;
        }

        .newsletter-form .btn {
            border: none;
            padding: 12px 20px;
            background: linear-gradient(135deg, #6a75ff, #5c68e0);
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .newsletter-form .btn:hover {
            background: linear-gradient(135deg, #5c68e0, #4c5fd4);
            transform: translateX(-2px);
        }

        .footer-bottom {
            background: rgba(0, 0, 0, 0.3);
            padding: 25px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .copyright-text p {
            color: #b8c5d6;
            margin: 0;
            font-size: 14px;
        }

        .footer-bottom-links {
            text-align: right;
        }

        .footer-bottom-links a {
            color: #b8c5d6;
            text-decoration: none;
            font-size: 14px;
            margin-left: 20px;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: #6a75ff;
        }

        @media (max-width: 768px) {
            .footer-main {
                padding: 40px 0 30px;
            }
            
            .footer-bottom-links {
                text-align: left;
                margin-top: 15px;
            }
            
            .footer-bottom-links a {
                margin-left: 0;
                margin-right: 20px;
            }
            
            .social-links {
                justify-content: center;
            }
            
            .newsletter-form .input-group {
                flex-direction: column;
            }
            
            .newsletter-form .btn {
                border-radius: 0 0 25px 25px;
            }
            
            .newsletter-form .form-control {
                border-radius: 25px 25px 0 0;
            }
        }
        </style>
     
        <div class="scroll-top">
            <i class="fa fa-angle-up"></i>
        </div>

        <style>
        /* Scroll to Top Button - Gold Theme */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #b8a055, #a08f4a) !important;
            color: white !important;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 999;
            box-shadow: 0 5px 20px rgba(184, 160, 85, 0.4);
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
        }

        .scroll-top.active {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            background: linear-gradient(135deg, #a08f4a, #8f7e42) !important;
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(184, 160, 85, 0.5);
        }

        .scroll-top i {
            font-size: 20px;
            color: white;
        }

        @media (max-width: 768px) {
            .scroll-top {
                width: 45px;
                height: 45px;
                bottom: 20px;
                right: 20px;
            }

            .scroll-top i {
                font-size: 18px;
            }
        }
        </style>

        <script>
        // Scroll to Top Button Functionality
        $(document).ready(function() {
            // Show/hide scroll-to-top button based on scroll position
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $('.scroll-top').addClass('active');
                } else {
                    $('.scroll-top').removeClass('active');
                }
            });

            // Smooth scroll to top when button is clicked
            $('.scroll-top').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 800, 'swing');
                return false;
            });
        });
        </script>
		
        @include('front.layout.scripts_footer')

        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif

        <script>
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
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }
                            
                        }
                    });
                });
            })(jQuery);
        </script>

        <!-- Booking Page JavaScript -->
        <script>
        // Booking form functionality
        let currentStep = 1;
        let selectedRoom = null;
        let selectedDates = null;
        let selectedGuests = { adults: 2, children: 0 };

        // Initialize booking form
        $(document).ready(function() {
            // Initialize AOS if available
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true
                });
            }

            // Room selection
            $('.room-option input[type="radio"]').on('change', function() {
                selectedRoom = {
                    id: $(this).val(),
                    name: $(this).closest('.room-option').find('.room-name').text(),
                    price: $(this).data('room-price') || $(this).closest('.room-option').data('room-price')
                };
                updateSummary();
            });

            // Date selection
            $('.daterange1').on('change', function() {
                selectedDates = $(this).val();
                updateSummary();
            });

            // Guest counters
            $('.counter-btn').on('click', function() {
                const target = $(this).data('target');
                const isPlus = $(this).hasClass('plus');
                const select = $(this).siblings('.guest-select');
                const currentValue = parseInt(select.val()) || 0;
                
                let newValue = currentValue;
                if (isPlus) {
                    newValue = Math.min(currentValue + 1, target === 'adult' ? 4 : 2);
                } else {
                    newValue = Math.max(currentValue - 1, target === 'adult' ? 1 : 0);
                }
                
                select.val(newValue);
                selectedGuests[target === 'adult' ? 'adults' : 'children'] = newValue;
                updateSummary();
            });

            // Guest select change
            $('.guest-select').on('change', function() {
                const name = $(this).attr('name');
                selectedGuests[name === 'adult' ? 'adults' : 'children'] = parseInt($(this).val()) || 0;
                updateSummary();
            });

            // Form submission
            $('#bookingForm').on('submit', function(e) {
                if (!validateCurrentStep()) {
                    e.preventDefault();
                    return false;
                }
            });
        });

        // Step navigation functions
        function nextStep(step) {
            if (!validateCurrentStep()) {
                return;
            }

            // Hide current step
            $('#step-' + currentStep).removeClass('active');
            $('.step-item[data-step="' + currentStep + '"]').removeClass('active').addClass('completed');

            // Show next step
            currentStep = step;
            $('#step-' + currentStep).addClass('active');
            $('.step-item[data-step="' + currentStep + '"]').addClass('active');

            // Update step lines
            updateStepLines();
            
            // Update summary when reaching final step
            if (currentStep === 4) {
                updateSummary();
            }

            // Scroll to top of form
            $('html, body').animate({
                scrollTop: $('.booking-form-card').offset().top - 100
            }, 500);
        }

        function prevStep(step) {
            // Hide current step
            $('#step-' + currentStep).removeClass('active');
            $('.step-item[data-step="' + currentStep + '"]').removeClass('active');

            // Show previous step
            currentStep = step;
            $('#step-' + currentStep).addClass('active');
            $('.step-item[data-step="' + currentStep + '"]').addClass('active').removeClass('completed');

            // Update step lines
            updateStepLines();

            // Scroll to top of form
            $('html, body').animate({
                scrollTop: $('.booking-form-card').offset().top - 100
            }, 500);
        }

        function updateStepLines() {
            $('.step-line').each(function(index) {
                if (index < currentStep - 1) {
                    $(this).addClass('completed');
                } else {
                    $(this).removeClass('completed');
                }
            });
        }

        function validateCurrentStep() {
            switch(currentStep) {
                case 1:
                    if (!$('input[name="room_id"]:checked').length) {
                        iziToast.warning({
                            title: 'Selection Required',
                            message: 'Please select a room to continue.',
                            position: 'topRight'
                        });
                        return false;
                    }
                    break;
                case 2:
                    if (!$('input[name="checkin_checkout"]').val()) {
                        iziToast.warning({
                            title: 'Dates Required',
                            message: 'Please select your check-in and check-out dates.',
                            position: 'topRight'
                        });
                        return false;
                    }
                    break;
                case 3:
                    if (!$('select[name="adult"]').val()) {
                        iziToast.warning({
                            title: 'Guest Information Required',
                            message: 'Please specify the number of adults.',
                            position: 'topRight'
                        });
                        return false;
                    }
                    break;
            }
            return true;
        }

        function updateSummary() {
            // Update room info
            if (selectedRoom) {
                $('#summary-room').text(selectedRoom.name);
            }

            // Update dates
            if (selectedDates) {
                $('#summary-dates').text(selectedDates);
                
                // Calculate nights
                const dates = selectedDates.split(' - ');
                if (dates.length === 2) {
                    const checkIn = new Date(dates[0]);
                    const checkOut = new Date(dates[1]);
                    const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
                    $('#summary-nights').text(nights + (nights === 1 ? ' night' : ' nights'));
                    
                    // Calculate total price
                    if (selectedRoom && selectedRoom.price) {
                        const total = nights * selectedRoom.price;
                        $('#summary-total').text('$' + total);
                    }
                }
            }

            // Update guests
            const guestText = selectedGuests.adults + (selectedGuests.adults === 1 ? ' Adult' : ' Adults');
            const childrenText = selectedGuests.children > 0 ? ', ' + selectedGuests.children + (selectedGuests.children === 1 ? ' Child' : ' Children') : '';
            $('#summary-guests').text(guestText + childrenText);
        }

        // Room card hover effects
        $(document).on('mouseenter', '.room-card', function() {
            $(this).addClass('hover');
        }).on('mouseleave', '.room-card', function() {
            $(this).removeClass('hover');
        });

        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
        </script>
        <!-- Rooms Page JavaScript -->
        <script>
        // Rooms page functionality
        $(document).ready(function() {
            // Initialize AOS if available
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true
                });
            }

            let allRooms = $('.room-item').toArray();
            let filteredRooms = [...allRooms];

            // Search functionality
            $('#roomSearch').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                filterRooms();
            });

            // Price filter
            $('#priceFilter').on('change', function() {
                filterRooms();
            });

            // Guest filter
            $('#guestFilter').on('change', function() {
                filterRooms();
            });

            // Sort functionality
            $('#sortBy').on('change', function() {
                sortRooms($(this).val());
            });

            // Clear filters
            $('#clearFilters').on('click', function() {
                $('#roomSearch').val('');
                $('#priceFilter').val('');
                $('#guestFilter').val('');
                $('#sortBy').val('name');
                filterRooms();
            });

            // View toggle
            $('.view-btn').on('click', function() {
                const view = $(this).data('view');
                $('.view-btn').removeClass('active');
                $(this).addClass('active');
                
                if (view === 'list') {
                    $('.rooms-section').addClass('list-view');
                    $('#roomsGrid').removeClass('row g-4').addClass('row g-3');
                } else {
                    $('.rooms-section').removeClass('list-view');
                    $('#roomsGrid').removeClass('row g-3').addClass('row g-4');
                }
            });

            // Favorite functionality
            $('.favorite-btn').on('click', function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                const icon = $(this).find('i');
                if ($(this).hasClass('active')) {
                    icon.removeClass('far').addClass('fas');
                    iziToast.success({
                        title: 'Added to Favorites',
                        message: 'Room added to your favorites list.',
                        position: 'topRight'
                    });
                } else {
                    icon.removeClass('fas').addClass('far');
                    iziToast.info({
                        title: 'Removed from Favorites',
                        message: 'Room removed from your favorites list.',
                        position: 'topRight'
                    });
                }
            });

            // Share functionality
            $('.share-btn').on('click', function(e) {
                e.preventDefault();
                const roomId = $(this).data('room-id');
                const roomName = $(this).closest('.room-card').find('.room-title a').text();
                const roomUrl = window.location.origin + '/room/' + roomId;
                
                if (navigator.share) {
                    navigator.share({
                        title: roomName,
                        text: 'Check out this amazing room!',
                        url: roomUrl
                    });
                } else {
                    // Fallback: copy to clipboard
                    navigator.clipboard.writeText(roomUrl).then(function() {
                        iziToast.success({
                            title: 'Link Copied',
                            message: 'Room link copied to clipboard!',
                            position: 'topRight'
                        });
                    });
                }
            });

            // Quick booking modal
            $('.quick-book-btn').on('click', function(e) {
                e.preventDefault();
                const roomId = $(this).data('room-id');
                $('#modalRoomId').val(roomId);
                $('#quickBookingModal').modal('show');
            });

            // Filter rooms function
            function filterRooms() {
                const searchTerm = $('#roomSearch').val().toLowerCase();
                const priceRange = $('#priceFilter').val();
                const guestCount = $('#guestFilter').val();

                filteredRooms = allRooms.filter(function(room) {
                    const $room = $(room);
                    const roomName = $room.data('name');
                    const roomPrice = parseInt($room.data('price'));
                    const roomGuests = parseInt($room.data('guests'));

                    // Search filter
                    if (searchTerm && !roomName.includes(searchTerm)) {
                        return false;
                    }

                    // Price filter
                    if (priceRange) {
                        if (priceRange === '0-100' && (roomPrice < 0 || roomPrice > 100)) return false;
                        if (priceRange === '100-200' && (roomPrice < 100 || roomPrice > 200)) return false;
                        if (priceRange === '200-300' && (roomPrice < 200 || roomPrice > 300)) return false;
                        if (priceRange === '300+' && roomPrice < 300) return false;
                    }

                    // Guest filter
                    if (guestCount) {
                        if (guestCount === '4+' && roomGuests < 4) return false;
                        if (guestCount !== '4+' && roomGuests != parseInt(guestCount)) return false;
                    }

                    return true;
                });

                displayRooms();
            }

            // Sort rooms function
            function sortRooms(sortBy) {
                filteredRooms.sort(function(a, b) {
                    const $a = $(a);
                    const $b = $(b);

                    switch(sortBy) {
                        case 'price-low':
                            return parseInt($a.data('price')) - parseInt($b.data('price'));
                        case 'price-high':
                            return parseInt($b.data('price')) - parseInt($a.data('price'));
                        case 'rating':
                            return parseFloat($b.data('rating')) - parseFloat($a.data('rating'));
                        case 'name':
                        default:
                            return $a.data('name').localeCompare($b.data('name'));
                    }
                });

                displayRooms();
            }

            // Display rooms function
            function displayRooms() {
                const $grid = $('#roomsGrid');
                const $loading = $('#loadingSpinner');
                const $noResults = $('#noResults');

                // Show loading
                $loading.show();
                $grid.hide();
                $noResults.hide();

                setTimeout(function() {
                    $loading.hide();

                    if (filteredRooms.length === 0) {
                        $noResults.show();
                        $grid.hide();
                    } else {
                        $grid.empty().append(filteredRooms).show();
                        
                        // Re-initialize AOS for new elements
                        if (typeof AOS !== 'undefined') {
                            AOS.refresh();
                        }
                    }

                    // Update count
                    $('#roomCount').text(filteredRooms.length);
                }, 500);
            }

            // Smooth scroll for pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                if (url) {
                    $('html, body').animate({
                        scrollTop: $('.rooms-section').offset().top - 100
                    }, 500, function() {
                        window.location.href = url;
                    });
                }
            });

            // Room card hover effects
            $('.room-card').on('mouseenter', function() {
                $(this).addClass('hover-effect');
            }).on('mouseleave', function() {
                $(this).removeClass('hover-effect');
            });

            // Lazy loading for images
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    });
                });

                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            }

            // Initialize tooltips if Bootstrap is available
            if (typeof bootstrap !== 'undefined') {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }
        });

        // Room comparison functionality (future enhancement)
        let comparisonList = [];

        function addToComparison(roomId) {
            if (comparisonList.length < 3 && !comparisonList.includes(roomId)) {
                comparisonList.push(roomId);
                updateComparisonUI();
            } else if (comparisonList.includes(roomId)) {
                comparisonList = comparisonList.filter(id => id !== roomId);
                updateComparisonUI();
            } else {
                iziToast.warning({
                    title: 'Comparison Limit',
                    message: 'You can compare up to 3 rooms at a time.',
                    position: 'topRight'
                });
            }
        }

        function updateComparisonUI() {
            // Update comparison button states and counter
            $('.compare-btn').each(function() {
                const roomId = $(this).data('room-id');
                if (comparisonList.includes(roomId)) {
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }
            });

            // Show/hide comparison bar
            if (comparisonList.length > 0) {
                // Show comparison bar (implement if needed)
            } else {
                // Hide comparison bar
            }
        }

        // Advanced search functionality
        function initAdvancedSearch() {
            // Price range slider
            if (typeof noUiSlider !== 'undefined') {
                const priceSlider = document.getElementById('priceRange');
                if (priceSlider) {
                    noUiSlider.create(priceSlider, {
                        start: [0, 500],
                        connect: true,
                        range: {
                            'min': 0,
                            'max': 500
                        },
                        format: {
                            to: function (value) {
                                return Math.round(value);
                            },
                            from: function (value) {
                                return Number(value);
                            }
                        }
                    });
                }
            }
        }
        </script>
        <div id="loader"></div>
    @stack('scripts')
    @livewireScripts
   </body>
</html>