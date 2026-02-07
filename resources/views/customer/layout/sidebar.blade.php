<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('customer.home') }}" style="color: #b8a055; font-weight: 700;">
                <i class="fas fa-hotel me-2"></i>Customer Panel
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('customer.home') }}" style="color: #b8a055;">CP</a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('customer/home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customer.home') }}" style="{{ Request::is('customer/home') ? 'background: linear-gradient(135deg, #b8a055, #a08f4a); color: white;' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('customer/order/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customer.order.view') }}" style="{{ Request::is('customer/order/*') ? 'background: linear-gradient(135deg, #b8a055, #a08f4a); color: white;' : '' }}">
                    <i class="fas fa-box"></i> <span>My Orders</span>
                </a>
            </li>

            <li class="{{ Request::is('customer/edit-profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customer.profile') }}" style="{{ Request::is('customer/edit-profile') ? 'background: linear-gradient(135deg, #b8a055, #a08f4a); color: white;' : '' }}">
                    <i class="fas fa-user-cog"></i> <span>Edit Profile</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

<style>
.main-sidebar .sidebar-menu li.active > a {
    background: linear-gradient(135deg, #b8a055, #a08f4a) !important;
    color: white !important;
    box-shadow: 0 5px 15px rgba(184, 160, 85, 0.3);
}

.main-sidebar .sidebar-menu li a:hover {
    background: rgba(184, 160, 85, 0.1) !important;
    color: #b8a055 !important;
}
</style>
