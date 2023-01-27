<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\TenantsController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\LeasesController;
use App\Http\Controllers\WordOrdersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\EmergencyContactsController;
use App\Http\Controllers\MemosController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'messages', 'as' => 'messages'], function () {
    Route::get('/', [MessagesController::class, 'index']);
    Route::get('create', [MessagesController::class, 'create'])->name('.create');
    Route::post('/', [MessagesController::class, 'store'])->name('.store');
    Route::get('{thread}', [MessagesController::class, 'show'])->name('.show');
    Route::put('{thread}', [MessagesController::class, 'update'])->name('.update');
    Route::delete('{thread}', [MessagesController::class, 'destroy'])->name('.destroy');
});

Route::middleware(['auth'])->group( function () {

    Route::resource('properties', PropertiesController::class);
    Route::resource('tenants', TenantsController::class);
    Route::resource('bills', BillsController::class);
    Route::resource('payments', PaymentsController::class);
    Route::resource('leases', LeasesController::class);
    Route::resource('wordorders', WordOrdersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('tasks', TasksController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('memos', MemosController::class);
    Route::resource('econtacts', EmergencyContactsController::class);

    Route::post('bills/{bill}/mark-paid', 'App\Http\Controllers\BillsController@MarkPaid')->name('bill.mark-paid');


    Route::get('/payreports', 'App\Http\Controllers\ReportsController@payreports')->name('reports.pay');
});

Route::middleware(['auth'])->group(function () {

    Route::get('users', 'App\Http\Controllers\UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'App\Http\Controllers\UsersController@MakeAdmin')->name('users.make-admin');
    Route::post('users/{user}/make-writer', 'App\Http\Controllers\UsersController@MakeWriter')->name('users.make-writer');
    Route::delete('users/{user}/delete', 'App\Http\Controllers\UsersController@destroy')->name('users.destroy');

    Route::get('users/notifications', 'App\Http\Controllers\UsersController@notifications')->name('users.notifications');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
