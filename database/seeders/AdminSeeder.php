<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => 1,
            'avatar' => 'https://i.postimg.cc/jd8LvNMv/Unknown2.jpg',
            'biography' => 'Greetings! I\'m Adil, a passionate individual exploring the wonders of technology...',
            'birthdate' => '1990-01-15',

        ]);

        DB::table('users')->insert([
            'name' => 'Lucas R',
            'email' => 'lucas@example.com',
            'is_admin' => 0,
            'password' => Hash::make('password'), 
            'avatar' => 'https://i.postimg.cc/tRPnzY6V/Unknown3.jpg', 
            'biography' => 'Dit is een normale gebruiker...',
            'birthdate' => '2002-01-01', 
        ]);
    }
}
