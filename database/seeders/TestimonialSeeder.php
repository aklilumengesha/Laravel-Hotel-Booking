<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial; // Don't forget to import your Testimonial model

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'photo' => '4.jpg', // Make sure this image exists in public/uploads/
            'name' => 'Alice Johnson',
            'designation' => 'Travel Blogger',
            'comment' => 'Had an absolutely wonderful stay! The staff was incredibly friendly and the rooms were luxurious. Highly recommend this hotel to anyone visiting the area.'
        ]);

        Testimonial::create([
            'photo' => '5.jpg', // Make sure this image exists in public/uploads/
            'name' => 'Bob Williams',
            'designation' => 'Business Traveler',
            'comment' => 'Excellent facilities for business meetings and a very comfortable environment. The Wi-Fi was fast and reliable, which is crucial for my work.'
        ]);

        Testimonial::create([
            'photo' => '6.jpg', // Make sure this image exists in public/uploads/
            'name' => 'Carol Davis',
            'designation' => 'Vacationer',
            'comment' => 'A perfect family getaway! The pool was a hit with the kids, and the dining options were superb. We will definitely be coming back next year.'
        ]);
        
        Testimonial::create([
            'photo' => '7.jpg', // Make sure this image exists in public/uploads/
            'name' => 'David Lee',
            'designation' => 'Explorer',
            'comment' => 'The location was perfect for exploring the city, and coming back to such a comfortable room was a treat. A truly memorable experience.'
        ]);
    }
}