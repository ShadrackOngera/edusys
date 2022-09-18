<?php

use Illuminate\Support\Facades\Route;

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
//pages
Route::get('/dashboard', [App\Http\Controllers\PagesController::class, 'dashboardPage'])->name('dashboard');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');



//student routes
Route::get('/student', [App\Http\Controllers\StudentsController::class, 'homeStudent'])->name('home.student');
Route::get('/student/results', [App\Http\Controllers\StudentsController::class, 'resultsPage'])->name('student.results');
//Route::get('/student', [App\Http\Controllers\StudentController::class, 'registerPage'])->name('home.student');

//admin routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'homeAdmin'])->name('home.admin');
});

Route::group(['middleware' => ['role:staff|admin']], function () {
    Route::resource('units', \App\Http\Controllers\UnitController::class);
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'allUsers'])->name('users.all');
});

Route::group(['middleware' => ['role:student']], function () {

});
