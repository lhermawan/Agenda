<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        
        if(env('APP_ENV') != 'production')
        {
            $password = Hash::make('Rahasia11#');

            for ($i = 1; $i <= 10; $i++)
            {
                $users[] = [
                    'email' => 'admin'. $i .'@ciamiskab.go.id',
                    'password' => $password
                ];
            }

            User::insert($users);
        }
    }
}

