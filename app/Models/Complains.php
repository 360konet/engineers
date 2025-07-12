<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complains extends Model
{
    use HasFactory;

    protected $table='complains';

    protected $fillable=[
        'user_id',
        'username',
        'email',
        'department',
        'ticketID',
        'category',
        'description',
        'status',
        'review',
        'technician'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
