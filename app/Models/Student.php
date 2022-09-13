<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'rm',
        'name',
        'group',
        'school_class_id'
    ];

    public $incrementing = false;
    protected $primaryKey = 'rm';
    protected $keyType = "integer";
}
