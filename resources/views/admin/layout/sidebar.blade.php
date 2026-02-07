<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.home') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.setting') }}"><i class="fa fa-cog"></i> <span>Setting</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/amenity*')||Request::is('admin/room*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-superpowers"></i><span>Room Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/amenity*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.amenity.index') }}"><i class="fa fa-angle-right"></i> Amenities</a></li>
                    <li class="{{ Request::is('admin/room*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.room.index') }}"><i class="fa fa-angle-right"></i> Rooms</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/datewise-rooms') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.datewise_rooms') }}"><i class="fa fa-calendar"></i> <span>Datewise Rooms</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/page/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-arrows"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.about.index') }}"><i class="fa fa-angle-right"></i> About</a></li>
                    <li class="{{ Request::is('admin/page/terms') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.terms') }}"><i class="fa fa-angle-right"></i> Terms and Conditions</a></li>
<li class="{{ Request::is('admin/page/privacy') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.privacy') }}"><i class="fa fa-angle-right"></i> Privacy Policy</a></li>
<li class="{{ Request::is('admin/page/contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.contact') }}"><i class="fa fa-angle-right"></i> Contact</a></li>
<li class="{{ Request::is('admin/page/photo-gallery') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.photo_gallery') }}"><i class="fa fa-angle-right"></i> Photo Gallery</a></li>
<li class="{{ Request::is('admin/page/video-gallery') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.video_gallery') }}"><i class="fa fa-angle-right"></i> Video Gallery</a></li>
<li class="{{ Request::is('admin/page/faq') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.faq') }}"><i class="fa fa-angle-right"></i> FAQ</a></li>
<li class="{{ Request::is('admin/page/blog') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.blog') }}"><i class="fa fa-angle-right"></i> Blog</a></li>
<li class="{{ Request::is('admin/page/room') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.room') }}"><i class="fa fa-angle-right"></i> Room</a></li>
<li class="{{ Request::is('admin/page/cart') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.cart') }}"><i class="fa fa-angle-right"></i> Cart</a></li>
<li class="{{ Request::is('admin/page/checkout') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.checkout') }}"><i class="fa fa-angle-right"></i> Checkout</a></li>
<li class="{{ Request::is('admin/page/payment') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.payment') }}"><i class="fa fa-angle-right"></i> Payment</a></li>
<li class="{{ Request::is('admin/page/signup') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.signup') }}"><i class="fa fa-angle-right"></i> Sign Up</a></li>
<li class="{{ Request::is('admin/page/signin') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.signin') }}"><i class="fa fa-angle-right"></i> Sign In</a></li>
<li class="{{ Request::is('admin/page/forget-password') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.forget_password') }}"><i class="fa fa-angle-right"></i> Forget Password</a></li>
<li class="{{ Request::is('admin/page/reset-password') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.page.reset_password') }}"><i class="fa fa-angle-right"></i> Reset Password</a></li>
                    {{-- Note: I have removed all the other page links for now as they use the old AdminPageController. We can add them back one by one after this is working. --}}
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/subscriber*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/subscriber/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.subscriber.show') }}"><i class="fa fa-angle-right"></i> All Subscribers</a></li>
                    <li class="{{ Request::is('admin/subscriber/send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.subscriber.send_email') }}"><i class="fa fa-angle-right"></i> Send Email</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/customers') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.customer') }}"><i class="fa fa-user-plus"></i> <span>Customers</span></a></li>
            <li class="{{ Request::is('admin/order*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.orders') }}"><i class="fa fa-cart-plus"></i> <span>Orders</span></a></li>
            <li class="{{ Request::is('admin/slide*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.slide.index') }}"><i class="fa fa-cubes"></i> <span>Slide</span></a></li>
            <li class="{{ Request::is('admin/feature*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.feature.index') }}"><i class="fa fa-gavel"></i> <span>Feature</span></a></li>
            <li class="{{ Request::is('admin/testimonial*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.testimonial.index') }}"><i class="fa fa-briefcase"></i> <span>Testimonial</span></a></li>
            <li class="{{ Request::is('admin/post*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.post.index') }}"><i class="fa fa-clipboard"></i> <span>Post</span></a></li>
            <li class="{{ Request::is('admin/photo*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.photo.index') }}"><i class="fa fa-picture-o"></i> <span>Photo Gallery</span></a></li>
            <li class="{{ Request::is('admin/video*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.video.index') }}"><i class="fa fa-camera"></i> <span>Video Gallery</span></a></li>
            <li class="{{ Request::is('admin/faq*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.faq.index') }}"><i class="fa fa-bolt"></i> <span>FAQ</span></a></li>
            
        </ul>
    </aside>
</div>
