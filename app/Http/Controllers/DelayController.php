<?php

namespace App\Http\Controllers;

use App\Models\Delay;
use App\Models\Student;
use DateTime;
use Illuminate\Http\Request;

class DelayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter = request()->query('filter');
        $delays = '';

        if(!empty($filter)) {

            $delays = Delay::whereHas('student', function ($q) use ($filter) {
                $q->where('name', 'like', '%'.$filter.'%');
            })->get();

        } else {
            $delays = Delay::sortable()->paginate(5);
        }

        return view('delays.index', compact('delays'))->with('filter', $filter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('delays.create');
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
            'arrival_time' => ['required', 'before_or_equal:today'],
            'reason' => 'required'
        ]);

        if (!Student::find($request->student_rm)) {
            return back()->withErrors([
                "student_rm" => "RM inválido!"
            ]);
        }

        Delay::create($request->all());

        return redirect()->route('delays.index')->with('success', 'Atraso registrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delay = Delay::find($id);
        return view('delays.edit', compact('delay'));
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
            'arrival_time' => ['required', 'before_or_equal:today'],
            'reason' => 'required'
        ]);

        if (!Student::find($request->student_rm)) {
            return back()->withErrors([
                "student_rm" => "RM inválido!"
            ]);
        }

        $delay = Delay::find($id);
        $delay->fill($request->all())->save();

        return redirect()->route('delays.index')->with('success', 'Atraso atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Delay::destroy($id);
        return back()->with('success', 'Atraso removido com sucesso!');
    }
}
