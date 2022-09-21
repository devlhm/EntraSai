<?php


namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StudentController extends Controller
{
    public function __construct()
    {
    }

    public function upload(Request $request)
    {
        $file = $request->file;

        $studentSchoolClass = $this->firstOrCreateSchoolClass($file);

        $importer = new StudentsImport($studentSchoolClass->id);

        Excel::import($importer, $file);

        return back()->with(['success' => 'Alunos importados com sucesso!']);
    }

    private function firstOrCreateSchoolClass($file)
    {
        $spreadsheet = IOFactory::load($file);
        $dataString = $spreadsheet->getActiveSheet()->getCell('A2')->getValue();
        $dataString = str_replace("Componente Curricular: ", "", $dataString);
        $habilitation = $this->extractFromString("Habilitação", $dataString);
        $period = $this->extractFromString("Turma", $dataString);
        $startYear = $this->extractFromString("Ano", $dataString);
        $module = substr($this->extractFromString("Módulo\/Série", $dataString), 0, 1);

        return SchoolClass::firstOrCreate(
            [
                'habilitation' => $habilitation,
                'period' => $period,
                'start_year' => $startYear,
                'module' => $module
            ]
        );
    }

    /** 
     * @param string $key
     * @param string $subject
     * @return string $extractedValue
     */
    private function extractFromString($key, $string)
    {
        preg_match('/' . $key . ': ([\w\s-]+)\s/', $string, $matches);
        return $matches[1];
    }
}
