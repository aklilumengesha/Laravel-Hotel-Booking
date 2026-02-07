<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\RoomFavorite;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class RoomFavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        try {
            // Check if table exists
            if (!Schema::hasTable('room_favorites')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please run migrations first: php artisan migrate'
                ], 500);
            }

            if (!Auth::guard('customer')->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to continue',
                    'redirect' => route('customer_login')
                ], 401);
            }

            $request->validate([
                'room_id' => 'required|exists:rooms,id',
                'type' => 'required|in:like,favorite'
            ]);

            $customerId = Auth::guard('customer')->id();
            $roomId = $request->room_id;
            $type = $request->type;

            $existing = RoomFavorite::where('customer_id', $customerId)
                ->where('room_id', $roomId)
                ->where('type', $type)
                ->first();

            if ($existing) {
                $existing->delete();
                $isActive = false;
                $message = $type === 'like' ? 'Room unliked' : 'Removed from favorites';
            } else {
                RoomFavorite::create([
                    'customer_id' => $customerId,
                    'room_id' => $roomId,
                    'type' => $type
                ]);
                $isActive = true;
                $message = $type === 'like' ? 'Room liked!' : 'Added to favorites!';
            }

            $counts = $this->getRoomCounts($roomId);

            return response()->json([
                'success' => true,
                'is_active' => $isActive,
                'message' => $message,
                'like_count' => $counts['likes'],
                'favorite_count' => $counts['favorites']
            ]);
        } catch (\Exception $e) {
            Log::error('Room favorite toggle error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function status(Request $request)
    {
        try {
            // Check if table exists
            if (!Schema::hasTable('room_favorites')) {
                $roomIds = $request->room_ids ?? [];
                $status = [];
                foreach ($roomIds as $roomId) {
                    $status[$roomId] = [
                        'liked' => false,
                        'favorited' => false,
                        'like_count' => 0,
                        'favorite_count' => 0
                    ];
                }
                return response()->json(['success' => true, 'status' => $status]);
            }

            $roomIds = $request->room_ids ?? [];
            $status = [];

            if (Auth::guard('customer')->check()) {
                $customerId = Auth::guard('customer')->id();
                
                $favorites = RoomFavorite::where('customer_id', $customerId)
                    ->whereIn('room_id', $roomIds)
                    ->get()
                    ->groupBy('room_id');

                foreach ($roomIds as $roomId) {
                    $roomFavs = $favorites->get($roomId, collect());
                    $status[$roomId] = [
                        'liked' => $roomFavs->where('type', 'like')->isNotEmpty(),
                        'favorited' => $roomFavs->where('type', 'favorite')->isNotEmpty(),
                        'like_count' => RoomFavorite::where('room_id', $roomId)->where('type', 'like')->count(),
                        'favorite_count' => RoomFavorite::where('room_id', $roomId)->where('type', 'favorite')->count()
                    ];
                }
            } else {
                foreach ($roomIds as $roomId) {
                    $status[$roomId] = [
                        'liked' => false,
                        'favorited' => false,
                        'like_count' => RoomFavorite::where('room_id', $roomId)->where('type', 'like')->count(),
                        'favorite_count' => RoomFavorite::where('room_id', $roomId)->where('type', 'favorite')->count()
                    ];
                }
            }

            return response()->json(['success' => true, 'status' => $status]);
        } catch (\Exception $e) {
            Log::error('Room favorite status error: ' . $e->getMessage());
            $roomIds = $request->room_ids ?? [];
            $status = [];
            foreach ($roomIds as $roomId) {
                $status[$roomId] = [
                    'liked' => false,
                    'favorited' => false,
                    'like_count' => 0,
                    'favorite_count' => 0
                ];
            }
            return response()->json(['success' => true, 'status' => $status]);
        }
    }

    private function getRoomCounts($roomId)
    {
        try {
            return [
                'likes' => RoomFavorite::where('room_id', $roomId)->where('type', 'like')->count(),
                'favorites' => RoomFavorite::where('room_id', $roomId)->where('type', 'favorite')->count()
            ];
        } catch (\Exception $e) {
            return ['likes' => 0, 'favorites' => 0];
        }
    }
}
