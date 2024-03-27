<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['code' => 'A1',  'alternatif' => 'Algoritma Evolusioner'],
            ['code' => 'A2',  'alternatif' => 'Artificial Intelligence'],
            ['code' => 'A3',  'alternatif' => 'Attention Based RNN'],
            ['code' => 'A4',  'alternatif' => 'Augmented Reality'],
            ['code' => 'A5',  'alternatif' => 'Big Data'],
            ['code' => 'A6',  'alternatif' => 'Clustering'],
            ['code' => 'A7',  'alternatif' => 'Cognitive Artificial Intelligence'],
            ['code' => 'A8',  'alternatif' => 'Data Analysis'],
            ['code' => 'A9',  'alternatif' => 'Data Mining'],
            ['code' => 'A10', 'alternatif' => 'Data Warehouse'],
            ['code' => 'A11', 'alternatif' => 'Deep Learning'],
            ['code' => 'A12', 'alternatif' => 'Defence Technology'],
            ['code' => 'A13', 'alternatif' => 'Enterprise Resource Planning (ERP)'],
            ['code' => 'A14', 'alternatif' => 'Fake News Detection'],
            ['code' => 'A15', 'alternatif' => 'Game'],
            ['code' => 'A16', 'alternatif' => 'Geographic Information System (GIS)'],
            ['code' => 'A17', 'alternatif' => 'Human Computer Interaction (HCI)'],
            ['code' => 'A18', 'alternatif' => 'Information Fusion'],
            ['code' => 'A19', 'alternatif' => 'Information Retrieval'],
            ['code' => 'A20', 'alternatif' => 'Infrastructure Server dan Jaringan'],
            ['code' => 'A21', 'alternatif' => 'Internet of Things (IOT)'],
            ['code' => 'A22', 'alternatif' => 'Keamanan Informasi Jaringan'],
            ['code' => 'A23', 'alternatif' => 'Keamanan Jaringan'],
            ['code' => 'A24', 'alternatif' => 'Kecerdasan Komputasional'],
            ['code' => 'A25', 'alternatif' => 'Klasifikasi'],
            ['code' => 'A26', 'alternatif' => 'Komputasi Awan'],
            ['code' => 'A27', 'alternatif' => 'Komputasi Berbasis Jaringan'],
            ['code' => 'A28', 'alternatif' => 'Large Language Model (LLM)'],
            ['code' => 'A29', 'alternatif' => 'Learning Engineering'],
            ['code' => 'A30', 'alternatif' => 'Learning Engineering Technology (LET)'],
            ['code' => 'A31', 'alternatif' => 'Machine Learning'],
            ['code' => 'A32', 'alternatif' => 'Mobile Aplication'],
            ['code' => 'A33', 'alternatif' => 'Multimedia'],
            ['code' => 'A34', 'alternatif' => 'Natural Language Processing (NLP)'],
            ['code' => 'A35', 'alternatif' => 'Optical Character Recognition (OCR)'],
            ['code' => 'A36', 'alternatif' => 'Optimasi Basic Data'],
            ['code' => 'A37', 'alternatif' => 'Pattern Recognition'],
            ['code' => 'A38', 'alternatif' => 'Pengolahan Citra'],
            ['code' => 'A39', 'alternatif' => 'Quality Assurance'],
            ['code' => 'A40', 'alternatif' => 'Reinforcement Learning'],
            ['code' => 'A41', 'alternatif' => 'Semantic Analysis'],
            ['code' => 'A42', 'alternatif' => 'Sintactic Analysis'],
            ['code' => 'A43', 'alternatif' => 'Sistem Cerdas'],
            ['code' => 'A44', 'alternatif' => 'Sistem Informasi'],
            ['code' => 'A45', 'alternatif' => 'Sistem Pendukung Keputusan (SPK)'],
            ['code' => 'A46', 'alternatif' => 'Sistem Prediksi'],
            ['code' => 'A47', 'alternatif' => 'Sistem Rekomendasi'],
            ['code' => 'A48', 'alternatif' => 'Software Engineering'],
            ['code' => 'A49', 'alternatif' => 'Surveillance Information Systems'],
            ['code' => 'A50', 'alternatif' => 'Tata Kelola Teknologi Informasi'],
            ['code' => 'A51', 'alternatif' => 'Technology Enchanced Learning'],
            ['code' => 'A52', 'alternatif' => 'Teknologi Jaringan'],
            ['code' => 'A53', 'alternatif' => 'Teknologi Media'],
            ['code' => 'A54', 'alternatif' => 'Text Mining'],
            ['code' => 'A55', 'alternatif' => 'Text Processing'],
            ['code' => 'A56', 'alternatif' => 'Text Summarization'],
            ['code' => 'A57', 'alternatif' => 'Topic Modelling'],
            ['code' => 'A58', 'alternatif' => 'UI/UX'],
            ['code' => 'A59', 'alternatif' => 'UMKM'],
            ['code' => 'A60', 'alternatif' => 'Virtual Reality (VR)'],
            ['code' => 'A61', 'alternatif' => 'Visualisasi'],
            ['code' => 'A62', 'alternatif' => 'Visualisasi Data'],
            ['code' => 'A63', 'alternatif' => 'Wireless Technology'],
            ['code' => 'A64', 'alternatif' => 'Biometrics'],
        ];
        foreach ($data as $item) {
            Alternatif::create($item);
        }
    }
}
