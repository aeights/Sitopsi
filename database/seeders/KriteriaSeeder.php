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
                        'value' => 7
                    ],
                    [
                        'name' => 'B+ (Lebih dari Baik)',
                        'value' => 6
                    ],
                    [
                        'name' => 'B (Baik)',
                        'value' => 5
                    ],
                    [
                        'name' => 'C+ (Lebih dari Cukup)',
                        'value' => 4
                    ],
                    [
                        'name' => 'C (Cukup)',
                        'value' => 3
                    ],
                    [
                        'name' => 'D (Kurang)',
                        'value' => 2
                    ],

                    [
                        'name' => 'E (Gagal)',
                        'value' => 1
                    ],
                ],
            ],
            [
                'code' => 'C2', 'name' => 'History project', 'type' => 'Benefit', 'value' => 3,  'sub_categorie' => [
                    [
                        'name' => '≥ 7',
                        'value' => 4
                    ],
                    [
                        'name' => '4 ≥  ≤ 6',
                        'value' => 3
                    ],
                    [
                        'name' => '1 ≥  ≤ 3',
                        'value' => 2
                    ],
                    [
                        'name' => 'Tidak ada',
                        'value' => 1
                    ],
                ],
            ],
            [
                'code' => 'C3', 'name' => 'Pelatihan', 'type' => 'Benefit', 'value' => 4,  'sub_categorie' => [
                    [
                        'name' => 'Pernah mengikuti',
                        'value' => 2
                    ],
                    [
                        'name' => 'Tidak pernah mengikuti',
                        'value' => 1
                    ],
                ],
            ],
            [
                'code' => 'C4', 'name' => 'Prestasi Non Akademik', 'type' => 'Benefit', 'value' => 3,  'sub_categorie' => [
                    [
                        'name' => 'Internasional',
                        'value' => 4
                    ],
                    [
                        'name' => 'Nasional',
                        'value' => 3
                    ],
                    [
                        'name' => 'Regional',
                        'value' => 2
                    ],
                    [
                        'name' => 'Tidak ada',
                        'value' => 1
                    ]
                ],
            ],
            ['code' => 'C5', 'name' => 'Minat', 'type' => 'Benefit', 'value' => 5,  'sub_categorie' => [
                [
                    'name' => 'Sangat Minat	',
                    'value' => 4
                ],
                [
                    'name' => 'Minat',
                    'value' => 3
                ],
                [
                    'name' => 'Kurang minat	',
                    'value' => 2
                ],
                [
                    'name' => 'Tidak minat',
                    'value' => 1
                ]
            ],],
            [
                'code' => 'C6', 'name' => 'Biaya Infrastruktur', 'type' => 'Cost', 'value' => 2,  'sub_categorie' => [
                    [
                        'name' => '> 2.000.000	',
                        'value' => 1
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
