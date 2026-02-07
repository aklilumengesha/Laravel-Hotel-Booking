<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\RoomController;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\BookingPageController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminDatewiseRoomController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerProfileController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\ChapaPaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Front\RoomFavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Front-End Routes
|--------------------------------------------------------------------------
*/




// new code replalcement 

// Route::post('/cart-submit', [CartController::class, 'store'])->name('cart_submit');
// Route::get('/room/{id}', [RoomController::class, 'detail'])->name('room_detail');

// new code replalcement 
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/booking', [BookingPageController::class, 'index'])->name('booking');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/post/{id}', [BlogController::class, 'single_post'])->name('post');
Route::get('/photo-gallery', [PhotoController::class, 'index'])->name('photo_gallery');
Route::get('/video-gallery', [VideoController::class, 'index'])->name('video_gallery');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact.send_email');
Route::post('/subscriber/send-email', [SubscriberController::class, 'send_email'])->name('subscriber_send_email');
Route::get('/subscriber/verify/{email}/{token}', [SubscriberController::class, 'verify'])->name('subscriber.verify');
Route::get('/room', [RoomController::class, 'index'])->name('room');
Route::get('/room/{id}', [RoomController::class, 'single_room'])->name('room_detail');
Route::post('/booking/submit', [BookingController::class, 'cart_submit'])->name('cart_submit');
Route::get('/cart', [BookingController::class, 'cart_view'])->name('cart');
Route::get('/cart/delete/{id}', [BookingController::class, 'cart_delete'])->name('cart.delete');
Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout');
Route::post('/payment', [BookingController::class, 'payment'])->name('payment');
Route::get('/payment/paypal/{price}', [BookingController::class, 'paypal'])->name('paypal');
Route::post('/payment/stripe/{price}', [BookingController::class, 'stripe'])->name('stripe');
Route::post('/payment/chapa', [ChapaPaymentController::class, 'payWithChapa'])->name('payment.chapa')->middleware('auth:customer');
Route::get('/payment/callback', [ChapaPaymentController::class, 'chapaCallback'])->name('chapa.callback');
Route::get('/payment/return', fn() => view('thankyou'))->name('chapa.return');
Route::post('/room/review', [ReviewController::class, 'store'])->name('room.review.store')->middleware('auth:customer');

// Room Like & Favorite Routes
Route::post('/room/favorite/toggle', [RoomFavoriteController::class, 'toggle'])->name('room.favorite.toggle');
Route::post('/room/favorite/status', [RoomFavoriteController::class, 'status'])->name('room.favorite.status');

/*
|--------------------------------------------------------------------------
| Customer Auth & Panel Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [CustomerAuthController::class, 'login'])->name('customer_login');
Route::post('/login-submit', [CustomerAuthController::class, 'login_submit'])->name('customer_login_submit');
Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
Route::get('/signup', [CustomerAuthController::class, 'signup'])->name('customer_signup');
Route::post('/signup-submit', [CustomerAuthController::class, 'signup_submit'])->name('customer_signup_submit');
Route::get('/signup-verify/{email}/{token}', [CustomerAuthController::class, 'signup_verify'])->name('customer.signup.verify');
Route::get('/forget-password', [CustomerAuthController::class, 'forget_password'])->name('customer_forget_password');
Route::post('/forget-password-submit', [CustomerAuthController::class, 'forget_password_submit'])->name('customer.forget_password.submit');
Route::get('/reset-password/{token}/{email}', [CustomerAuthController::class, 'reset_password'])->name('customer.reset_password');
Route::post('/reset-password-submit', [CustomerAuthController::class, 'reset_password_submit'])->name('customer.reset_password.submit');

Route::middleware('auth:customer')->prefix('customer')->name('customer.')->group(function() {
    Route::get('/home', [CustomerHomeController::class, 'index'])->name('home');
    Route::get('/edit-profile', [CustomerProfileController::class, 'index'])->name('profile');
    Route::post('/edit-profile-submit', [CustomerProfileController::class, 'profile_submit'])->name('profile.submit');
    Route::get('/order/view', [CustomerOrderController::class, 'index'])->name('order.view');
    Route::get('/invoice/{id}', [CustomerOrderController::class, 'invoice'])->name('invoice');
    Route::get('/liked-rooms', [CustomerHomeController::class, 'likedRooms'])->name('liked_rooms');
    Route::get('/saved-rooms', [CustomerHomeController::class, 'savedRooms'])->name('saved_rooms');
});






/*
|--------------------------------------------------------------------------
| Admin Auth & Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function() {
    // Admin Auth Routes (No Middleware)
    Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
    Route::post('/login-submit', [AdminLoginController::class, 'login_submit'])->name('login_submit');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('/forget-password', [AdminLoginController::class, 'forget_password'])->name('forget_password');
    Route::post('/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('forget_password.submit');
    Route::get('/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('reset_password');
    Route::post('/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('reset_password.submit');

    // Admin Authenticated Routes
    Route::middleware('admin:admin')->group(function(){
        Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile');
        Route::post('/profile', [AdminProfileController::class, 'update'])->name('profile.update');

        // About Page
        Route::get('/page/about', [AboutPageController::class, 'edit'])->name('about.index');
        Route::put('/page/about', [AboutPageController::class, 'update'])->name('about.update');

        // Settings
        Route::get('/setting', [AdminSettingController::class, 'index'])->name('setting');
        Route::post('/setting/update', [AdminSettingController::class, 'update'])->name('setting.update');

        // Datewise Rooms
        Route::get('/datewise-rooms', [AdminDatewiseRoomController::class, 'index'])->name('datewise_rooms');
        Route::post('/datewise-rooms/submit', [AdminDatewiseRoomController::class, 'show'])->name('datewise_rooms.submit');

        // Customers
        Route::get('/customers', [AdminCustomerController::class, 'index'])->name('customer');
        Route::get('/customer/view/{id}', [AdminCustomerController::class, 'view'])->name('customer.view');
        Route::get('/customer/change-status/{id}', [AdminCustomerController::class, 'change_status'])->name('customer.change_status');
        Route::get('/customer/delete/{id}', [AdminCustomerController::class, 'delete'])->name('customer.delete');
        Route::post('/customer/bulk-delete', [AdminCustomerController::class, 'bulk_delete'])->name('customer.bulk_delete');
        Route::get('/customer/export', [AdminCustomerController::class, 'export'])->name('customer.export');

        // Orders
        Route::get('/order/view', [AdminOrderController::class, 'index'])->name('orders');
        Route::get('/order/invoice/{id}', [AdminOrderController::class, 'invoice'])->name('invoice');
        Route::get('/order/delete/{id}', [AdminOrderController::class, 'delete'])->name('order.delete');

        // Resourceful Routes for CRUD
        Route::resource('slide', AdminSlideController::class)->except(['show']);
        Route::resource('feature', AdminFeatureController::class)->except(['show']);
        Route::resource('testimonial', AdminTestimonialController::class)->except(['show']);
        Route::resource('post', AdminPostController::class)->except(['show']);
        Route::resource('photo', AdminPhotoController::class)->except(['show']);
        Route::resource('video', AdminVideoController::class)->except(['show']);
        Route::resource('faq', AdminFaqController::class)->except(['show']);
        Route::resource('amenity', AdminAmenityController::class)->except(['show']);
        Route::resource('room', AdminRoomController::class);
        // i remove this ->except(['show']); from the resouce of admin room controller 
        
        // Room Gallery
        Route::get('/room/gallery/{id}', [AdminRoomController::class, 'gallery'])->name('room.gallery');
        Route::post('/room/gallery/store/{id}', [AdminRoomController::class, 'gallery_store'])->name('room.gallery.store');
        Route::get('/room/gallery/delete/{id}', [AdminRoomController::class, 'gallery_delete'])->name('room.gallery.delete');

        // Page Settings (AdminPageController)
        Route::prefix('page')->name('page.')->group(function () {
            Route::get('/terms', [AdminPageController::class, 'terms'])->name('terms');
            Route::post('/terms/update', [AdminPageController::class, 'terms_update'])->name('terms.update');
            Route::get('/privacy', [AdminPageController::class, 'privacy'])->name('privacy');
            Route::post('/privacy/update', [AdminPageController::class, 'privacy_update'])->name('privacy.update');
            Route::get('/contact', [AdminPageController::class, 'contact'])->name('contact');
            Route::post('/contact/update', [AdminPageController::class, 'contact_update'])->name('contact.update');
            Route::get('/photo-gallery', [AdminPageController::class, 'photo_gallery'])->name('photo_gallery');
            Route::post('/photo-gallery/update', [AdminPageController::class, 'photo_gallery_update'])->name('photo_gallery.update');
            Route::get('/video-gallery', [AdminPageController::class, 'video_gallery'])->name('video_gallery');
            Route::post('/video-gallery/update', [AdminPageController::class, 'video_gallery_update'])->name('video_gallery.update');
            Route::get('/faq', [AdminPageController::class, 'faq'])->name('faq');
            Route::post('/faq/update', [AdminPageController::class, 'faq_update'])->name('faq.update');
            Route::get('/blog', [AdminPageController::class, 'blog'])->name('blog');
            Route::post('/blog/update', [AdminPageController::class, 'blog_update'])->name('blog.update');
            Route::get('/room', [AdminPageController::class, 'room'])->name('room');
            Route::post('/room/update', [AdminPageController::class, 'room_update'])->name('room.update');
            Route::get('/cart', [AdminPageController::class, 'cart'])->name('cart');
            Route::post('/cart/update', [AdminPageController::class, 'cart_update'])->name('cart.update');
            Route::get('/checkout', [AdminPageController::class, 'checkout'])->name('checkout');
            Route::post('/checkout/update', [AdminPageController::class, 'checkout_update'])->name('checkout.update');
            Route::get('/payment', [AdminPageController::class, 'payment'])->name('payment');
            Route::post('/payment/update', [AdminPageController::class, 'payment_update'])->name('payment.update');
            Route::get('/signup', [AdminPageController::class, 'signup'])->name('signup');
            Route::post('/signup/update', [AdminPageController::class, 'signup_update'])->name('signup.update');
            Route::get('/signin', [AdminPageController::class, 'signin'])->name('signin');
            Route::post('/signin/update', [AdminPageController::class, 'signin_update'])->name('signin.update');
            Route::get('/forget-password', [AdminPageController::class, 'forget_password'])->name('forget_password');
            Route::post('/forget-password/update', [AdminPageController::class, 'forget_password_update'])->name('forget_password.update');
            Route::get('/reset-password', [AdminPageController::class, 'reset_password'])->name('reset_password');
            Route::post('/reset-password/update', [AdminPageController::class, 'reset_password_update'])->name('reset_password.update');

            // ... Add all other page routes here ...
        });

        // Subscribers
        Route::get('/subscriber/show', [AdminSubscriberController::class, 'show'])->name('subscriber.show');
        Route::get('/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('subscriber.send_email');
        Route::post('/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('subscriber.send_email.submit');
    });
});
