<?php

namespace App\Http\Controllers;

use App\Models\Departure;
use App\Models\Student;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter = request()->query('filter');
        $departures = null;

        if (!empty($filter)) {

            $departures = Departure::whereHas('student', function ($q) use ($filter) {
                $q->where('name', 'like', '%' . $filter . '%');
            })->paginate(10);
        } else {
            $departures = Departure::sortable()->paginate(10);
        }   

        return view('departures.index', compact('departures'))->with('filter', $filter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_rm' => 'required',
            'departure_time' => ['required', 'after_or_equal:today'],
            'reason' => 'required'
        ]);

        if (!Student::find($request->student_rm)) {
            return back()->withErrors([
                'student_rm' => 'RM inválido!'
            ]);
        }

        Departure::create($request->all());

        return redirect()->route('departures.index')->with('success', 'Saída registrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departure = Departure::find($id);
        return view('departures.edit', compact('departure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_rm' => 'required',
            'departure_time' => ['required', 'after_or_equal:today'],
            'reason' => 'required'
        ]);

        if (!Student::find($request->student_rm)) {
            return back()->withErrors([
                "student_rm" => "RM inválido!"
            ]);
        }

        $delay = Departure::find($id);
        $delay->fill($request->all())->save();

        return redirect()->route('departures.index')->with('success', 'Saída atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departure::destroy($id);
        return back()->with('success', 'Saída removida com sucesso!');
    }
}
