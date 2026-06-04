<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MahasiswaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $mahasiswa = [
            ['72220001', 'Andi Saputra'], ['72220002', 'Budi Hartono'],
            ['72220003', 'Citra Lestari'], ['72220004', 'Dewi Anggraini'],
            ['72220005', 'Eko Prasetyo'], ['72230006', 'Fajar Nugroho'],
            ['72230007', 'Gina Marlina'], ['72230008', 'Hendra Wijaya'],
            ['72230009', 'Intan Permata'],['72230010', 'Joko Susilo'],
            ['72240011', 'Kevin Gunawan'], ['72240012', 'Lidia Natalia'],
            ['72240013', 'Michael Jonathan'], ['72240014', 'Nadia Putri'],
            ['72240015', 'Oscar Pradana'], ['72240016', 'Putri Maharani'],
            ['72240017', 'Rizky Maulana'], ['72240018', 'Stefani Kusuma'],
            ['72240019', 'Thomas Wijaya'], ['72240020', 'Uli Natalia'],
            ['72250021', 'Vincent Halim'], ['72250022', 'Wahyu Saputro'],
            ['72250023', 'Xavier Jonathan'],['72250024', 'Yessica Angelina'],
            ['72250025', 'Zefanya Christian'],
        ];

        foreach ($mahasiswa as $mhs) {
            User::create([
                'nim' => $mhs[0],
                'name' => $mhs[1],
                'email' => $mhs[0] . '@sia.ac.id',
                // password = nim masing-masing
                'password' => Hash::make($mhs[0]),
                'role' => 'mahasiswa',
            ]);
        }
    }
}