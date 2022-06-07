<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'ai1',
                'email' => 'test@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'ai2',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'ai3',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
