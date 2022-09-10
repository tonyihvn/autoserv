<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Auth::routes();
// ->middleware('role:editor,approver');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('/my_profile/{id}/', [App\Http\Controllers\HomeController::class, 'member'])->name('my_profile')->middleware('role:Front-Desk,Front-Desk,Admin,Finance,Care,Super');
Route::get('/delete-member/{id}', [App\Http\Controllers\HomeController::class, 'deleteMember'])->name('delete-member')->middleware('role:Admin,Super');
Route::post('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings')->middleware('role:Super,Admin');
Route::post('/searchjobs', [App\Http\Controllers\JobsController::class, 'jobSearch'])->name('searchjobs');
Route::post('/namecheck', [App\Http\Controllers\JobsController::class, 'nameCheck'])->name('namecheck');

Route::get('/new-payment/{invoiceno}', [App\Http\Controllers\PaymentsController::class, 'newPayment'])->name('new-payment')->middleware('role:Admin,Finance,Super');

Route::post('/makepayment', [App\Http\Controllers\PaymentsController::class, 'store'])->name('makepayment')->middleware('role:Admin,Finance,Super');

// TASKS / TO DOs
Route::post('/newtask', [App\Http\Controllers\TasksController::class, 'store'])->name('newtask');
// Route::post('/newFinance', [App\Http\Controllers\TasksController::class, 'newFinance'])->name('newFinance')->middleware('role:Front-Desk,Admin,Finance,Care,Super');
Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks');
Route::get('/completetask/{id}', [App\Http\Controllers\TasksController::class, 'completetask'])->name('completetask');
Route::get('/inprogresstask/{id}', [App\Http\Controllers\TasksController::class, 'inprogresstask'])->name('inprogresstask');
Route::get('/delete-task/{id}', [App\Http\Controllers\TasksController::class, 'destroy'])->name('destroy')->middleware('role:Super,Admin');

// COMMUNICATION
Route::get('/reminders', [App\Http\Controllers\HomeController::class, 'reminders'])->name('reminders')->middleware('role:Admin,Super,Front-Desk');
Route::get('/communications', [App\Http\Controllers\HomeController::class, 'communications'])->name('communications')->middleware('role:Admin,Super,Front-Desk');
Route::post('/sendsms', [App\Http\Controllers\HomeController::class, 'sendSMS'])->name('sendsms')->middleware('role:Admin,Super,Front-Desk');
Route::get('/sentmessages', [App\Http\Controllers\HomeController::class, 'sentSMS'])->name('sentmessages')->middleware('role:Admin,Super,Front-Desk');

// HELP AND SECURITY
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');
Route::get('/security', [App\Http\Controllers\HomeController::class, 'security'])->name('security');

// NEW KOJO LINKS
Route::get('/personnels', [App\Http\Controllers\PersonnelController::class, 'index'])->name('personnels')->middleware('role:Admin,Super');
Route::get('/users', [App\Http\Controllers\PersonnelController::class, 'Users'])->name('users')->middleware('role:Admin,Super');

Route::get('/edit-personnel/{id}', [App\Http\Controllers\PersonnelController::class, 'edit'])->name('edit-personnel')->middleware('role:Admin,Super');
Route::get('/add-personnel', [App\Http\Controllers\PersonnelController::class, 'create'])->name('add-personnel')->middleware('role:Admin,Super');

Route::post('/newpersonnel', [App\Http\Controllers\PersonnelController::class, 'store'])->name('newpersonnel')->middleware('role:Admin,Super');
Route::post('/psfuform', [App\Http\Controllers\HomeController::class, 'psfuForm'])->name('psfuform')->middleware('role:Admin,Super,Front-Desk');
Route::get('/psfu', [App\Http\Controllers\HomeController::class, 'psfu'])->name('psfu')->middleware('role:Admin,Super,Front-Desk');

// CONTACTS AND JOBS
Route::get('/customers', [App\Http\Controllers\ContactsController::class, 'index'])->name('customers')->middleware('role:Front-Desk,Admin,Finance,Super,Spare-Parts');
Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles')->middleware('role:Front-Desk,Admin,Finance,Super,Spare-Parts');
Route::get('/edit-customer/{customerid}', [App\Http\Controllers\ContactsController::class, 'edit'])->name('edit-customer')->middleware('role:Front-Desk,Admin,Super');
Route::get('/edit-vehicle/{id}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('edit-vehicle')->middleware('role:Front-Desk,Admin,Super');


Route::post('/editcustomer', [App\Http\Controllers\ContactsController::class, 'update'])->name('editcustomer')->middleware('role:Admin,Super,Front-Desk');
Route::post('/editvehicle', [App\Http\Controllers\VehicleController::class, 'update'])->name('editvehicle')->middleware('role:Admin,Super,Front-Desk');

// MERGE CONTACTS
Route::post('/mergecontacts', [App\Http\Controllers\ContactsController::class, 'mergeContacts'])->name('mergecontacts')->middleware('role:Admin,Super,Front-Desk');

Route::get('/jobs', [App\Http\Controllers\JobsController::class, 'index'])->name('jobs')->middleware('role:Front-Desk,Admin,Finance,Super,Spare-Parts');
Route::get('/completedjobs', [App\Http\Controllers\JobsController::class, 'completedJobs'])->name('completedjobs')->middleware('role:Front-Desk,Admin,Finance,Super,Spare-Parts');

Route::get('/customer-jobs/{customerid}', [App\Http\Controllers\JobsController::class, 'customerJobs'])->name('customer-jobs')->middleware('role:Front-Desk,Admin,Finance,Super,Spare-Parts');
Route::get('/vehicle-jobs/{vregno}', [App\Http\Controllers\JobsController::class, 'vehicleJobs'])->name('vehicle-jobs')->middleware('role:Front-Desk,Admin,Finance,Super,Spare-Parts');

Route::get('/customer-vehicles/{customerid}', [App\Http\Controllers\VehicleController::class, 'customerVehicles'])->name('customer-vehicles')->middleware('role:Front-Desk,Admin,Finance,Supe,Spare-Parts');

Route::get('/newjob', [App\Http\Controllers\JobsController::class, 'create'])->name('newjob')->middleware('role:Front-Desk,Admin,Super');
Route::get('/newcjob/{customerid}', [App\Http\Controllers\JobsController::class, 'newCustomerJob'])->name('newcjob')->middleware('role:Front-Desk,Admin,Super');
Route::get('/newvjob/{customerid}/{vreg}', [App\Http\Controllers\JobsController::class, 'newVehicleJob'])->name('newvjob')->middleware('role:Front-Desk,Admin,Super');
Route::get('/edit-job/{jobno}', [App\Http\Controllers\JobsController::class, 'editJob'])->name('edit-job')->middleware('role:Front-Desk,Admin,Super');
Route::post('/addnewcustomer', [App\Http\Controllers\JobsController::class, 'store'])->name('addnewcustomer')->middleware('role:Admin,Super,Front-Desk');
Route::post('/addjobno', [App\Http\Controllers\JobsController::class, 'addJobno'])->name('addjobno')->middleware('role:Admin,Super,Front-Desk');
Route::get('/invoice/{jobno}/{type}', [App\Http\Controllers\JobsController::class, 'printInvoice'])->name('invoice')->middleware('role:Front-Desk,Admin,Finance,Super,Spare-Parts');
Route::post('/filterjobs', [App\Http\Controllers\JobsController::class, 'filterJobs'])->name('filterjobs')->middleware('role:Admin,Super,Front-Desk,Spare-Parts');


Route::post('/changedate', [App\Http\Controllers\JobsController::class, 'changedate'])->name('changedate')->middleware('role:Admin,Super,Front-Desk');

// PAYMENTS
Route::get('/payments', [App\Http\Controllers\PaymentsController::class, 'index'])->name('payments')->middleware('role:Admin,Finance,Super');
Route::get('/expenditures', [App\Http\Controllers\ExpenditureController::class, 'index'])->name('expenditures')->middleware('role:Admin,Finance,Super');

Route::get('/delete/{id}/{table}', [App\Http\Controllers\JobsController::class, 'genericDelete'])->name('delete')->middleware('role:Admin,Super');