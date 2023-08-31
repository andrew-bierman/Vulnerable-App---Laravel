<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XSSController extends Controller
{
    public function index()
    {
        $storedData = session('data', ''); // retrieve from session for demonstration
        return view('xss', ['storedData' => $storedData]);
    }

    public function store(Request $request)
    {
        session(['data' => $request->input('data')]); // store in session for demonstration
        return redirect('/xss');
    }
}
