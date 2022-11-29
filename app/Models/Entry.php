<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory, Sortable;

    public $timestamps = false;

    protected $fillable = [
        'student_rm',
        'entry_time',
        'estimated_entry_time',
        'reason'
    ];

    public $sortable = [
        'entry_time',
        'estimated_entry_time'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_rm');
    }

    protected function entryTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date_format(date_create($value), 'Y-m-d\TH:i:s'),
            set: fn ($value) => date_format(date_create($value), 'Y-m-d H:i:s'),
        );
    }

    protected function estimatedEntryTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date_format(date_create($value), 'Y-m-d\TH:i:s'),
            set: fn ($value) => date_format(date_create($value), 'Y-m-d H:i:s'),
        );
    }
}
