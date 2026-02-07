<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\RoomFavorite;
use Auth;
use Illuminate\Support\Facades\Schema;

class CustomerHomeController extends Controller
{
    public function index()
    {
        $customerId = Auth::guard('customer')->user()->id;
        
        $total_completed_orders = Order::where('status','Completed')->where('customer_id', $customerId)->count();
        $total_pending_orders = Order::where('status','Pending')->where('customer_id', $customerId)->count();
        
        // Get liked and favorited rooms - with error handling
        try {
            if (Schema::hasTable('room_favorites')) {
                $liked_rooms = RoomFavorite::with('room')
                    ->where('customer_id', $customerId)
                    ->where('type', 'like')
                    ->latest()
                    ->take(4)
                    ->get();
                    
                $favorited_rooms = RoomFavorite::with('room')
                    ->where('customer_id', $customerId)
                    ->where('type', 'favorite')
                    ->latest()
                    ->take(4)
                    ->get();
            } else {
                $liked_rooms = collect([]);
                $favorited_rooms = collect([]);
            }
        } catch (\Exception $e) {
            $liked_rooms = collect([]);
            $favorited_rooms = collect([]);
        }
        
        return view('customer.home', compact(
            'total_completed_orders',
            'total_pending_orders',
            'liked_rooms',
            'favorited_rooms'
        ));
    }

    public function likedRooms()
    {
        try {
            $customerId = Auth::guard('customer')->user()->id;
            
            if (Schema::hasTable('room_favorites')) {
                $liked_rooms = RoomFavorite::with('room')
                    ->where('customer_id', $customerId)
                    ->where('type', 'like')
                    ->latest()
                    ->paginate(12);
            } else {
                $liked_rooms = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 12);
            }
            
            return view('customer.liked_rooms', compact('liked_rooms'));
        } catch (\Exception $e) {
            $liked_rooms = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 12);
            return view('customer.liked_rooms', compact('liked_rooms'));
        }
    }

    public function savedRooms()
    {
        try {
            $customerId = Auth::guard('customer')->user()->id;
            
            if (Schema::hasTable('room_favorites')) {
                $saved_rooms = RoomFavorite::with('room')
                    ->where('customer_id', $customerId)
                    ->where('type', 'favorite')
                    ->latest()
                    ->paginate(12);
            } else {
                $saved_rooms = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 12);
            }
            
            return view('customer.saved_rooms', compact('saved_rooms'));
        } catch (\Exception $e) {
            $saved_rooms = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 12);
            return view('customer.saved_rooms', compact('saved_rooms'));
        }
    }
}
