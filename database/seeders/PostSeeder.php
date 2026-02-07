<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Optional: clear the posts table (for dev/testing only)
        // DB::table('posts')->truncate();

        Post::updateOrCreate(
            ['slug' => Str::slug('Top 5 Reasons to Visit Our Hotel This Summer')],
            [
                'photo' => '1.jpg',
                'heading' => 'Top 5 Reasons to Visit Our Hotel This Summer',
                'short_content' => 'Discover why our hotel is the perfect destination for your summer vacation. From luxurious rooms to exciting activities, we have it all.',
                'content' => '<p>Summertime is here, and there\'s no better place to unwind and create lasting memories than at our exquisite hotel. Here are the top five reasons why you should book your stay with us this season:</p><ul><li><strong>Stunning Pool Area:</strong> Our expansive pool area is the perfect oasis for relaxation and fun.</li><li><strong>Gourmet Dining:</strong> Indulge in culinary delights at our award-winning restaurants.</li><li><strong>Family-Friendly Activities:</strong> We offer a wide range of activities for guests of all ages.</li><li><strong>Prime Location:</strong> Explore nearby attractions with ease from our conveniently located hotel.</li><li><strong>Unmatched Service:</strong> Our dedicated team is committed to providing you with an unforgettable experience.</li></ul><p>Book your summer getaway today and discover the magic!</p>',
                'title' => 'Top Reasons to Visit - Hotel Blog',
                'meta_description' => 'Explore the top reasons to choose our hotel for your summer vacation, including luxurious amenities and excellent service.',
                'total_view' => 150
            ]
        );

        Post::updateOrCreate(
            ['slug' => Str::slug('A Guide to Exploring the Local Cuisine Around Our Hotel')],
            [
                'photo' => '2.jpg',
                'heading' => 'A Guide to Exploring the Local Cuisine Around Our Hotel',
                'short_content' => 'Indulge your taste buds and embark on a culinary journey. Our hotel is surrounded by some of the best local eateries.',
                'content' => '<p>Food lovers rejoice! Our hotel\'s prime location means you\'re just steps away from some of the most authentic and delicious local cuisine. Here\'s a guide to help you explore the vibrant food scene:</p><ul><li><strong>Street Food Delights:</strong> Don\'t miss the bustling night markets for quick and tasty bites.</li><li><strong>Fine Dining Restaurants:</strong> For a more upscale experience, try the Michelin-starred restaurants nearby.</li><li><strong>Local Cafes:</strong> Enjoy a cup of locally brewed coffee and pastries in charming cafes.</li><li><strong>Cooking Classes:</strong> Learn to prepare traditional dishes with expert local chefs.</li></ul><p>Ask our concierge for personalized recommendations and reservations!</p>',
                'title' => 'Local Cuisine Guide - Hotel Blog',
                'meta_description' => 'Discover the best local cuisine options near our hotel, from street food to fine dining, for an unforgettable culinary experience.',
                'total_view' => 120
            ]
        );

        Post::updateOrCreate(
            ['slug' => Str::slug('Sustainable Tourism How Our Hotel is Making a Difference')],
            [
                'photo' => '3.jpg',
                'heading' => 'Sustainable Tourism: How Our Hotel is Making a Difference',
                'short_content' => 'Learn about our commitment to environmental sustainability and how we are working to reduce our ecological footprint.',
                'content' => '<p>At our hotel, we believe in responsible tourism that protects our planet and supports local communities. Here are some of the initiatives we\'ve implemented:</p><ul><li><strong>Energy Efficiency:</strong> We use LED lighting and energy-efficient appliances throughout the property.</li><li><strong>Waste Reduction:</strong> Our comprehensive recycling program and efforts to minimize single-use plastics are making a positive impact.</li><li><strong>Water Conservation:</strong> We have installed low-flow fixtures and educate guests on water-saving practices.</li><li><strong>Local Sourcing:</strong> We prioritize sourcing fresh, local ingredients for our restaurants to support local farmers and reduce our carbon footprint.</li></ul><p>Join us in making a difference for a sustainable future!</p>',
                'title' => 'Sustainable Hotel Practices - Green Initiatives',
                'meta_description' => 'Discover our hotel\'s commitment to sustainable tourism, including energy efficiency, waste reduction, and local sourcing initiatives.',
                'total_view' => 90
            ]
        );
    }
}
