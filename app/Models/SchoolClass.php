<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class SchoolClass extends Model
{

    use HasFactory, Sortable;

    public $timestamps = false;

    protected $fillable = [
        'habilitation',
        'period',
        'start_year',
        'module'
    ];

    public $sortable = [
        'habilitation'
    ];

    protected $table='school_classes';

    public function students() {
        return $this->hasMany(Student::class);
    }
}
