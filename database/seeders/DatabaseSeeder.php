<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Call your new seeders
        $this->call(SlideSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(AdminUserSeeder::class); 
    }
}
