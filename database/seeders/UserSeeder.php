<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name'     => 'Admin',
            'email'    => 'adminpoltekbang@gamil.com',
            'password' => bcrypt('admin123'),
            'level'    => 'admin'
        ]);
    }
}
