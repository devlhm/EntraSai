<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Departure extends Model
{
    use HasFactory, Sortable;

    public $timestamps = false;

    protected $fillable = [
        'student_rm',
        'departure_time',
        'reason'
    ];

    public $sortable = [
        'departure_time'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_rm');
    }

    protected function departureTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date_format(date_create($value), 'Y-m-d\TH:i:s'),
            set: fn ($value) => date_format(date_create($value), 'Y-m-d H:i:s'),
        );
    }
}
