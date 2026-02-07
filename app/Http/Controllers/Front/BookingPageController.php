<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class BookingPageController extends Controller
{
    public function index(Request $request)
    {
        // Get all available rooms for the booking page
        $room_all = Room::all();
        
        // Handle pre-selected room from rooms page
        $selected_room_id = $request->get('room');
        $selected_room = null;
        
        if ($selected_room_id) {
            $selected_room = Room::find($selected_room_id);
        }
        
        return view('front.booking', compact('room_all', 'selected_room'));
    }
}