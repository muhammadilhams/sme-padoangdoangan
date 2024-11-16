<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'namaUmkm' => 'Admin',
            'namaPemilik' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'alamat' => 'Admin Address',
            'kontak' => '085158894227',
            'password' => bcrypt('password'), // Change 'password' to your desired password
            'role' => 'admin',
            'jenis_usaha' => 'kuliner', // You can set this as 'admin' or any other appropriate value
        ]);
    }
}
