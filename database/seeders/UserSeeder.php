<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $kelasB = Kelas::where('nama_kelas', 'B')->first();
        $kelasA = Kelas::where('nama_kelas', 'A')->first();

        $dosen = UserModel::firstOrCreate([
    'email' => 'dosen@gmail.com'
], [
    'name' => 'DosenIlkomp',
    'password' => Hash::make('password')
]);

$dosen->assignRole('dosen');


$mahasiswa = UserModel::firstOrCreate([
    'email' => 'mahasiswa@gmail.com'
], [
    'name' => 'MahasiswaIlkomp',
    'password' => Hash::make('password')
]);

$mahasiswa->assignRole('mahasiswa');
    }
}