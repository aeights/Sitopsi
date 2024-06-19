<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\KriPenilaian;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SubPenilaian;
use PDF;
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

    public function generate_pdf($id){
        $penilaian = SubPenilaian::with('KriPenilaian')->where('penilaian_id', $id)->get();
        $kriterias = Kriteria::select('value')->get();
        $bobot = [];
        // bobot
       foreach($kriterias as $kriteria){
            array_push($bobot, $kriteria->value);
        }

        $matrix = [];
        foreach($penilaian as $p){
            $temp = [];
            foreach($p->KriPenilaian as $kri){
                array_push($temp, $kri->bobot);
            }
            array_push($matrix, $temp);
        }
        
        $matrix_normalisasi = $this->normalisasi($matrix);
        $matrix_normalisasi_w = $this->normalisasi_w($matrix_normalisasi, $bobot);
        // matrix normalisasi dengan bobot

        $alternatif = count($matrix);
        $concordance_matrix = array();
        $discordance_matrix = array();

        for ($k=0; $k < $alternatif; $k++) { 
            $temp_conc = [];
            $temp_disc = [];
            for ($l=0; $l < $alternatif; $l++) { 
                if($k != $l){
                    $barisn = $matrix_normalisasi_w[$k];
                    $barism = $matrix_normalisasi_w[$l];
                    $conc = $this->concordance_sum($barisn, $barism, $matrix_normalisasi_w, $bobot);
                    $disc = $this->disconcordance_sum($barisn, $barism, $matrix_normalisasi_w);
                    array_push($temp_disc, $disc);
                    array_push($temp_conc, $conc);
                }else{
                    array_push($temp_conc, 0);
                    array_push($temp_disc, 0);
                }
            }
            array_push($concordance_matrix, $temp_conc);
            array_push($discordance_matrix, $temp_disc);
        }
        $threshold_con = $this->threshold($concordance_matrix, $alternatif);
        $threshold_dis = $this->threshold($discordance_matrix, $alternatif);
        $concordance_dominan = $this->dominan($concordance_matrix, $threshold_con);
        $discordance_dominan = $this->dominan($discordance_matrix, $threshold_dis);
        $agregasi = $this->agregasi($concordance_dominan, $discordance_dominan);

        $cekAgregasi = $this->cekAgregasi($agregasi);
        if ($cekAgregasi) {
            $alternatifElimination = $this->alternatifElimination($penilaian,$concordance_matrix,$discordance_matrix);
            $x = 0;
            foreach($penilaian as $p) { 
                array_unshift($agregasi[$x], $p->alternatif);
                array_unshift($concordance_dominan[$x], $p->alternatif);
                array_unshift($discordance_dominan[$x], $p->alternatif);
                array_unshift($matrix_normalisasi[$x], $p->alternatif);
                array_unshift($matrix_normalisasi_w[$x], $p->alternatif);
                array_unshift($matrix[$x], $p->alternatif);
                array_unshift($alternatifElimination[$x], $p->alternatif);
                $x++;
            }

            $ranking = $alternatifElimination;
            $this->eliminationRanking($ranking);

            $pdf = PDF::loadView('mahasiswa.penilaian.pdf', ['rangking' => $ranking]);
            return $pdf->stream('file.pdf');
        }

        $x = 0;
        foreach($penilaian as $p) { 
            array_unshift($agregasi[$x], $p->alternatif);
            array_unshift($concordance_dominan[$x], $p->alternatif);
            array_unshift($discordance_dominan[$x], $p->alternatif);
            array_unshift($matrix_normalisasi[$x], $p->alternatif);
            array_unshift($matrix_normalisasi_w[$x], $p->alternatif);
            array_unshift($matrix[$x], $p->alternatif);
            $x++;
        }
        $x = 0;
        $ranking = $this->rangking_agregasi($agregasi);

        $pdf = PDF::loadView('mahasiswa.penilaian.pdf', ['rangking' => $ranking]);
        return $pdf->stream('file.pdf');
    }

    public function detail_history($id) {
        $penilaian = SubPenilaian::with('KriPenilaian')->where('penilaian_id', $id)->get();
        $kriterias = Kriteria::select('value')->get();
        $bobot = [];
        // bobot
       foreach($kriterias as $kriteria){
            array_push($bobot, $kriteria->value);
        }

        $matrix = [];
        foreach($penilaian as $p){
            $temp = [];
            foreach($p->KriPenilaian as $kri){
                array_push($temp, $kri->bobot);
            }
            array_push($matrix, $temp);
        }
        
        $matrix_normalisasi = $this->normalisasi($matrix);
        $matrix_normalisasi_w = $this->normalisasi_w($matrix_normalisasi, $bobot);
        // matrix normalisasi dengan bobot

        $alternatif = count($matrix);
        $concordance_matrix = array();
        $discordance_matrix = array();

        for ($k=0; $k < $alternatif; $k++) { 
            $temp_conc = [];
            $temp_disc = [];
            for ($l=0; $l < $alternatif; $l++) { 
                if($k != $l){
                    $barisn = $matrix_normalisasi_w[$k];
                    $barism = $matrix_normalisasi_w[$l];
                    $conc = $this->concordance_sum($barisn, $barism, $matrix_normalisasi_w, $bobot);
                    $disc = $this->disconcordance_sum($barisn, $barism, $matrix_normalisasi_w);
                    array_push($temp_disc, $disc);
                    array_push($temp_conc, $conc);
                }else{
                    array_push($temp_conc, 0);
                    array_push($temp_disc, 0);
                }
            }
            array_push($concordance_matrix, $temp_conc);
            array_push($discordance_matrix, $temp_disc);
        }
        $threshold_con = $this->threshold($concordance_matrix, $alternatif);
        $threshold_dis = $this->threshold($discordance_matrix, $alternatif);
        $concordance_dominan = $this->dominan($concordance_matrix, $threshold_con);
        $discordance_dominan = $this->dominan($discordance_matrix, $threshold_dis);
        $agregasi = $this->agregasi($concordance_dominan, $discordance_dominan);
        // dd($matrix_normalisasi_w, $concordance_matrix, $threshold_con, $threshold_dis, $concordance_dominan, $discordance_matrix, $discordance_dominan, $agregasi);

        $cekAgregasi = $this->cekAgregasi($agregasi);
        if ($cekAgregasi) {
            $alternatifElimination = $this->alternatifElimination($penilaian,$concordance_matrix,$discordance_matrix);
            $x = 0;
            foreach($penilaian as $p) { 
                array_unshift($agregasi[$x], $p->alternatif);
                array_unshift($concordance_dominan[$x], $p->alternatif);
                array_unshift($discordance_dominan[$x], $p->alternatif);
                array_unshift($matrix_normalisasi[$x], $p->alternatif);
                array_unshift($matrix_normalisasi_w[$x], $p->alternatif);
                array_unshift($matrix[$x], $p->alternatif);
                array_unshift($alternatifElimination[$x], $p->alternatif);
                $x++;
            }

            $ranking = $alternatifElimination;
            $this->eliminationRanking($ranking);
            $penilaian= Penilaian::find($id);
            if(!$penilaian->alternatif){
                $penilaian->alternatif = $alternatifElimination[0][0];
                $penilaian->save();
            }

            return view('mahasiswa.penilaian.detail', [
                'matrix_normalisasi' => $matrix_normalisasi, 
                'matrix_normalisasi_w' => $matrix_normalisasi_w,
                'matrix' => $matrix,
                'concordance_matrix' => $concordance_dominan,
                'discordance_matrix' => $discordance_dominan,
                'agregasi' => $agregasi,
                'alternatif_elimination' => $alternatifElimination,
                'ranking' => $ranking,
                'id' => $id,
            ]);
        }

        $x = 0;
        foreach($penilaian as $p) { 
            array_unshift($agregasi[$x], $p->alternatif);
            array_unshift($concordance_dominan[$x], $p->alternatif);
            array_unshift($discordance_dominan[$x], $p->alternatif);
            array_unshift($matrix_normalisasi[$x], $p->alternatif);
            array_unshift($matrix_normalisasi_w[$x], $p->alternatif);
            array_unshift($matrix[$x], $p->alternatif);
            $x++;
        }
        $x = 0;
        $ranking = $this->rangking_agregasi($agregasi);

        $penilaian= Penilaian::find($id);
        if(!$penilaian->alternatif){
            $penilaian->alternatif = $ranking[0][0];
            $penilaian->save();
        }
        // dd($matrix_normalisasi,$matrix_normalisasi_w,$matrix,$concordance_dominan,$discordance_dominan,$agregasi,$ranking);
        return view('mahasiswa.penilaian.detail', [
            'matrix_normalisasi' => $matrix_normalisasi, 
            'matrix_normalisasi_w' => $matrix_normalisasi_w,
            'matrix' => $matrix,
            'concordance_matrix' => $concordance_dominan,
            'discordance_matrix' => $discordance_dominan,
            'agregasi' => $agregasi,
            'alternatif_elimination' => null,
            'ranking' => $ranking,
            'id' => $id,
        ]);
    }

    private function threshold($matrixs, $m){
        $threshold = 0;
        foreach ($matrixs as  $matrix) {
            foreach ($matrix as $value) {
                $threshold += $value;
            }
        }
        return $threshold / ($m * ($m-1));
    }

    private function normalisasi($matrix)
    {
        $jumlah_baris = count($matrix);
        $jumlah_kolom = count($matrix[0]);
        
        // matrix normalisasi
        $matrix_normalisasi = [];
        for ($i=0; $i < $jumlah_baris; $i++) {
            $temp_norm = [];
            for ($j=0; $j < $jumlah_kolom; $j++) {
                $b = 0;
                for ($x=0; $x < $jumlah_baris; $x++) { 
                    $b += $matrix[$x][$j]**2;
                }
                $rij = $matrix[$i][$j] / sqrt($b);
                $b = 0;
                array_push($temp_norm, $rij);
            }
            array_push($matrix_normalisasi, $temp_norm);
            $temp_norm = [];
        }
        return $matrix_normalisasi;
    }

    private function normalisasi_w($matrix, $bobot)
    {
        $jumlah_baris = count($matrix);
        $jumlah_kolom = count($matrix[0]);
        $matrix_normalisasi_w = [];
        for ($iw=0; $iw < $jumlah_baris; $iw++) { 
            $temp_norm_w = [];
            for ($jw=0; $jw < $jumlah_kolom; $jw++) { 
                $v = $matrix[$iw][$jw] * $bobot[$jw];
                array_push($temp_norm_w, $v);
            }
            array_push($matrix_normalisasi_w, $temp_norm_w);
        }
        return $matrix_normalisasi_w;
    }

    private function dominan($matrixs, $threshold){
        $concordance_dominan = [];
        foreach ($matrixs as  $matrix) {
            $temp = [];
            foreach ($matrix as $value) {
                if($value >= $threshold){
                    array_push($temp, 1);
                }else{
                    array_push($temp, 0);
                }
            }
            array_push($concordance_dominan, $temp);
        }
        return $concordance_dominan;
    }

    // masih belum digunakan
    private function concordance($k_alternatif, $l_alternatif, $matrix){
        $m = count($matrix[0]);
        $concordance = [];
        for ($bawah=0; $bawah < $m; $bawah++) { 
            if($k_alternatif[$bawah] >= $l_alternatif[$bawah]){
                array_push($concordance, $bawah);
            }
        }
        return $concordance;
    }

    private function sort($agregasi) {
        $temp = [];
        for ( $i=0 ; $i < count($agregasi) ; $i++) { 
            array_push($temp, array_sum(array_shift($agregasi[$i])));
        }
        return sort($temp);
    }

    private function rangking_agregasi($agregasi)
    {
        $sort = $agregasi;
        for ($i=0; $i < count($sort) - 1; $i++) { 
            for ($j=0; $j < count($sort) - $i - 1; $j++) { 
                $a = array_sum(array_slice($sort[$j], 1));
                $b = array_sum(array_slice($sort[$j + 1], 1));
                if ($a < $b) {
                    $temp = $sort[$j];
                    $sort[$j] = $sort[$j + 1];
                    $sort[$j + 1] = $temp;
                }
            }
        }
        return $sort;
    }

    private function concordance_sum($k_alternatif, $l_alternatif, $matrix, $bobot){
        $m = count($matrix[0]);
        $sum = 0;
        for ($bawah=0; $bawah < $m; $bawah++) { 
            if($k_alternatif[$bawah] >= $l_alternatif[$bawah]){
                // array_push($concordance, $bawah);
                $sum += $bobot[$bawah];
            }
        }
        return $sum;
    }

    private function disconcordance_sum($k_alternatif, $l_alternatif, $matrix){
        $m = count($matrix[0]);
        $disconcordance = [];
        $dx = [];
        $dy = [];
        $maxdx = 0;
        $maxdy = 0;
        for ($bawah=0; $bawah < $m; $bawah++) { 
            if($k_alternatif[$bawah] < $l_alternatif[$bawah]){
                array_push($disconcordance, $bawah);
            }
        }

        if(count($disconcordance) == 0){
            return 0;
        }

        // atas
        for ($i=0; $i < count($disconcordance); $i++) { 
            $dkl = abs($k_alternatif[$disconcordance[$i]] - $l_alternatif[$disconcordance[$i]]);
            array_push($dx, $dkl);
        }
        // bawah
        for ($bawah=0; $bawah < $m; $bawah++) { 
            $vj = abs($k_alternatif[$bawah] - $l_alternatif[$bawah]);
            array_push($dy, $vj);
        }
        $maxdx = max($dx);
        $maxdy = max($dy);

        return $maxdx / $maxdy;
    }

    private function agregasi($concordance, $discordance)
    {
        $baris = count($concordance);
        $kolom = count($concordance[0]);

        $agregasi = [];
        for ($i=0; $i < $baris; $i++) {
            $row_agregasi = []; 
            for ($j=0; $j < $kolom; $j++) { 
                array_push($row_agregasi, $concordance[$i][$j] * $discordance[$i][$j]);
            }
            array_push($agregasi, $row_agregasi);
        }
        return $agregasi;
    }

    public function cekAgregasi($agregasi)
    {
        foreach ($agregasi as $subArray) {
            foreach ($subArray as $value) {
                if ($value != 0) {
                    return false;
                }
            }
        }
        return true;
    }

    public function alternatifElimination($label,$con,$dis)
    {
        $result = [];

        for ($i = 0; $i < count($con); $i++) {
            $rowDifference = [];
            for ($j = 0; $j < count($con[$i]); $j++) {
                $rowDifference[] = $con[$i][$j] - $dis[$i][$j];
            }
            $result[] = [array_sum($rowDifference)];
        }

        return $result;
    }

    public function eliminationRanking(&$data)
    {
        usort($data, function($a, $b) {
            return $b[1] <=> $a[1];
        });
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
