<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicians extends Model
{
    use HasFactory;

    protected $table='technicians';

    protected $fillable=[
        'techID',
        'name',
        'dept',
        'country_code',
        'techcontact',
        'status'
    ];
}
