<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = DB::table('alternatifs')->select('id', 'code', 'alternatif')->get();
        return view('mahasiswa.alternatif.index', ['alternatif' => $alternatif]);
    }
}
