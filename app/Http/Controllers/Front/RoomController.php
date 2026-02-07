<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        // Livewire component handles all filtering/sorting
        // This just renders the page
        return view('front.room');
    }

    public function single_room($id)
    {
        $single_room_data = Room::with('rRoomPhoto', 'reviews.customer')->where('id',$id)->first();
        
        if (!$single_room_data) {
            abort(404);
        }
        
        return view('front.room_detail', compact('single_room_data'));
    }
}
