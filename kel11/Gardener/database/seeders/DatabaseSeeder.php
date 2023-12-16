<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = array(
            [
                'nomor_ktp' => '1271187000120001',
                'nama_lengkap' => 'Admin Kelompok 11',
                'nomor_hp' => '082272944107',
                'username' => 'Admin',
                'email' => 'admin@tes.com',
                'password' => Hash::make('password'),
                'level' => "1",
            ],
            
        );
        foreach($data AS $d){
            User::create([
                'nomor_ktp' => $d['nomor_ktp'],
                'nama_lengkap' => $d['nama_lengkap'],
                'nomor_hp' => $d['nomor_hp'],
                'username' => $d['username'],
                'email' => $d['email'],
                'password' => $d['password'],
                'level' => $d['level']
            ]);
        }
    }
}