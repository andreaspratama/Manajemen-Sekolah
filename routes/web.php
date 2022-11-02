<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PinjamController;
use App\Http\Controllers\dPinjamController;

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

Route::prefix('IoT')->middleware(['auth', 'check:ADMIN,USER'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('pinjam/{id}/set-status', [PinjamController::class, 'setStatus'])->name('pinjam.status');
    Route::get('pinjamPending', [PinjamController::class, 'listPending'])->name('listPending');
    Route::resource('pinjam', PinjamController::class);

    Route::resource('dpinjam', dPinjamController::class);
});

// Route::prefix('user')->middleware(['auth', 'check:USER'])->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('dpinjam', dPinjamController::class);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
