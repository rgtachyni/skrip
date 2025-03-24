<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usr = [
            [
                'name' => 'User',
                'username' => 'user',
                // 'email' => 'user@gmail.com',
                'password' => bcrypt('123'),
                'role' => 1,
            ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                // 'email' => 'admin@gmail.com',
                'password' => bcrypt('123'),
                'role' => 2,
            ],
        ];

        foreach ($usr as $v) {
            User::create([
                'name' => $v['name'],
                'username' => $v['username'],
                // 'email' => $v['email'],
                'password' => $v['password'],
                'role_id' => $v['role'],
            ]);
        };
    }
}
