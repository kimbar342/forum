<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'surname',
        'num_order',
        'date_order',
        'basis',
        'birthday',
        'position_in_office',
    ];
}
