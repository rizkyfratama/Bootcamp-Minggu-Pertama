<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'room_name', 'user_name', 'purpose', 'start_time', 'end_time', 'status'
];
}


