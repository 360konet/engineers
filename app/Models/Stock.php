<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'user_id',
        'serial',
        'product',
        'qty',
        'details',
        'product_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Shelf::class, 'category'); // 'category' is the actual FK column in stocks table
    }


}


