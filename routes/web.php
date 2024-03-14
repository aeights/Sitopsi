<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

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


Route::prefix('/dashboard')->group(function(){
    Route::get('/', function(){
        return view('dashboard.index');
    })->name('dashboard');
    Route::prefix('/mahasiswa')->group(function(){
        Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        Route::get('/add', [MahasiswaController::class, 'add'])->name('mahasiswa.add');
        Route::get('/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    });
    Route::prefix('/alternatif')->group(function(){
        Route::get('/', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::get('/add', [AlternatifController::class, 'add'])->name('alternatif.add');
        Route::get('/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
    });
    Route::prefix('/kriteria')->group(function(){
        Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
        Route::get('/add', [KriteriaController::class, 'add'])->name('kriteria.add');
        Route::get('/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    });
    Route::prefix('/profile')->group(function(){
        Route::get('/', [MahasiswaController::class, 'index'])->name('profile.index');
    });
});
