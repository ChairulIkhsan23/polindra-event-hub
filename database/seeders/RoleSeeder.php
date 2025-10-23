<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Administrator', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Staff',         'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dosen',         'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mahasiswa',     'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
