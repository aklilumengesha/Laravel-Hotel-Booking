<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['id' => 1],
            [
                'about_heading' => 'About Us',
                'about_content' => 'About Us Content',
                'about_status' => 1,
                'blog_heading' => 'Blog',
                'blog_status' => 1,
                'room_heading' => 'Rooms',
                'cart_heading' => 'Cart',
                'cart_status' => 1,
                'checkout_heading' => 'Checkout',
                'checkout_status' => 1,
                'payment_heading' => 'Payment',
                'signin_heading' => 'Sign In',
                'signin_status' => 1,
                'signup_heading' => 'Sign Up',
                'signup_status' => 1,
                'photo_gallery_heading' => 'Photo Gallery',
                'photo_gallery_status' => 1,
                'video_gallery_heading' => 'Video Gallery',
                'video_gallery_status' => 1,
                'faq_heading' => 'FAQ',
                'faq_status' => 1,
                'contact_heading' => 'Contact',
                'contact_status' => 1,
                'terms_heading' => 'Terms and Conditions',
                'terms_content' => 'Terms and Conditions Content',
                'terms_status' => 1,
                'privacy_heading' => 'Privacy Policy',
                'privacy_content' => 'Privacy Policy Content',
                'privacy_status' => 1,
                'forget_password_heading' => 'Forget Password',
                'reset_password_heading' => 'Reset Password',
                'status' => 1,
            ]
        );
    }
}
