<?php


namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StudentController extends Controller
{
    public function __construct() {}

    public function upload(Request $request) {
        // dd($request->file);

        
        $file = $request->file;

        // $this->getStudentSchoolClass($file);

        // Excel::toArray($file)

        $studentSchoolClass = $this->getsetStudentSchoolClass($file);

        // dd(Excel::toArray($file, ));

        $importer = new StudentsImport(0);

        Excel::import($importer, $file);

        // return back();
    }

    /** 
     * @param mixed $file
     * @return string $class
    */

    private function getsetStudentSchoolClass($file) {
        $spreadsheet = IOFactory::load($file);
        $dataString = $spreadsheet->getActiveSheet()->getCell('A2')->getValue();
        $dataString = str_replace("Componente Curricular: ", "", $dataString);
        $habilitation = extractFromString("Habilitação", $dataString);
    }

    /** 
     * @param string $key
     * @param string $subject
     * @return string $extractedValue
    */
    private function extractFromString($key, $string) {
        preg_match('/'.$key.': ([\w\s-]+)\s/', $string, $matches);
        dd($matches[1]);
    }
}
