<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PenilaianController extends Controller
{
    public function index() : View {
        $kriterias = Kriteria::with('sub_kriteria')->get();
        $alternatifs = Alternatif::get();
        return view('mahasiswa.penilaian.index', [
            "kriterias" => $kriterias,
            'alternatifs' => $alternatifs,
        ]);
    }
}
