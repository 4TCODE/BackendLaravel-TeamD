<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=\App\Models\User::create([
            "name" =>"superadmin",
            "email"=> "super_admin@gmail.com",
            "password"=> bcrypt("123456"),
        ]);

        $user->addRole("super_admin");
    }
}
