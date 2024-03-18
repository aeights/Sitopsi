<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['code' => 'C1', 'name' => 'Nilai akademik', 'type' => 'Benefit', 'value' => 5],
            ['code' => 'C2', 'name' => 'History project', 'type' => 'Benefit', 'value' => 3],
            ['code' => 'C3', 'name' => 'Pelatihan', 'type' => 'Benefit', 'value' => 4],
            ['code' => 'C4', 'name' => 'Prestasi Non Akademik', 'type' => 'Benefit', 'value' => 3],
            ['code' => 'C5', 'name' => 'Minat', 'type' => 'Benefit', 'value' => 5],
            ['code' => 'C6', 'name' => 'Biaya Infrastruktur', 'type' => 'Cost', 'value' => 2],
        ];

        // Looping data dan menyimpannya ke dalam database
        foreach ($data as $item) {
            Kriteria::create([
                'code' => $item['code'],
                'name' => $item['name'],
                'type' => $item['type'],
                'value' => $item['value'],
            ]);
        }
    }
}
