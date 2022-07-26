<?php

namespace Database\Seeders;

use App\Models\Teams;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++){
            $new = new Teams();
            $new->nama = 'Team '.$i;
            $new->profile = 'https://randomuser.me/api/portraits/men/'.$i.'.jpg';
            $new->bio = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.';
            $new->save();
            // $newTeam = Teams::create([
            //     'nama' => 'isi nama',
            //     'profile' => 'isi profile',
            //     'bio' => 'isi bio',
            // ]);
        }
    }
}
