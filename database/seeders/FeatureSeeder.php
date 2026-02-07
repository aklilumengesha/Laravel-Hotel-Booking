<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature; // Don't forget to import your Feature model

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create([
            'icon' => 'fas fa-wifi', // Font Awesome icon class (make sure Font Awesome is linked in your project)
            'heading' => 'Free Wi-Fi',
            'text' => 'Stay connected with our high-speed internet access available throughout the hotel.'
        ]);

        Feature::create([
            'icon' => 'fas fa-swimming-pool',
            'heading' => 'Swimming Pool',
            'text' => 'Enjoy a refreshing dip in our indoor and outdoor swimming pools.'
        ]);

        Feature::create([
            'icon' => 'fas fa-concierge-bell',
            'heading' => '24/7 Concierge',
            'text' => 'Our dedicated concierge team is available around the clock to assist you.'
        ]);

        Feature::create([
            'icon' => 'fas fa-dumbbell',
            'heading' => 'Fitness Center',
            'text' => 'Keep up with your fitness routine in our fully equipped gym.'
        ]);

        Feature::create([
            'icon' => 'fas fa-parking',
            'heading' => 'Free Parking',
            'text' => 'Convenient and secure parking available for all our guests.'
        ]);
        
        Feature::create([
            'icon' => 'fas fa-utensils',
            'heading' => 'Fine Dining',
            'text' => 'Indulge in exquisite culinary experiences at our on-site restaurants.'
        ]);
    }
}