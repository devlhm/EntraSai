<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    /**
     * @param int $class_Id
     *
     * @return void
     */
    public function __construct($class_id)
    {
        $this->class_id = $class_id;
    }

    public $class_id;

    public function model(array $row)
    {
        return Student::findOr($row['rm'], function () use ($row) {
            return new Student([
                'name' => $row['nome'],
                'rm' => $row['rm'],
                'group' => $row['grupo'],
                'school_class_id' => $this->class_id
            ]);
        });
    }

    public function headingRow(): int
    {
        return 4;
    }
}
