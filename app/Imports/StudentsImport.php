<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {
        return new Student([
            'name' => $row['name'],
            'rm' => $row['rm'],
            'group' => $row['group'],
            'class_id' => $row['class_id']
        ]);
    }
}
