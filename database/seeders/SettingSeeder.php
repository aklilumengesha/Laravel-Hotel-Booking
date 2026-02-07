<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting; // Don't forget to import your model

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there's at least one setting entry
        // You'll need to know the actual column names from your 'settings' table
        Setting::updateOrCreate(
    ['id' => 1],
    [
        'logo' => '1.png',
        'favicon' => '2.png',
        'theme_color_1' => '#ff5a5f',
        'theme_color_2' => '#4caf50',
        'home_feature_status' => 'Show',
        'home_room_status' => 'Show',
        'home_testimonial_status' => 'Show',
        'home_latest_post_status' => 'Show',
        'home_room_total' => 4,
        'home_latest_post_total' => 3,
        'top_bar_phone' => '+251911000000',
        'top_bar_email' => 'aklilumengesha57@gmail.com',
        'footer_address' => 'Addis Ababa, Ethiopia',
        'footer_phone' => '+251911000000',
        'footer_email' => 'aklilumengesha57@gmail.com',
        'copyright' => '© 2026 Hotel Booking App. Developed by Aklilu Mengesha',
        'facebook' => 'https://facebook.com/hotel',
        'twitter' => 'https://twitter.com/hotel',
        'linkedin' => 'https://linkedin.com/hotel',
        'pinterest' => 'https://pinterest.com/hotel',
        'analytic_id' => 'UA-XXXXXXXXX-X',
    ]
);
    }
}