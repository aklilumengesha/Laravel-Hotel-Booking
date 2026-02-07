<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
    'room_id',
    'customer_id',
    'tx_ref',
    'status',
    'amount',
    'payment_method',
];

}
