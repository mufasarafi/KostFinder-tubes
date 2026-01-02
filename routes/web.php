<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

/* AUTH */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

/* ================= ADMIN ================= */
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [KostController::class, 'adminIndex']);

    Route::get('/admin/kost/tambah', [KostController::class, 'create']);
    Route::post('/admin/kost/simpan', [KostController::class, 'store']);

    Route::get('/admin/kost/edit/{id}', [KostController::class, 'edit']);
    Route::post('/admin/kost/update/{id}', [KostController::class, 'update']);

    Route::post('/admin/kost/hapus/{id}', [KostController::class, 'destroy']);
});

/* ================= USER ================= */
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [KostController::class, 'userIndex']);

    // DETAIL KOST
    Route::get('/kost/{id}', [KostController::class, 'detail']);
});

