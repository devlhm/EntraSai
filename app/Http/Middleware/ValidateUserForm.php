<?php

namespace App\Http\Middleware;

use App\Models\SchoolClass;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidateUserForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $request->validate([
            "name" => ["required", "string"],
            "school_class_id" => ["required"],
            "group" => ["required", Rule::in('GRUPO A', 'GRUPO B')]
        ]);

        if (!SchoolClass::find($request->school_class_id)) {
            return back()->withErrors([
                "school_class_id" => "Turma não encontrada!"
            ]);
        };

        return $next($request);
    }
}
