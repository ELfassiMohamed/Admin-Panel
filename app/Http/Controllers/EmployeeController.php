<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function index() {
        return Inertia::render('Employee/login');  
    }

    public function signIn(Request $request){
        
          //$credentials = $request->only('email', 'birth_date');
        // if (Auth::attempt($credentials)) {
        //     return Redirect::route('employee.show'); 
        // }
        // return response()->json(['message' => 'Invalid credentials'], 401);
        if(Auth::guard('webemployee')->attempt($request->only('email', 'password')))
        {
                 return Redirect::route('employee.show'); 
             }
             return response()->json(['message' => 'Ther is a problem'], 401);
        
    }

    public function show() {

         return Inertia::render('Employee/Employee_page'); 
    }
}
