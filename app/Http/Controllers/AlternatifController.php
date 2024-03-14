<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index(){
        return view('dashboard.alternatif.index');
    }
    public function add(){
        return view('dashboard.alternatif.add');
    }
    public function edit(){
        return view('dashboard.alternatif.edit');
    }
}
