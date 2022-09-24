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
Route::get('/dashboard', [App\Http\Controllers\ChatsController::class, 'index'])->name('dashboard');



//Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->name('home');



//student routes
Route::get('/student', [App\Http\Controllers\StudentsController::class, 'homeStudent'])->name('home.student');
Route::get('/student/results', [App\Http\Controllers\StudentsController::class, 'resultsPage'])->name('student.results');
Route::get('/student/register', [App\Http\Controllers\RegUnitsController::class, 'index'])->name('regUnits.index');

Route::resource('chats', \App\Http\Controllers\ChatsController::class);


Route::post('/register-units/store', [App\Http\Controllers\RegUnitsController::class, 'store'])->name('regUnits.post');
//Route::resource('regUnits', \App\Http\Controllers\RegUnitsController::class);


//admin routes
Route::group(['middleware' => ['role:admin']], function () {

});

Route::group(['middleware' => ['role:staff|admin']], function () {
    Route::resource('units', \App\Http\Controllers\UnitController::class);
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'allUsers'])->name('users.all');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'homeAdmin'])->name('home.admin');
});

Route::group(['middleware' => ['role:student']], function () {

});
