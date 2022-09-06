<?php

namespace App\Imports;

use App\Models\SchoolClass;
use Maatwebsite\Excel\Concerns\ToModel;

class SchoolClassImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SchoolClass([
            'habilitation' => $row['habilitation'],
            'period' => $row['period'],
            'start_year' => $row['start_year'],
            'module' => $row['module']
        ]);
    }
}
