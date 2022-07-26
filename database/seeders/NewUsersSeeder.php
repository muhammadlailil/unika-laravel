<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make(123456);
        User::insert([[
            'name' => 'Admin',
            'role' => 'admin',
            'password' => $password,
            'email' => 'admin@gmail.com'
        ],[
            'name'=>'User',
            'role' => 'user',
            'password' => $password,
            'email' => 'user@gmail.com'
        ]]);
    }
}
