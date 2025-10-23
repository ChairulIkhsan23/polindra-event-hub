<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ormawa;

class OrmawaSeeder extends Seeder
{
    public function run(): void
    {
        $ormawas = [
            [
                'nama_ormawa' => 'BEM Polindra',
                'jenis' => 'Organisasi Mahasiswa',
                'kontak' => '081234567890',
                'deskripsi' => 'Badan Eksekutif Mahasiswa Politeknik Negeri Indramayu',
            ],
            [
                'nama_ormawa' => 'HIMA Teknik Informatika',
                'jenis' => 'Himpunan Mahasiswa',
                'kontak' => '081234567891',
                'deskripsi' => 'Himpunan Mahasiswa Jurusan Teknik Informatika',
            ],
            [
                'nama_ormawa' => 'HIMA Sistem Informasi Kota Cerdas',
                'jenis' => 'Himpunan Mahasiswa',
                'kontak' => '081234567892',
                'deskripsi' => 'Himpunan Mahasiswa Program Studi Sistem Informasi Kota Cerdas',
            ],
            [
                'nama_ormawa' => 'UKM Kotak Pena',
                'jenis' => 'Unit Kegiatan Mahasiswa',
                'kontak' => '081234567893',
                'deskripsi' => 'Unit Kegiatan Mahasiswa bidang Olahraga',
            ],
            [
                'nama_ormawa' => 'UKM Seni & Budaya',
                'jenis' => 'Unit Kegiatan Mahasiswa',
                'kontak' => '081234567894',
                'deskripsi' => 'Unit Kegiatan Mahasiswa bidang Seni dan Budaya',
            ],
        ];

        foreach ($ormawas as $ormawa) {
            Ormawa::create(array_merge($ormawa, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
