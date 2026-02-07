<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\Room;
use App\Models\Setting; // or use App\Models\GlobalSetting; depending on your app
use App\Models\Page;



class HomeController extends Controller
{
    public function index()
{
    $slide_all = Slide::get();
    $feature_all = Feature::get();
    $testimonial_all = Testimonial::get();
    $post_all = Post::orderBy('id','desc')->limit(3)->get();
    $room_all = Room::with('reviews')->get();

    $global_setting_data = Setting::first();
    $global_page_data = Page::first(); // adjust if you store page data elsewhere
    $global_room_data = Room::get();   // for Room & Suite dropdown

    return view('front.home', compact(
        'slide_all',
        'feature_all',
        'testimonial_all',
        'post_all',
        'room_all',
        'global_setting_data',
        'global_page_data',
        'global_room_data'
    ));
}
}
