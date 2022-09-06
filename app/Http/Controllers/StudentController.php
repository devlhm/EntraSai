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
        dd($spreadsheet->getActiveSheet()->getCell('A2')->getValue());
    }
}
