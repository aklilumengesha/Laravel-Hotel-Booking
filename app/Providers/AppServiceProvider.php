<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema; // <-- Add this import
use App\Models\Page;
use App\Models\Room;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        try {
            if (Schema::hasTable('pages') && Schema::hasTable('rooms') && Schema::hasTable('settings')) {
                $page_data = Page::where('id',1)->first();
                $room_data = Room::get();
                $setting_data = Setting::where('id',1)->first();

                view()->share('global_page_data', $page_data);
                view()->share('global_room_data', $room_data);
                view()->share('global_setting_data', $setting_data);
            }
        } catch (\Exception $e) {
            // Database not available, skip view sharing
        }
    }
}
