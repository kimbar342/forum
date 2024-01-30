<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_send_id',
        'user_abon_id',
        'comment',
        'time_send',
        'is_read',
    ];
}
