<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "basicUser",
                "email" => "user@test.com",
                "password" => bcrypt("password"),
                "isAdmin" => false,
            ],
            [
                "name" => "adminUser",
                "email" => "admin@test.com",
                "password" => bcrypt("admin123"),
                "isAdmin" => true,
            ],
        ];

        foreach ($users as $user) {
            User::create(
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'isAdmin' => $user['isAdmin'],
                ]
            );
        }
    }
}
