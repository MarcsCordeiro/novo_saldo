<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            
            'name'      => 'Maria Sooo',
            'email'     => 'maria@laravel.com',
            'password' => bcrypt('123456'),
        ]);
        
        User::create([
            
            'name'      => 'Outro',
            'email'     => 'outro@laravel.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
