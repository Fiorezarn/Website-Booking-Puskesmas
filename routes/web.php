<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntreanController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\RedirectIfNotAdmin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AntreanuserController;
use App\Http\Controllers\LaporanController;


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

// Route::get('/antrean', function () {
//     return view('antrean');
// })->name('antrean');

Route::get('/ambilantrean', function () {
    return view('ambilantrean');
})->name('ambilantrean');


Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/poliumum', [AdminController::class, 'poliumum']);
    Route::get('/poligigi', [AdminController::class, 'poligigi']);
    Route::get('/politht', [AdminController::class, 'politht']);
});

// Route::get('/antrean', [AntreanuserController::class, 'userantreanall'])->name('antreanuserall');
Route::get('/antrean', [AntreanuserController::class, 'userantrean'])->name('antreanuser');
Route::get('/ambilantrean', [AntreanuserController::class, 'showForm'])->name('ambilantrean.form');
Route::post('/ambilantrean', [AntreanuserController::class, 'store'])->name('ambilantrean.store');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/laporan', [LaporanController::class, 'generatePDF'])->name('laporan.pdf');
Route::get('/laporan-user', [LaporanController::class, 'laporan'])->name('showLaporan');


// // Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
// // >>>>>>> main
// Route::get('/poliumum', [AdminController::class, 'poliumum']);
// Route::get('/poligigi', [AdminController::class, 'poligigi']);
// Route::get('/politht', [AdminController::class, 'politht']);
///////////////////////////////////////// /////////////////////////////////////////////////

Route::post('/insert',[AntreanController::class,'insert']);
Route::patch('update/{id}', [AntreanController::class, 'update'])->name('update');

// Route::get('/laporan', 'LaporanController@generatePDF');

// Route::patch('/antrean/{antrean}', [AntreanController::class, 'update'])->name('antrean.update');
// Route::patch('update/{id}', 'AntreanController@update')->name('update');
// Route::resource('update', AntreanController::class)->only(["update"])->names('update');
// Route::resource('update/{id}', [AntreanController::class, 'update'])->name('update');





