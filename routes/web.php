<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('panggil_register');
    Route::post('/store', 'store')->name('panggil_store');
    Route::get('/login', 'login')->name('panggil_login');
    Route::post('/authenticate', 'authenticate')->name('panggil_authenticate');
    Route::get('/dashboard', 'dashboard')->name('panggil_dashboard');
    Route::post('/logout', 'logout')->name('panggil_logout');
});

Route::get('/users', [UserController::class, 'index'])->name('menampilkan_data');
Route::post('/users/delete/{id}', [UserController::class,'destroy'])->name('menghapus_data');
Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('mengedit_data');
Route::post('/users/update/{id}', [UserController::class, 'update'])->name('mengupdate_data');

Route::get('/send-mail', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');