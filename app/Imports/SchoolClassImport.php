<?php

namespace App\Imports;

use App\Models\SchoolClass;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

class SchoolClassImport implements OnEachRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function onRow(Row $row) {

    }

    // public function model(array $row)
    // {
    //     return new SchoolClass([
    //         'habilitation' => $row['habilitation'],
    //         'period' => $row['period'],
    //         'start_year' => $row['start_year'],
    //         'module' => $row['module']
    //     ]);
    // }
}
