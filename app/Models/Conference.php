<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'title',
        'description',
        'conference_date',
        'address',
        'participants_count',
        'city',
    ];

    protected $casts = [
        'conference_date' => 'date',
    ];
}
