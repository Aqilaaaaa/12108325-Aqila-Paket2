<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' =>bcrypt('123a')
            ],

            [
                'nama' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'role' => 'kasir',
                'password' =>bcrypt('123k')
            ]

        ];

        foreach($userData as $key => $val){
            User::create($val);
        }

    }
}
