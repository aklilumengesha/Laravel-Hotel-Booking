<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_heading',
        'about_content',
        'about_status',
        'about_main_image',
        'about_gallery',
        'terms_heading',
        'terms_content',
        'terms_status',
        'privacy_heading',
        'privacy_content',
        'privacy_status',
        'contact_heading',
        'contact_map',
        'contact_status',
        'photo_gallery_heading',
        'photo_gallery_status',
        'video_gallery_heading',
        'video_gallery_status',
        'faq_heading',
        'faq_status',
        'blog_heading',
        'blog_status',
        'room_heading',
        'cart_heading',
        'cart_status',
        'checkout_heading',
        'checkout_status',
        'payment_heading',
        'signup_heading',
        'signup_status',
        'signin_heading',
        'signin_status',
        'forget_password_heading',
        'reset_password_heading',
    ];
    protected $casts = [
        'about_gallery' => 'array',
    ];
}
