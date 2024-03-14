<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(){
        return view('dashboard.kriteria.index');
    }
    public function add(){
        return view('dashboard.kriteria.add');
    }
    public function edit(){
        return view('dashboard.kriteria.edit');
    }
}
