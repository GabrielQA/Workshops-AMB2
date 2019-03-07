<?php

use Illuminate\Database\Seeder;
use Tasks\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            ['name' => 'Josue', 'email' => 'josue@gmail.com', 'password' => Hash::make('123456')]
        );

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
