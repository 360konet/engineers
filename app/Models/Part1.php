<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part1 extends Model
{
    use HasFactory;

    protected $table = 'part1';

    protected $fillable = [
        'title',
        'publisher',
        'file'
    ];
}
