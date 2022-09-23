<?php


namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('validate.student')->only(['store', 'update']);
    }

    public function index()
    {
        $filter = request()->query('filter');
        $schoolClassFilter = request()->query('schoolClassFilter');

        if(empty($schoolClassFilter)) {
            $schoolClassFilter = SchoolClass::first()->id;
        }

        $students = Student::where('school_class_id', $schoolClassFilter);

        if (!empty($filter)) {
            $students = $students->where('name', 'like', '%' . $filter . '%');
        }

        $students = $students->sortable()->orderBy('name')->paginate(10);

        $schoolClasses = SchoolClass::all();
        return view('students.index', compact('students'), compact('schoolClasses'))
            ->with('filter', $filter)
            ->with('schoolClassFilter', $schoolClassFilter);
    }

    public function create()
    {
        $schoolClasses = SchoolClass::all();
        return view('students.create', compact('schoolClasses'));
    }

    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect(route('students.index'))->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function edit($student)
    {
        $student = Student::find($student);
        $schoolClasses = SchoolClass::all();

        return view('students.edit', compact('student'), compact('schoolClasses'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->fill($request->all())->save();

        return redirect()->route('students.index')->with('success', 'Aluno atualizado com sucesso');
    }

    public function destroy($student)
    {
        Student::destroy($student);
        return back()->with('success', 'Aluno removido com sucesso!');
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
