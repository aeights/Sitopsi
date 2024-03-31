<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'C1', 'name' => 'Nilai akademik', 'type' => 'Benefit', 'value' => 5, 'sub_categorie' => [
                    [
                        'name' => 'A (Sangat Baik)',
                        'value' => 4
                    ],
                    [
                        'name' => 'B+ (Lebih dari Baik)',
                        'value' => 3.5
                    ],
                    [
                        'name' => 'B (Baik)',
                        'value' => 3
                    ],
                    [
                        'name' => 'C+ (Lebih dari Cukup)',
                        'value' => 2.5
                    ],
                    [
                        'name' => 'C (Cukup)',
                        'value' => 2
                    ],
                    [
                        'name' => 'D (Kurang)',
                        'value' => 1
                    ],

                    [
                        'name' => 'E (Gagal)',
                        'value' => 0
                    ],
                ],
            ],
            [
                'code' => 'C2', 'name' => 'History project', 'type' => 'Benefit', 'value' => 3,  'sub_categorie' => [
                    [
                        'name' => '≥ 7',
                        'value' => 3
                    ],
                    [
                        'name' => '4 ≥  ≤ 6',
                        'value' => 2
                    ],
                    [
                        'name' => '1 ≥  ≤ 3',
                        'value' => 1
                    ],
                    [
                        'name' => 'Tidak ada',
                        'value' => 0
                    ],
                ],
            ],
            [
                'code' => 'C3', 'name' => 'Pelatihan', 'type' => 'Benefit', 'value' => 4,  'sub_categorie' => [
                    [
                        'name' => 'Pernah mengikuti',
                        'value' => 1
                    ],
                    [
                        'name' => 'Tidak pernah mengikuti',
                        'value' => 0
                    ],
                ],
            ],
            [
                'code' => 'C4', 'name' => 'Prestasi Non Akademik', 'type' => 'Benefit', 'value' => 3,  'sub_categorie' => [
                    [
                        'name' => 'Internasional',
                        'value' => 3
                    ],
                    [
                        'name' => 'Nasional',
                        'value' => 2
                    ],
                    [
                        'name' => 'Regional',
                        'value' => 1
                    ],
                    [
                        'name' => 'Tidak ada',
                        'value' => 0
                    ]
                ],
            ],
            ['code' => 'C5', 'name' => 'Minat', 'type' => 'Benefit', 'value' => 5,  'sub_categorie' => [
                [
                    'name' => 'Sangat Minat	',
                    'value' => 3
                ],
                [
                    'name' => 'Minat',
                    'value' => 2
                ],
                [
                    'name' => 'Kurang minat	',
                    'value' => 1
                ],
                [
                    'name' => 'Tidak minat',
                    'value' => 0
                ]
            ],],
            [
                'code' => 'C6', 'name' => 'Biaya Infrastruktur', 'type' => 'Cost', 'value' => 2,  'sub_categorie' => [
                    [
                        'name' => '> 2.000.000	',
                        'value' => 0
                    ],
                    [
                        'name' => '1.000.000 ≥  ≤ 2.000.000',
                        'value' => 2
                    ],
                    [
                        'name' => '< 1.000.000',
                        'value' => 3
                    ]
                ],
            ],
        ];

        try {
            DB::beginTransaction();
            // Looping data dan menyimpannya ke dalam database
            foreach ($data as $item) {
                $user = Kriteria::create([
                    'code' => $item['code'],
                    'name' => $item['name'],
                    'type' => $item['type'],
                    'value' => $item['value'],
                ]);

                foreach ($item['sub_categorie'] as $sub) {
                    SubKriteria::create([
                        'kriterias_id' => $user->id,
                        'keterangan' => $sub['name'],
                        'value' => $sub['value'],
                    ]);
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            echo $th;
            DB::rollBack();
        }
    }
}
