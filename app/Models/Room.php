<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookedRoom;
use Carbon\Carbon;

class Room extends Model
{
    use HasFactory;

    public function rRoomPhoto()
    {
        return $this->hasMany(RoomPhoto::class);
    }

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }

    public function bookings()
    {
        return $this->hasMany(BookedRoom::class, 'room_id');
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

    public function ratingCount()
    {
        return $this->reviews()->count();
    }

    public function isAvailable($checkIn, $checkOut)
    {
        return !BookedRoom::overlapping(
            $this->id,
            Carbon::parse($checkIn),
            Carbon::parse($checkOut)
        )->exists();
    }

    public function favorites()
    {
        return $this->hasMany(RoomFavorite::class);
    }

    public function likes()
    {
        return $this->hasMany(RoomFavorite::class)->where('type', 'like');
    }

    public function favoritesList()
    {
        return $this->hasMany(RoomFavorite::class)->where('type', 'favorite');
    }

    public function likeCount()
    {
        return $this->likes()->count();
    }

    public function favoriteCount()
    {
        return $this->favoritesList()->count();
    }
}
