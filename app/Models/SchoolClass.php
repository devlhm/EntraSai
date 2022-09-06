<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{

    use HasFactory;

    protected $fillable = [
        'habilitation',
        'period',
        'start_year',
        'module'
    ];

    protected $table='classes';
}
