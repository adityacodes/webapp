<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ADITYA PADHI',
            'email' => 'adityapadhi1996@gmail.com',
            'password' => bcrypt('Aditya'),
            'confirmed' => 1
        ]);
    }
}
