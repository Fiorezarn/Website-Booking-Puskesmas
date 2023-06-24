<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntreanController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\RedirectIfNotAdmin;

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
})->name('antrean');

Route::get('/ambilantrean', function () {
    return view('ambilantrean');
})->name('ambilantrean');


Auth::routes();
/////////////////////////////////////Admin/////////////////////////////////////////////////
// <<<<<<< beta
// Route::group(['middleware' => ['Auth', 'Admin']], function () {
// });

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/poliumum', [AdminController::class, 'poliumum']);
    Route::get('/poligigi', [AdminController::class, 'poligigi']);
    Route::get('/politht', [AdminController::class, 'politht']);
});


// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

// // Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
// // >>>>>>> main
// Route::get('/poliumum', [AdminController::class, 'poliumum']);
// Route::get('/poligigi', [AdminController::class, 'poligigi']);
// Route::get('/politht', [AdminController::class, 'politht']);
///////////////////////////////////////// /////////////////////////////////////////////////
Route::post('/insert',[AntreanController::class,'insert']);
// Route::post('update/{id}', [AntreanController::class, 'update'])->name('update');
Route::patch('update/{id}', 'AntreanController@update')->name('update');
// Route::resource('update/{id}', [AntreanController::class, 'update'])->name('update');





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


