<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StudentsImport implements ToModel, WithHeadingRow, WithValidation
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

    public function rules(): array {
        return [
            'nome' => ['required', 'string'],
            'rm' => ['required', 'string'],
            'grupo' => ['required', 'string', Rule::in('GRUPO A', 'GRUPO B')],
        ];
    }

    public function customValidationMessages() {
        return [
            'grupo.in' => 'O :attribute do aluno é inválido'
        ];
    }
}
