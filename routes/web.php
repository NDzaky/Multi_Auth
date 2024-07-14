<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});


Route::get('/redirect-dashboard', function() {
    $user = Auth::user(); //ambil info pengguna
    if ($user->role == 'admin' || $user->role == 'superadmin') {
        return redirect('admin/dashboard');
    } else {
        return redirect('/dashboard');
    }
})->name('dashboard.redirect');

Route::resource('/companies', \App\Http\Controllers\CompanyController::class);
Route::resource('/pegawai', \App\Http\Controllers\PegawaiController::class);
Route::resource('/user', UserController::class);
Route::resource('/devisi', DevisiController::class);

require __DIR__.'/auth.php';
