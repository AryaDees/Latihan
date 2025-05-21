<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         Mahasiswa::create([
            'npm' => '50421220',
            'nama_lengkap' => 'Arya Dwi Santoso',
            'kelas' => '4IA17',
            'no_hp' => '081295575718',
            'password' => Hash::make('admin'),
        ]);
    }
}
