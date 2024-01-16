<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/Sign-In',[EmployeeController::class ,'index'])->name('login-component'); 
Route::post('getConnection',[EmployeeController::class , 'signin'])->name('employee.signin');
Route::get('/Dashboard',[EmployeeController::class ,'show'])->name('dashboard-component'); 

require __DIR__.'/auth.php';
