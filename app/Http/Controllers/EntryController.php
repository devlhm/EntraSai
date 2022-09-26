<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Student;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter = request()->query('filter');
        $entries = null;

        if (!empty($filter)) {
            $entries = Entry::whereHas('student', function ($q) use ($filter) {
                $q->where('name', 'like', '%' . $filter . '%');
            })->paginate(10);
        } else {
            $entries = Entry::sortable()->paginate(10);
        }

        return view('entries.index', compact('entries'))->with('filter', $filter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entries.create');
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
            'entry_time' => ['required', 'after_or_equal:today'],
            'reason' => 'required'
        ]);

        if (!Student::find($request->student_rm)) {
            return back()->withErrors([
                "student_rm" => "RM inválido!"
            ]);
        }

        Entry::create($request->all());

        return redirect()->route('entries.index')->with('success', 'Entrada registrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = Entry::find($id);
        return view('entry.edit', compact('entry'));
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
            'entry_time' => ['required', 'after_or_equal:today'],
            'reason' => 'required'
        ]);

        if (!Student::find($request->student_rm)) {
            return back()->withErrors([
                "student_rm" => "RM inválido!"
            ]);
        }

        $entry = Entry::find($id);
        $entry->fill($request->all())->save();

        return redirect()->route('entries.index')->with('success', 'Entrada atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entry::destroy($id);
        return back()->with('success', 'Entrada removida com sucesso!');
    }
}
