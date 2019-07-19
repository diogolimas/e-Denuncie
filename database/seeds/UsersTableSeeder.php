<?php

use App\User;
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
        User::create([
            'name'      => 'Alan',
            'email'     => 'alanlua2020@hotmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        User::create([
            'name'      => 'Diogo',
            'email'     => 'diogo.libras43@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        User::create([
            'name'      => 'Ana Beatriz',
            'email'     => 'anaribeiro3105@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        User::create([
            'name'      => 'Daniel Victor',
            'email'     => 'daniel.victor9@hotmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        User::create([
            'name'      => 'Luciano Sizilio',
            'email'     => 'lucianorsizilio@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);

    }
}
