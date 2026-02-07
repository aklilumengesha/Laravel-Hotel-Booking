<div class="navbar-bg" style="background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fa fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="nav-link">
            <a href="{{ route('home') }}" class="btn" style="background: linear-gradient(135deg, #b8a055, #a08f4a); color: white; border-radius: 25px; padding: 8px 20px; font-weight: 600;">
                <i class="fas fa-home me-1"></i>Home
            </a>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image"
                    src="{{ Auth::guard('customer')->user()->photo ? asset('uploads/'.Auth::guard('customer')->user()->photo) : asset('uploads/default.png') }}"
                    class="rounded-circle mr-1" style="border: 2px solid #b8a055;">
                <div class="d-sm-none d-lg-inline-block">
                    {{ Auth::guard('customer')->user()->name }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('customer.profile') }}" class="dropdown-item has-icon">
                    <i class="fa fa-user" style="color: #b8a055;"></i> Edit Profile
                </a>
                <a href="{{ route('customer.logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
