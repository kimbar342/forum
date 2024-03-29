<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'topic_id',
        'comment',
        'published_at',
        'active'
    ];
}
