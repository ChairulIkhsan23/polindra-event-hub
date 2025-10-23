<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil role berdasarkan nama (harus sudah dibuat di RoleSeeder)
        $adminRole = Role::where('name', 'admin')->first();
        $staffRole = Role::where('name', 'staff')->first();
        $dosenRole = Role::where('name', 'dosen')->first();
        $mahasiswaRole = Role::where('name', 'mahasiswa')->first();

        // --- ADMIN ---
        $admin = User::create([
            'nama' => 'Admin Polindra',
            'email' => 'admin@polindra.ac.id',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole($adminRole);

        // --- STAFF ---
        $staff1 = User::create([
            'nama' => 'Budi Santoso',
            'email' => 'staff@polindra.ac.id',
            'nidn' => '0412345678',
            'password' => Hash::make('staff123'),
            'ormawa_id' => 1,
            'email_verified_at' => now(),
        ]);
        $staff1->assignRole($staffRole);

        $staff2 = User::create([
            'nama' => 'Siti Nurhaliza',
            'email' => 'staff2@polindra.ac.id',
            'nidn' => '0412345679',
            'password' => Hash::make('staff123'),
            'ormawa_id' => 2,
            'email_verified_at' => now(),
        ]);
        $staff2->assignRole($staffRole);

        // --- DOSEN ---
        $dosen1 = User::create([
            'nama' => 'Dr. Ahmad Fauzi, M.Kom',
            'email' => 'dosen@polindra.ac.id',
            'nidn' => '0401018901',
            'password' => Hash::make('dosen123'),
            'email_verified_at' => now(),
        ]);
        $dosen1->assignRole($dosenRole);

        $dosen2 = User::create([
            'nama' => 'Ir. Dewi Lestari, M.T',
            'email' => 'dosen2@polindra.ac.id',
            'nidn' => '0402019002',
            'password' => Hash::make('dosen123'),
            'email_verified_at' => now(),
        ]);
        $dosen2->assignRole($dosenRole);

        // --- MAHASISWA ---
        $m1 = User::create([
            'nama' => 'Charul Ikhsan',
            'email' => 'charul@student.polindra.ac.id',
            'nim' => '2307062',
            'password' => Hash::make('mahasiswa123'),
            'email_verified_at' => now(),
        ]);
        $m1->assignRole($mahasiswaRole);

        $m2 = User::create([
            'nama' => 'Dinda Ayu Rachmawati',
            'email' => 'dinda@student.polindra.ac.id',
            'nim' => '2307064',
            'password' => Hash::make('mahasiswa123'),
            'email_verified_at' => now(),
        ]);
        $m2->assignRole($mahasiswaRole);

        $m3 = User::create([
            'nama' => 'Intan Nurul Aini',
            'email' => 'intan@student.polindra.ac.id',
            'nim' => '2307069',
            'password' => Hash::make('mahasiswa123'),
            'email_verified_at' => now(),
        ]);
        $m3->assignRole($mahasiswaRole);

        // Mahasiswa tambahan
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'nama' => "Mahasiswa Test {$i}",
                'email' => "mahasiswa{$i}@student.polindra.ac.id",
                'nim' => fake()->unique()->numerify('2307###'),
                'password' => Hash::make('mahasiswa123'),
                'email_verified_at' => now(),
            ])->assignRole($mahasiswaRole);
        }
    }
}
