<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delay extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'student_rm',
        'arrival_time',
        'reason'
    ];
}
