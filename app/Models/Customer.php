<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'country',
        'address',
        'city',
        'state',
        'zip',
        'photo',
        'status',
        'token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function roomFavorites()
    {
        return $this->hasMany(RoomFavorite::class);
    }

    public function likedRooms()
    {
        return $this->hasMany(RoomFavorite::class)->where('type', 'like');
    }

    public function favoritedRooms()
    {
        return $this->hasMany(RoomFavorite::class)->where('type', 'favorite');
    }
}
