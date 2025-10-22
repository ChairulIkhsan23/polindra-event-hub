<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'nama' => 'Administrator',
                'deskripsi' => 'Pengelola penuh sistem, dapat mengelola semua data dan pengguna',
            ],
            [
                'nama' => 'Staff',
                'deskripsi' => 'Staff kegiatan/panitia yang dapat membuat dan mengelola kegiatan',
            ],
            [
                'nama' => 'Dosen',
                'deskripsi' => 'Dosen penanggung jawab yang menyetujui kegiatan',
            ],
            [
                'nama' => 'Mahasiswa',
                'deskripsi' => 'Mahasiswa yang dapat mendaftar kegiatan',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
