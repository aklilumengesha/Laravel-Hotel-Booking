<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $customer_id = Auth::guard('customer')->id();
        $room_id = $request->room_id;

        $alreadyBooked = OrderDetail::where('room_id', $room_id)
            ->whereHas('order', function ($query) use ($customer_id) {
                $query->where('customer_id', $customer_id);
            })
            ->exists();

        if (!$alreadyBooked) {
            return back()->with('error', 'You can only review rooms you have booked.');
        }

        $alreadyReviewed = Review::where('room_id', $room_id)
            ->where('customer_id', $customer_id)
            ->exists();

        if ($alreadyReviewed) {
            return back()->with('error', 'You have already reviewed this room.');
        }

        Review::create([
            'customer_id' => $customer_id,
            'room_id' => $room_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Thank you for your review!');
    }
}
