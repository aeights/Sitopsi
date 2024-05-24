<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 2,
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => '111111',
                'address' => 'Malang',
                'phone' => '085123456789'
            ],
            [
                'role_id' => 1,
                'name' => 'Mahasiswa',
                'email' => 'mahasiswa@mail.com',
                'password' => '111111',
                // 'phone' => '081123456789',
                'nim' => '1',
                'major' => 'Teknologi Informasi',
                'study_program' => 'Teknik Informatika',
                'class' => 'A',
                // 'gender' => 'Laki-laki'
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
