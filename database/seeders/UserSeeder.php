<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil role IDs
        $adminRole = Role::where('nama', 'Administrator')->first();
        $staffRole = Role::where('nama', 'Staff')->first();
        $dosenRole = Role::where('nama', 'Dosen')->first();
        $mahasiswaRole = Role::where('nama', 'Mahasiswa')->first();

        // User Administrator
        User::create([
            'nama' => 'Admin Polindra',
            'email' => 'admin@polindra.ac.id',
            'password' => Hash::make('admin123'),
            'role_id' => $adminRole->id,
            'email_verified_at' => now(),
        ]);

        // User Staff
        User::create([
            'nama' => 'Budi Santoso',
            'email' => 'staff@polindra.ac.id',
            'nidn' => '0412345678',
            'password' => Hash::make('staff123'),
            'role_id' => $staffRole->id,
            'ormawa_id' => 1, // BEM Polindra
            'email_verified_at' => now(),
        ]);

        User::create([
            'nama' => 'Siti Nurhaliza',
            'email' => 'staff2@polindra.ac.id',
            'nidn' => '0412345679',
            'password' => Hash::make('staff123'),
            'role_id' => $staffRole->id,
            'ormawa_id' => 2, // HIMA TI
            'email_verified_at' => now(),
        ]);

        // User Dosen
        User::create([
            'nama' => 'Dr. Ahmad Fauzi, M.Kom',
            'email' => 'dosen@polindra.ac.id',
            'nidn' => '0401018901',
            'password' => Hash::make('dosen123'),
            'role_id' => $dosenRole->id,
            'email_verified_at' => now(),
        ]);

        User::create([
            'nama' => 'Ir. Dewi Lestari, M.T',
            'email' => 'dosen2@polindra.ac.id',
            'nidn' => '0402019002',
            'password' => Hash::make('dosen123'),
            'role_id' => $dosenRole->id,
            'email_verified_at' => now(),
        ]);

        // User Mahasiswa
        User::create([
            'nama' => 'Charul Ikhsan',
            'email' => 'charul@student.polindra.ac.id',
            'nim' => '2307062',
            'password' => Hash::make('mahasiswa123'),
            'role_id' => $mahasiswaRole->id,
            'email_verified_at' => now(),
        ]);

        User::create([
            'nama' => 'Dinda Ayu Rachmawati',
            'email' => 'dinda@student.polindra.ac.id',
            'nim' => '2307064',
            'password' => Hash::make('mahasiswa123'),
            'role_id' => $mahasiswaRole->id,
            'email_verified_at' => now(),
        ]);

        User::create([
            'nama' => 'Intan Nurul Aini',
            'email' => 'intan@student.polindra.ac.id',
            'nim' => '2307069',
            'password' => Hash::make('mahasiswa123'),
            'role_id' => $mahasiswaRole->id,
            'email_verified_at' => now(),
        ]);

        // Tambah beberapa mahasiswa lagi untuk testing
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'nama' => "Mahasiswa Test {$i}",
                'email' => "mahasiswa{$i}@student.polindra.ac.id",
                'nim' => '230700' . ($i + 70),
                'password' => Hash::make('mahasiswa123'),
                'role_id' => $mahasiswaRole->id,
                'email_verified_at' => now(),
            ]);
        }
    }
}