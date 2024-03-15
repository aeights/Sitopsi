<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        return view('admin.kriteria.index');
    }
    public function add()
    {
        return view('admin.kriteria.add');
    }
    public function edit()
    {
        return view('admin.kriteria.edit');
    }
}
