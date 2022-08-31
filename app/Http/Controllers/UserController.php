<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct() {

    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'id' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'id' => 'Credenciais incorretas',
            'password' => 'Credenciais incorretas',
        ]);
    }

    public function create(Request $request) {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required', 'min:8']
        ]);

        $user = new User();
        $user->username = $credentials['username'];
        $user->password = Hash::make($credentials['password']);
        $user->save();
        return "User created";
    }
}
