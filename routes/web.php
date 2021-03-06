<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\complaintController;
use App\Http\Controllers\ManageServiceEngineerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PDFController;


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
})->name('home');

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

    /**
     * Complaint Section
     */

    //Register Complaint
    Route::get('register-complaint', function () {
        return view('complaints.complaintForm');
    })->name('add.complaint');

    //new Complaint Raise
    Route::post('register-complaint', [complaintController::class, 'create'])->name('save.complaint');

    //Show Single Complaint Detail
    Route::get('complaint/{id}', [complaintController::class, 'show'])->name('view.complaint');

    //Complaints Assign to the Service Engineer
    Route::put('assign-complaint/{id}', [complaintController::class, 'assignServiceEngineer'])->name('assign.complaint');

    //Complaints Assign to the Service Engineer
    Route::get('inprogress-complaint/{id}', [complaintController::class, 'UpdateInprogressComplaintStatus'])->name('inprogress.complaint');



    /**
     * service Engineer
     */

    //Display all Lists of Service Engineer
    Route::get('list-service-engineer', [ManageServiceEngineerController::class, 'index'])->name('list.serviceEngineer');

    //Show Single  Service Engineer Detail
    Route::get('service-engineer/{id}', [ManageServiceEngineerController::class, 'show'])->name('view.serviceEngineer');

    //Register Service Engineer Form
    Route::view('register-service-engineer', 'engineer.engineerForm')->name('register.serviceEngineer');

    //new Register Service Engineer
    Route::post('register-service-engineer', [ManageServiceEngineerController::class, 'create'])->name('save.serviceEngineer');


    /**
     * Invoice
     *
     */

    //Create Invoice by Service Engineer
    Route::get('create-invoice/{id}', [InvoiceController::class, 'create'])->name('create.invoice');

    //save Invoice by Service Engineer
    Route::post('save-invoice/{id}', [InvoiceController::class, 'save'])->name('save.invoice');


    //Generate Invoice Pdf
    Route::get('generate-invoice/{id}', [PDFController::class, "generateInvoicePDF"])->name('generate.invoice');







    /**
     * Profile
     */
    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
});
