<?php

namespace Database\Seeders;

use App\Models\CmsUsers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewCmsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CmsUsers::insert([
            'name' => 'Muhammad Lailil Mahfud',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'foto' => 'https://randomuser.me/api/portraits/men/53.jpg',
        ]);
    }
}
