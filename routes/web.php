<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;

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

# ------ Unauthenticated routes ------ #
// Route::get('/', [AuthenticatedSessionController::class, 'create']);
// require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('provinsi');
});

Route::post('/daftar', [CatatanController::class, 'daftar'])->name('daftar');

Route::get('/provinsi', [CatatanController::class, 'provinsi']);
Route::get('/kota/{provinsiId}', [CatatanController::class, 'kota']);
Route::get('/kecamatan/{kotaId}', [CatatanController::class, 'kecamatan']);
Route::get('/kelurahan/{kecamatanId}', [CatatanController::class, 'kelurahan']);



# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'myProfile'])->name('profile');
        Route::put('/change-ava', [ProfileController::class, 'changeFotoProfile'])->name('change-ava');
        Route::put('/change-profile', [ProfileController::class, 'changeProfile'])->name('change-profile');
    }); # profile group

    Route::resource('users', UserController::class);
    Route::resource('pembayarans', PembayaranController::class);
    Route::resource('catatans', CatatanController::class);
});
