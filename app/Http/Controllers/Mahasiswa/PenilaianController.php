<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\KriPenilaian;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SubPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PenilaianController extends Controller
{
    public function index() : View {
        $kriterias = Kriteria::with('sub_kriteria')->get();
        $alternatifs = Alternatif::get();
        return view('mahasiswa.penilaian.index', [
            "kriterias" => $kriterias,
            'alternatifs' => $alternatifs,
        ]);
    }

    public function history(): View {
        $penilaian = Penilaian::where('user_id', Auth::user()->id)->get();
        return view('mahasiswa.penilaian.history', [
            'penilaian' => $penilaian,
        ]);
    }

    public function detail_history($id) {
        // $penilaian = Penilaian::find($id);
        // return view('mahasiswa.penilaian.history');
    }

    public function store(Request $request){
        if(!$request->data){
            return "gagal";
        }

        try {
            DB::beginTransaction();
            $penilaian = Penilaian::create([
                'user_id' => Auth::user()->id,
            ]);
            foreach($request->data as $data){
                $sub = SubPenilaian::create([
                    'penilaian_id' => $penilaian->id,
                    'alternatif' => $data["code"]
                ]);
                foreach($data["kriterias"] as $kri){
                    KriPenilaian::create([
                        'sub_penilaian_id' => $sub->id,
                        'bobot' => $kri
                    ]);
                }
            }
            DB::commit();
            return $penilaian->id;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
