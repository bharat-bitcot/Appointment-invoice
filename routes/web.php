<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\complaintController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/', function () {
    return view('home');
});

//login
Route::get('/login', function () {
    if(Auth::check()){
        return view('/home');
    }
    return view('login');
})->name('login');

//validate
Route::post('validate', [AuthController::class, 'validateLogin'])->name('login.validate');

//logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//register
Route::get('/register', function () {
    if(Auth::check()){
        return view('/home');
    }
    return view('register');
})->name('register');

//save user
Route::post('/register', [AuthController::class, 'create'])->name('save.register');


//check auth route
Route::group(['middleware' => 'auth'], function () {

    //dashbaord
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Register Complaint
    Route::get('register-complaint', function () {
        return view('complaints.complaintForm');
    })->name('add.complaint');

    //new Complaint Raise
    Route::post('register-complaint', [complaintController::class, 'create'])->name('save.complaint');

    //Show Single Complaint Detail
    Route::get('complaint/{id}', [complaintController::class, 'show'])->name('view.complaint');

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
});
