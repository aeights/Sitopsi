<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 10; $i++) { 
            Mahasiswa::create([
                'nama' => 'Shinta Nuria',
                'nim' => '2020358680'.$i,
                'prodi' => 'Informatika',
                'fakultas' => 'Fakultas Teknik',
            ]);
        }
    }
}
