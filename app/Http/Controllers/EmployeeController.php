<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function index()
    {
        return Inertia::render('Employee/LoginPage');
    }

    public function signIn(Request $request)
    {

        $credentials = $request->only('email', 'password');
        // USER LogIn
        // if (Auth::attempt($credentials)) {
        //     return Redirect::route('employee.show'); 
        // }
        // return response()->json(['message' => 'Invalid credentials'], 401);

        // Employee LogIn
        if (Auth::guard('web')->attempt($credentials)) {
            return Redirect::route('employee.show');
        }
        return response()->json(['message' => 'Ther is a problem'], 401);
    }

    public function show()
    {
        return Inertia::render('Employee/EmployeePage');
    }
}
