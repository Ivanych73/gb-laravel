<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => "new",
    ];

    protected $fillable = [
        'full_name', 
        'text',
        'status',
        'email',
        'phone'
    ];
}
