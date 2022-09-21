<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'habilitation',
        'period',
        'start_year',
        'module'
    ];

    protected $table='school_classes';

    public function students() {
        return $this->hasMany(Student::class);
    }
}
