<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Hotel Management</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #1a365d 0%, #2c5282 50%, #1a365d 100%);
            position: relative;
            overflow: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .bg-animation span {
            position: absolute;
            display: block;
            width: 20px;
            height: 20px;
            background: rgba(184, 160, 85, 0.1);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }

        .bg-animation span:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .bg-animation span:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
        .bg-animation span:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
        .bg-animation span:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
        .bg-animation span:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
        .bg-animation span:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        .bg-animation span:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
        .bg-animation span:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-delay: 15s; animation-duration: 45s; }
        .bg-animation span:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-delay: 2s; animation-duration: 35s; }
        .bg-animation span:nth-child(10) { left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }

        @keyframes animate {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 50%; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
        }

        /* Main Container */
        .login-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        /* Left Side - Branding */
        .login-branding {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            color: white;
            position: relative;
        }

        .brand-content {
            text-align: center;
            max-width: 500px;
        }

        .brand-logo {
            width: 150px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: float 3s ease-in-out infinite;
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-logo i {
            font-size: 80px;
            color: #b8a055;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .brand-logo i {
            font-size: 50px;
            color: white;
        }

        .brand-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .brand-title span {
            color: #b8a055;
        }

        .brand-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 20px;
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(10px);
        }

        .feature-item i {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #b8a055, #a08f4a);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .feature-item span {
            font-size: 15px;
            font-weight: 500;
        }

        /* Right Side - Login Form */
        .login-form-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-card {
            background: white;
            border-radius: 30px;
            padding: 50px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h2 {
            font-size: 28px;
            font-weight: 700;
            color: #1a365d;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #666;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1a365d;
            margin-bottom: 10px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i.input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #b8a055;
            font-size: 18px;
            transition: color 0.3s ease;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            padding: 16px 50px 16px 50px;
            border: 2px solid #e8e8e8;
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #b8a055;
            background: white;
            box-shadow: 0 0 0 4px rgba(184, 160, 85, 0.1);
        }

        .form-control:focus + i,
        .input-wrapper:focus-within i.input-icon {
            color: #1a365d;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s ease;
            z-index: 2;
            padding: 5px;
        }

        .password-toggle:hover {
            color: #b8a055;
        }

        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #1a365d, #2c5282);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #b8a055, #a08f4a);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(184, 160, 85, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .forgot-link {
            text-align: center;
        }

        .forgot-link a {
            color: #b8a055;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-link a:hover {
            color: #1a365d;
            text-decoration: underline;
        }

        .back-to-site {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }

        .back-to-site a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease;
        }

        .back-to-site a:hover {
            color: #b8a055;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-branding {
                display: none;
            }
            .login-form-section {
                flex: 1;
            }
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 35px 25px;
                border-radius: 20px;
            }
            .login-header h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <span></span><span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span><span></span>
    </div>

    <div class="login-container">
        <!-- Left Side - Branding -->
        <div class="login-branding">
            <div class="brand-content">
                <div class="brand-logo">
                    @if(isset($global_setting_data) && $global_setting_data->logo)
                        <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="Logo">
                    @else
                        <i class="fas fa-hotel"></i>
                    @endif
                </div>
                <h1 class="brand-title">Hotel <span>Admin</span></h1>
                <p class="brand-subtitle">Manage your hotel operations efficiently with our powerful admin dashboard.</p>
                
                <div class="brand-features">
                    <div class="feature-item">
                        <i class="fas fa-chart-line"></i>
                        <span>Real-time Analytics & Reports</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-bed"></i>
                        <span>Room & Booking Management</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <span>Customer Management</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-form-section">
            <div class="login-card">
                <div class="login-header">
                    <h2>Welcome Back!</h2>
                    <p>Sign in to access your admin dashboard</p>
                </div>

                <form action="{{ route('admin.login_submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        @error('email')
                            <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>

                    <div class="forgot-link">
                        <a href="{{ route('admin.forget_password') }}">Forgot your password?</a>
                    </div>
                </form>

                <div class="back-to-site">
                    <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Back to Website</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>

    @if(session()->get('error'))
    <script>
        iziToast.error({
            title: 'Error',
            message: '{{ session()->get('error') }}',
            position: 'topRight'
        });
    </script>
    @endif

    @if(session()->get('success'))
    <script>
        iziToast.success({
            title: 'Success',
            message: '{{ session()->get('success') }}',
            position: 'topRight'
        });
    </script>
    @endif
</body>
</html>
