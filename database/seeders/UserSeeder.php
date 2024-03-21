<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create User
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Rektorat',
            'role' => 'rektorat',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Fakultas Teknologi Informasi',
            'role' => 'fakultas',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Fakultas Ekonomi Bisnis',
            'role' => 'fakultas',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Teknik Informatika',
            'role' => 'prodi',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Sistem Informasi',
            'role' => 'prodi',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Desain Komunikasi Visual',
            'role' => 'prodi',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Manajemen Informasika',
            'role' => 'prodi',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Komputerisasi Akuntansi',
            'role' => 'prodi',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Manajemen',
            'role' => 'prodi',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Akuntansi',
            'role' => 'prodi',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Manajemen Bisnis',
            'role' => 'prodi',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Dosen A',
            'role' => 'dosen',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Dosen B',
            'role' => 'dosen',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Dosen C',
            'role' => 'dosen',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Dosen D',
            'role' => 'dosen',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Mahasiswa A',
            'role' => 'mahasiswa',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Mahasiswa B',
            'role' => 'mahasiswa',
            'password' => bcrypt(12345),
        ]);

        User::create([
            'name' => 'Mahasiswa C',
            'role' => 'mahasiswa',
            'password' => bcrypt(12345),
        ]);
    }
}
