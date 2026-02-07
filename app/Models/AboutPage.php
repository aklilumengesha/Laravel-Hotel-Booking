<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
     protected $fillable = [
        'title', 'subtitle', 'description', 'button_text', 'button_link', 'counters', 'images'
    ];

    protected $casts = [
        'counters' => 'array',
        'images' => 'array',
    ];
}
