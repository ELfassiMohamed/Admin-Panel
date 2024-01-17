<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Client;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.LoginComponent');
    }

    public function signin(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('employee')->attempt($credentials)) {
            return Redirect::route('dashboard-component');
        }
    
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function show(){
        $user = Auth::guard('employee')->user();
        return view('employee.DashboardComponent')->with('user', $user);
    }
}
