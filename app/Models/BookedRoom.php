<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BookedRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'customer_id',
        'check_in_date',
        'check_out_date',
        'adults',
        'children',
        'total_guests',
        'price_per_night',
        'total_price',
        'payment_type',
        'paid_amount',
        'status',
        'order_no',
    ];

    protected $casts = [
        'check_in_date'  => 'date',
        'check_out_date' => 'date',
    ];

    /* =========================
        RELATIONSHIPS
    ========================= */

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /* =========================
        SCOPES
    ========================= */

    /**
     * Only bookings that block availability
     */
    public function scopeActive(Builder $query)
    {
        return $query->whereIn('status', ['pending', 'confirmed']);
    }

    /**
     * Check overlapping bookings
     */
    public function scopeOverlapping(
        Builder $query,
        $roomId,
        $checkIn,
        $checkOut
    ) {
        return $query
            ->where('room_id', $roomId)
            ->active()
            ->where(function ($q) use ($checkIn, $checkOut) {
                $q->whereBetween('check_in_date', [$checkIn, $checkOut])
                  ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                  ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                      $q2->where('check_in_date', '<=', $checkIn)
                         ->where('check_out_date', '>=', $checkOut);
                  });
            });
    }
}
