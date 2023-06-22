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
Route::group(['middleware' => ['Auth', 'Admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
});
// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });
Route::get('/poliumum', function () {
    return view('admin.poliumum');
});
Route::get('/poligigi', function () {
    return view('admin.poligigi');
});
Route::get('/politht', function () {
    return view('admin.politht');
});
///////////////////////////////////////// /////////////////////////////////////////////////

Route::post('/insert',[AntreanController::class,'insert']);



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


