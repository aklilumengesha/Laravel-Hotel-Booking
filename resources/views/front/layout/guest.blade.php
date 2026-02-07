<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Welcome' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap & Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

    <!-- Optional Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom right, #f0f4f8, #d9e2ec);
            min-height: 100vh;
        }

        .auth-card {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 400px;
        }

        .auth-title {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #34495e;
        }

        .auth-link {
            font-size: 0.9rem;
            color: #3498db;
            text-decoration: none;
        }

        .auth-link:hover {
            text-decoration: underline;
        }

        .brand-area {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
        }

        .brand-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="auth-card">
        <div class="brand-area">
            <img src="{{ asset('front/images/logo.png') }}" alt="Logo" class="brand-logo">
            <div class="brand-title">Hotel Booking</div>
        </div>

        @yield('main_content')
    </div>

    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
