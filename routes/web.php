<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntreanController;

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
    return view('home');
});

Route::get('/antrean', function () {
    return view('antrean');
});

Route::get('/ambilantrean', function () {
    return view('ambilantrean');
})->name('ambilantrean');


Auth::routes();
/////////////////////////////////////Admin/////////////////////////////////////////////////
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
Route::get('/poliumum', [AdminController::class, 'poliumum']);
Route::get('/poligigi', [AdminController::class, 'poligigi']);
Route::get('/politht', [AdminController::class, 'politht']);
///////////////////////////////////////// /////////////////////////////////////////////////
Route::post('/insert',[AntreanController::class,'insert']);
Route::post('update/{id}', [AntreanController::class, 'update'])->name('update');




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


