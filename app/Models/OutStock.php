<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'shelf_id',
        'product_id',
        'user_id',
        'quantity',
        'assigned_to',
        'remarks',
    ];

    public function shelf()
    {
        return $this->belongsTo(Shelf::class, 'shelf_id');
    }

    public function product()
    {
        return $this->belongsTo(Stock::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

