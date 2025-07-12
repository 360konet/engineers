<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table='projects';

    protected $fillable = [
        'project_name',
        'project_department',
        'project_head',
        'project_file',
    ];
}
