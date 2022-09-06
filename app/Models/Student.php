<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'rm',
        'name',
        'group'
    ];

    public $incrementing = false;
    protected $primaryKey = 'rm';
    protected $keyType = "integer";
}
