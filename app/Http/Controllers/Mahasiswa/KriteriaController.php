<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = DB::table('kriterias')->select('*')->get();
        return view('mahasiswa.kriteria.index', ['kriterias' => $kriterias]);
    }
}
