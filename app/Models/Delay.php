<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_rm');
    }

    protected function arrivalTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date_format(date_create($value), 'd/m/Y H:i:s'),
        );
    }
}
