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
            'npm' => '51421246',
            'nama_lengkap' => 'Rakhadinar Jaladara',
            'kelas' => '4IA17',
            'no_hp' => '08515151515',
            'password' => Hash::make('admin'),
        ]);
    }
}
