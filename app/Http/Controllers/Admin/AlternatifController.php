<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        return view('admin.alternatif.index');
    }
    public function add()
    {
        return view('admin.alternatif.add');
    }
    public function edit()
    {
        return view('admin.alternatif.edit');
    }
}
