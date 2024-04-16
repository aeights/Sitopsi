<?php

use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Mahasiswa\AlternatifController as MahasiswaAlternatifController;
use App\Http\Controllers\Mahasiswa\KriteriaController as MahasiswaKriteriaController;
use App\Http\Controllers\Mahasiswa\PenilaianController;
use App\Http\Controllers\Mahasiswa\ProfileController as MahasiswaProfileController;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\User;
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
            $alternatif = Alternatif::count();
            $kriteria = Kriteria::count();
            $mahasiswa = User::where('role_id', 1)->count();
            return view('admin.index', [
                'alternatif' => $alternatif,
                'kriteria' => $kriteria,
                'mahasiswa' => $mahasiswa,
            ]);
        })->name('admin.dashboard');
        Route::prefix('/mahasiswa')->group(function(){
            Route::get('/', [MahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
            Route::get('/add', [MahasiswaController::class, 'add'])->name('admin.mahasiswa.add');
            Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
            Route::post('/store', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
            Route::post('/update', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
            Route::get('/{id}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
        });
        Route::prefix('/alternatif')->group(function(){
            Route::get('/', [AlternatifController::class, 'index'])->name('admin.alternatif.index');
            Route::get('/add', [AlternatifController::class, 'add'])->name('admin.alternatif.add');
            Route::get('/edit/{id}', [AlternatifController::class, 'edit'])->name('admin.alternatif.edit');
            Route::post('/store', [AlternatifController::class, 'store'])->name('admin.alternatif.store');
            Route::post('/update', [AlternatifController::class, 'update'])->name('admin.alternatif.update');
            Route::get('/{id}', [AlternatifController::class, 'destroy'])->name('admin.alternatif.destroy');
        });
        Route::prefix('/kriteria')->group(function(){
            Route::get('/', [KriteriaController::class, 'index'])->name('admin.kriteria.index');
            Route::get('/add', [KriteriaController::class, 'add'])->name('admin.kriteria.add');
            Route::get('/edit/{id}', [KriteriaController::class, 'edit'])->name('admin.kriteria.edit');
            Route::post('/store', [KriteriaController::class, 'store'])->name('admin.kriteria.store');
            Route::post('/update', [KriteriaController::class, 'update'])->name('admin.kriteria.update');
            Route::get('/{id}', [KriteriaController::class, 'destroy'])->name('admin.kriteria.destroy');
        });
        Route::prefix('/profile')->group(function(){
            Route::get('/', [ProfileController::class, 'index'])->name('admin.profile.index');
            Route::get('/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
            Route::post('/edit', [ProfileController::class, 'update'])->name('admin.profile.update');
            Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('admin.change.password');
            Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('admin.change.password');
        });
    });
});

Route::middleware(['auth','role:mahasiswa'])->group(function () {
    Route::prefix('/dashboard/mahasiswa')->group(function(){
        Route::get('/', function(){
            $alternatif = Alternatif::count();
            $kriteria = Kriteria::count();
            $mahasiswa = User::where('role_id', 1)->count();
            return view('mahasiswa.index', [
                'alternatif' => $alternatif,
                'kriteria' => $kriteria,
                'mahasiswa' => $mahasiswa,
            ]);
        })->name('mahasiswa.dashboard');

        Route::prefix('/profile')->group(function(){
            Route::get('/', [MahasiswaProfileController::class, 'index'])->name('mahasiswa.profile.index');
            Route::get('/edit', [MahasiswaProfileController::class, 'edit'])->name('mahasiswa.profile.edit');
            Route::post('/edit', [MahasiswaProfileController::class, 'update'])->name('mahasiswa.profile.update');
            Route::get('/change-password', [MahasiswaProfileController::class, 'changePassword'])->name('mahasiswa.change.password');
            Route::post('/change-password', [MahasiswaProfileController::class, 'updatePassword'])->name('mahasiswa.change.password');
        });

        Route::prefix('/alternatif')->group(function(){
            Route::get('/', [MahasiswaAlternatifController::class, 'index'])->name('mahasiswa.alternatif.index');
        });

        Route::prefix('/kriteria')->group(function(){
            Route::get('/', [MahasiswaKriteriaController::class, 'index'])->name('mahasiswa.kriteria.index');
        });

        Route::prefix('/penilaian')->group(function(){
            Route::get('/', [PenilaianController::class, 'index'])->name('mahasiswa.penilaian.index');
            Route::get('/history', [PenilaianController::class, 'history'])->name('mahasiswa.penilaian.history');
            Route::get('/history/{id}', [PenilaianController::class, 'detail_history'])->name('mahasiswa.penilaian.detail_history');
            Route::post('/', [PenilaianController::class, 'store'])->name('mahasiswa.penilaian.store');
        });
    });
});