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
        $delays = Delay::orderBy('arrival_time', 'desc')->get();
        return view('delays.index', compact('delays'));
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
            'arrival_time' => 'required',
            'reason' => 'required'
        ]);

        if(!Student::find($request->student_rm)) {
            return back()->withErrors([
                "student_rm" => "RM inválido!"
            ]);
        }

        $arrivalTime = new DateTime($request->arrival_time);
        if(isDatetimeFuture($arrivalTime)) {
            return back()->withErrors([
                "arrival_time" => "Data inválida!"
            ]);
        }

        Delay::create($request->all());
        return redirect()->route('delays.index')->with('success', 'Atraso registrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
