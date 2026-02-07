<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slide; // Don't forget to import your model

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slide::create([
            'photo' => '1.jpg', // You might need to place dummy images in public/uploads for this to work
            'heading' => 'Welcome to Our Hotel',
            'text' => 'Experience luxury and comfort like never before.',
            'button_text' => 'Explore Rooms',
            'button_url' => '/rooms' // Or whatever your rooms route is
        ]);

        Slide::create([
            'photo' => '2.jpg',
            'heading' => 'Book Your Stay Today',
            'text' => 'Great deals on amazing rooms.',
            'button_text' => 'Book Now',
            'button_url' => '/book'
        ]);
        // Add more slides if you want
    }
}
