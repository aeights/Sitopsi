<?php

use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/redirect',function () {
    if (Auth::check()) {
        $userRole = Auth::user()->role['name'];
        if ($userRole == 'admin') {
            return to_route('admin.dashboard');
        }
        return to_route('mahasiswa.dashboard');
    }
})->name('redirect');


Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/','index')->name('login.index');
        Route::post('login','login')->name('login.process');
        Route::get('/logout', 'logout')->name('logout')->withoutMiddleware('guest');
    });
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::prefix('/dashboard/admin')->group(function(){
        Route::get('/', function(){
            return view('admin.index');
        })->name('admin.dashboard');
        Route::prefix('/mahasiswa')->group(function(){
            Route::get('/', [MahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
            Route::get('/add', [MahasiswaController::class, 'add'])->name('admin.mahasiswa.add');
            Route::get('/edit', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
        });
        Route::prefix('/alternatif')->group(function(){
            Route::get('/', [AlternatifController::class, 'index'])->name('admin.alternatif.index');
            Route::get('/add', [AlternatifController::class, 'add'])->name('admin.alternatif.add');
            Route::get('/edit', [AlternatifController::class, 'edit'])->name('admin.alternatif.edit');
        });
        Route::prefix('/kriteria')->group(function(){
            Route::get('/', [KriteriaController::class, 'index'])->name('admin.kriteria.index');
            Route::get('/add', [KriteriaController::class, 'add'])->name('admin.kriteria.add');
            Route::get('/edit', [KriteriaController::class, 'edit'])->name('admin.kriteria.edit');
        });
        Route::prefix('/profile')->group(function(){
            Route::get('/', [ProfileController::class, 'index'])->name('admin.profile.index');
        });
    });
});

Route::middleware(['auth','role:mahasiswa'])->group(function () {
    Route::prefix('/dashboard/mahasiswa')->group(function(){
        Route::get('/', function(){
            return view('mahasiswa.index');
        })->name('mahasiswa.dashboard');
        // Route::prefix('/mahasiswa')->group(function(){
        //     Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        //     Route::get('/add', [MahasiswaController::class, 'add'])->name('mahasiswa.add');
        //     Route::get('/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
        // });
        // Route::prefix('/alternatif')->group(function(){
        //     Route::get('/', [AlternatifController::class, 'index'])->name('alternatif.index');
        //     Route::get('/add', [AlternatifController::class, 'add'])->name('alternatif.add');
        //     Route::get('/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
        // });
        // Route::prefix('/kriteria')->group(function(){
        //     Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
        //     Route::get('/add', [KriteriaController::class, 'add'])->name('kriteria.add');
        //     Route::get('/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
        // });
        // Route::prefix('/profile')->group(function(){
        //     Route::get('/', [MahasiswaController::class, 'index'])->name('profile.index');
        // });
    });
});

// Route::prefix('/dashboard')->group(function(){
//     Route::get('/', function(){
//         return view('dashboard.index');
//     })->name('dashboard');
//     Route::prefix('/mahasiswa')->group(function(){
//         Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
//         Route::get('/add', [MahasiswaController::class, 'add'])->name('mahasiswa.add');
//         Route::get('/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
//     });
//     Route::prefix('/alternatif')->group(function(){
//         Route::get('/', [AlternatifController::class, 'index'])->name('alternatif.index');
//         Route::get('/add', [AlternatifController::class, 'add'])->name('alternatif.add');
//         Route::get('/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
//     });
//     Route::prefix('/kriteria')->group(function(){
//         Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
//         Route::get('/add', [KriteriaController::class, 'add'])->name('kriteria.add');
//         Route::get('/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
//     });
//     Route::prefix('/profile')->group(function(){
//         Route::get('/', [MahasiswaController::class, 'index'])->name('profile.index');
//     });
// });
