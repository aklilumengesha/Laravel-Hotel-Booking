<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;
use App\Models\Testimonial;
use App\Models\Photo;

class AboutController extends Controller
{
    public function index()
    {
        // Load the about page data from the database
        $about = AboutPage::first();
        
        // Load testimonials for the testimonials section
        $testimonial_all = Testimonial::all();
        
        // Load photos for the gallery section (limit to 6 for about page)
        $photos = Photo::take(6)->get();
        
        // Send all data sets to the view
        return view('front.about', compact('about', 'testimonial_all', 'photos'));
    }
}