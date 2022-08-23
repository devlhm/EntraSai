<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct() {

    }

    public function login(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        
        if(strcmp($username, "admin") == 0 && strcmp($password, env("DEFAULT_ADMIN_PASSWORD")) == 0) {
            return response()->json(["message" => "Login succeeded!"], 201);
        }
    }
}
