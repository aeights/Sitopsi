<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('admin.mahasiswa.index');
    }

    public function add()
    {
        return view('admin.mahasiswa.add');
    }

    public function edit()
    {
        return view('admin.mahasiswa.edit');
    }
}
