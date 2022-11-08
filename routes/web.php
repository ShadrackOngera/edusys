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
Route::get('/admin/chats', [App\Http\Controllers\AdminController::class, 'allChats'])->name('admin.chats');

Route::group(['middleware' => ['role:student']], function () {
    Route::get('/student', [App\Http\Controllers\StudentsController::class, 'homeStudent'])->name('home.student');
    Route::get('/results/export', [App\Http\Controllers\StudentsController::class, 'exportPdf'])->name('export.results');
    Route::get('/student/results', [App\Http\Controllers\StudentsController::class, 'resultsPage'])->name('student.results');
    Route::get('/student/register', [App\Http\Controllers\RegUnitsController::class, 'index'])->name('regUnits.index');
});

Route::group(['middleware' => ['role:staff']], function () {

});


//admin routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::post('/admin/chats-store', [App\Http\Controllers\ChatsController::class, 'adminStore'])->name('chats.adminStore');
});

Route::group(['middleware' => ['role:staff|admin']], function () {
    Route::post('/admin/makeAdmin', [App\Http\Controllers\AdminController::class, 'makeAdmin'])->name('make.admin');
    Route::post('/admin/makeStudent', [App\Http\Controllers\AdminController::class, 'makeStudent'])->name('make.student');
    Route::post('/admin/make-staff', [App\Http\Controllers\AdminController::class, 'makeStaff'])->name('make.staff');

    //units
    Route::get('/admin/units', [App\Http\Controllers\UnitController::class, 'index'])->name('units.index');
    Route::get('/admin/units/{id}/edit', [App\Http\Controllers\UnitController::class, 'edit'])->name('units.edit');
    Route::get('/admin/units/create', [App\Http\Controllers\UnitController::class, 'create'])->name('units.create');
    Route::put('/admin/units/{id}/edit', [App\Http\Controllers\UnitController::class, 'update'])->name('units.update');
    Route::post('/admin/units/store', [App\Http\Controllers\UnitController::class, 'store'])->name('units.store');
    Route::delete('/admin/units/{id}/delete', [App\Http\Controllers\UnitController::class, 'destroy'])->name('units.destroy');
//    Route::resource('units', \App\Http\Controllers\UnitController::class);


    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'allUsers'])->name('users.all');
    Route::get('/admin/registered', [App\Http\Controllers\AdminController::class, 'allRegisterdUnits'])->name('regUNits.all');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'homeAdmin'])->name('home.admin');
});

//other routes
Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->name('home');
Route::get('/how-to', [App\Http\Controllers\PagesController::class, 'howPage'])->name('how');


Route::resource('chats', \App\Http\Controllers\ChatsController::class);


Route::post('/register-units/store', [App\Http\Controllers\RegUnitsController::class, 'store'])->name('regUnits.store');
Route::put('/register-units/{id}/update', [App\Http\Controllers\RegUnitsController::class, 'update'])->name('regUnits.update');
Route::delete('/register-units/{id}/deregister', [App\Http\Controllers\RegUnitsController::class, 'destroy'])->name('regUnits.destroy');
//Route::resource('regUnits', \App\Http\Controllers\RegUnitsController::class);
