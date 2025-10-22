<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;
use App\Models\User;
use Carbon\Carbon;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil staff user (ID 2)
        $staffId = 2;

        $kegiatans = [
            [
                'judul' => 'Workshop Laravel & Livewire untuk Pemula',
                'kategori' => 'Workshop',
                'deskripsi' => 'Workshop pengenalan framework Laravel dan Livewire untuk mahasiswa tingkat awal. Peserta akan belajar membuat aplikasi web modern dengan fitur real-time.',
                'lokasi' => 'Lab Komputer Gedung A',
                'tanggal_mulai' => Carbon::now()->addDays(7)->setTime(9, 0),
                'tanggal_selesai' => Carbon::now()->addDays(7)->setTime(15, 0),
                'kapasitas' => 50,
                'status' => 'disetujui',
                'staff_id' => $staffId,
            ],
            [
                'judul' => 'Seminar Nasional Teknologi Informasi 2024',
                'kategori' => 'Seminar',
                'deskripsi' => 'Seminar nasional dengan tema "Artificial Intelligence dan Internet of Things dalam Era Revolusi Industri 4.0"',
                'lokasi' => 'Auditorium Polindra',
                'tanggal_mulai' => Carbon::now()->addDays(14)->setTime(8, 0),
                'tanggal_selesai' => Carbon::now()->addDays(14)->setTime(16, 0),
                'kapasitas' => 200,
                'status' => 'disetujui',
                'staff_id' => $staffId,
            ],
            [
                'judul' => 'Pelatihan Design Thinking untuk Inovasi Produk',
                'kategori' => 'Pelatihan',
                'deskripsi' => 'Pelatihan metode design thinking untuk mengembangkan ide inovatif dalam pembuatan produk digital',
                'lokasi' => 'Ruang Workshop Gedung B',
                'tanggal_mulai' => Carbon::now()->addDays(21)->setTime(13, 0),
                'tanggal_selesai' => Carbon::now()->addDays(21)->setTime(17, 0),
                'kapasitas' => 30,
                'status' => 'menunggu',
                'staff_id' => $staffId,
            ],
            [
                'judul' => 'Kompetisi Hackathon Polindra 2024',
                'kategori' => 'Kompetisi',
                'deskripsi' => 'Kompetisi pemrograman 24 jam untuk menciptakan solusi teknologi bagi permasalahan sosial',
                'lokasi' => 'Gedung Innovation Center',
                'tanggal_mulai' => Carbon::now()->addDays(30)->setTime(8, 0),
                'tanggal_selesai' => Carbon::now()->addDays(31)->setTime(8, 0),
                'kapasitas' => 100,
                'status' => 'draft',
                'staff_id' => $staffId,
            ],
            [
                'judul' => 'Webinar Karir: Tips Lolos Interview Tech Company',
                'kategori' => 'Webinar',
                'deskripsi' => 'Webinar sharing session dari alumni yang bekerja di perusahaan teknologi terkemuka',
                'lokasi' => 'Online via Zoom',
                'tanggal_mulai' => Carbon::now()->addDays(5)->setTime(19, 0),
                'tanggal_selesai' => Carbon::now()->addDays(5)->setTime(21, 0),
                'kapasitas' => 500,
                'status' => 'disetujui',
                'staff_id' => $staffId,
            ],
        ];

        foreach ($kegiatans as $kegiatan) {
            Kegiatan::create($kegiatan);
        }
    }
}