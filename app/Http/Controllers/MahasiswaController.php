<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        return view('dashboard.mahasiswa.index');
    }
    public function add(){
        return view('dashboard.mahasiswa.add');
    }
    public function edit(){
        return view('dashboard.mahasiswa.edit');
    }
}
