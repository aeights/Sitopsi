<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::with('sub_kriteria')->get();
        return view('mahasiswa.kriteria.index', ['kriterias' => $kriterias]);
    }
}
