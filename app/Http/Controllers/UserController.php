<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        // Vulnerable SQL Injection
        error_log("SELECT * FROM users WHERE username = '" . $request->username . "' AND password = '" . $request->password . "'");
        $user = DB::select("SELECT * FROM users WHERE username = '" . $request->username . "' AND password = '" . $request->password . "'");

        if ($user) {
            return "Welcome, " . $user[0]->username . "!";
        } else {
            return "Invalid credentials.";
        }
    }

    public function showProfile($id)
    {
        // Directly fetching without any authentication or authorization
        $user = User::find($id);

        if ($user) {
            return view('profile', ['user' => $user]);
        } else {
            return "User not found.";
        }
    }

    public function secretData($id) {
        $user = User::find($id);
        return view('secret', ['user' => $user]);
    }

}
