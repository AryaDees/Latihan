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
        User::create([
            'name' => "Arya Dwi Santoso",
            'npm' => '51421246',
            'image' => 'https://placehold.co/400',
            'role' => 'mahasiswa',
            'kelas' => '4IA17',
            'no_hp' => '08515151515',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => "Rakhadinar Jaladara",
            'npm' => '51421245',
            'image' => 'https://placehold.co/400',
            'role' => 'dosen',
            'kelas' => '4IA17',
            'no_hp' => '08515151511',
            'password' => Hash::make('admin'),
        ]);
    }
}
