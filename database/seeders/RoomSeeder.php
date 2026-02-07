<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room; // Don't forget to import your model

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Standard Room',
            'description' => 'A comfortable room with all basic amenities.',
            'price' => 100.00,
            'total_rooms' => 10,
            'amenities' => 'Wifi, TV, AC',
            'size' => '25 sq meters',
            'bed' => '1 King Bed',
            'bath' => '1 Bathroom',
            'featured_photo' => '3.jpg' // Place dummy images here too
        ]);

        Room::create([
            'name' => 'Deluxe Suite',
            'description' => 'Spacious suite with a view.',
            'price' => 250.00,
            'total_rooms' => 5,
            'amenities' => 'Wifi, TV, AC, Minibar, Balcony',
            'size' => '50 sq meters',
            'bed' => '2 Queen Beds',
            'bath' => '2 Bathrooms',
            'featured_photo' => '4.jpg'
        ]);
        // Add more rooms
    }
}