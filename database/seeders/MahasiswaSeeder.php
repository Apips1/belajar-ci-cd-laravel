<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::firstOrCreate([
            'nim' => '2021102001',
            'nama' => 'Ahmad',
            'email' => 'ahmad@example.com',
            'jurusan' => 'Teknik Informatika',
            'gender' => 1]);
        Mahasiswa::firstOrCreate([
            'nim' => '2021102002',
            'nama' => 'Budi',
            'email' => 'budi@example.com',
            'jurusan' => 'Teknik Informatika',
            'gender' => 1]);
        Mahasiswa::firstOrCreate([
            'nim' => '2021102003',
            'nama' => 'Cinta',
            'email' => 'cinta@example.com',
            'jurusan' => 'Teknik Informatika',
            'gender' => 0]);
    }
}
