@extends('front.layout.app')

@section('main_content')
<!-- Hero Section -->
<section class="auth-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide1.jpg') }}" alt="Login" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">{{ $global_page_data->signin_heading }}</span>
                    </nav>
                    <h1 class="hero-title">{{ $global_page_data->signin_heading }}</h1>
                    <p class="hero-subtitle">Welcome back! Please login to your account</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login Form Section -->
<section class="auth-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="auth-card" data-aos="fade-up">
                    <div class="auth-card-header">
                        <div class="auth-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <h3>Welcome Back</h3>
                        <p>Login to access your account</p>
                    </div>
                    
                    <div class="auth-card-body">
                        <form action="{{ route('customer_login_submit') }}" method="post">
                            @csrf
                            
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <span class="text-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                @if($errors->has('password'))
                                    <span class="text-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group mb-4 d-flex justify-content-between align-items-center">
                                <a href="{{ route('customer_forget_password') }}" class="auth-link">
                                    <i class="fas fa-key me-1"></i>Forgot Password?
                                </a>
                            </div>
                            
                            <div class="form-group mb-4">
                                <button type="submit" class="btn-auth w-100">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login
                                </button>
                            </div>
                            
                            <div class="auth-footer text-center">
                                <p class="mb-0">Don't have an account? 
                                    <a href="{{ route('customer_signup') }}" class="auth-link">Sign Up Now</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Auth Hero Section */
.auth-hero {
    position: relative;
    height: 50vh;
    min-height: 400px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.auth-hero .hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.auth-hero .hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.auth-hero .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.6));
    z-index: 2;
}

.auth-hero .hero-content {
    position: relative;
    z-index: 3;
    width: 100%;
}

.auth-hero .breadcrumb-nav {
    margin-bottom: 20px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
}

.auth-hero .breadcrumb-nav a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: color 0.3s ease;
}

.auth-hero .breadcrumb-nav a:hover {
    color: #d4af37;
}

.auth-hero .separator {
    margin: 0 10px;
}

.auth-hero .current {
    color: #d4af37;
}

.auth-hero .hero-title {
    font-size: 3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 15px;
}

.auth-hero .hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
}

/* Auth Section */
.auth-section {
    background: linear-gradient(135deg, #fefcf7 0%, #f7f3e9 100%);
    min-height: 60vh;
}

/* Auth Card */
.auth-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.auth-card:hover {
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
}

.auth-card-header {
    background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
    padding: 40px 30px;
    text-align: center;
    color: white;
}

.auth-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 10px 30px rgba(184, 160, 85, 0.3);
}

.auth-icon i {
    font-size: 32px;
    color: white;
}

.auth-card-header h3 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
    color: white;
}

.auth-card-header p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
}

.auth-card-body {
    padding: 40px 30px;
}

/* Form Styles */
.form-label {
    font-weight: 600;
    color: #1a365d;
    margin-bottom: 10px;
    display: block;
}

.form-label i {
    color: #b8a055;
}

.form-control {
    padding: 12px 18px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #b8a055;
    box-shadow: 0 0 0 0.2rem rgba(184, 160, 85, 0.15);
    outline: none;
}

.form-control::placeholder {
    color: #999;
}

.text-danger {
    font-size: 13px;
    margin-top: 5px;
    display: block;
}

/* Auth Button */
.btn-auth {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 14px 30px;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
    cursor: pointer;
}

.btn-auth:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
    color: white;
}

/* Auth Footer */
.auth-footer {
    padding-top: 20px;
    border-top: 2px solid #f0f0f0;
}

.auth-footer p {
    color: #666;
    font-size: 15px;
}

.auth-link {
    color: #b8a055;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
}

.auth-link:hover {
    color: #a08f4a;
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .auth-hero .hero-title {
        font-size: 2rem;
    }
    
    .auth-hero .hero-subtitle {
        font-size: 1rem;
    }
    
    .auth-card-header {
        padding: 30px 20px;
    }
    
    .auth-card-body {
        padding: 30px 20px;
    }
    
    .auth-icon {
        width: 70px;
        height: 70px;
    }
    
    .auth-icon i {
        font-size: 28px;
    }
}
</style>
@endsection


