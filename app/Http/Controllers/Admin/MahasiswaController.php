<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $students = DB::table('mahasiswas')->select('id', 'nama', 'nim', 'prodi', 'fakultas')->get(); 
        return view('admin.mahasiswa.index', ['students' => $students]);
    }

    public function add()
    {
        return view('admin.mahasiswa.add');
    }

    public function edit($id)
    {
        try{
            $student = Mahasiswa::findOrFail($id);
            return view('admin.mahasiswa.edit',['student' => $student]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Opps, Something was wrong!');
        }
    
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'nim' => 'required',
                'prodi' => 'required',
                'fakultas' => 'required',
            ]);
    
            Mahasiswa::create($request->all());
    
            return back()->with('success', 'Berhasil ditambah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Opps, Something was wrong!');
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'nim' => 'required',
                'prodi' => 'required',
                'fakultas' => 'required',
            ]);
    
            Mahasiswa::where('id',$request->id,)->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'prodi' => $request->prodi,
                'fakultas' => $request->fakultas,
            ]);
    
            return back()->with('success', 'Berhasil dirubah');
        } catch (\Throwable $th) {
            dd($th);
            // return back()->with('error', 'Opps, Something was wrong!');
        }
    }

    public function destroy($id){
        try{

            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->delete();
            return back()->with('success', 'Berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Opps, Something was wrong!');
        }
    }
}
