<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'email' => 'toto@mail.com',
                'name' => 'Toto Admin',
                'password' => 'totototo',
                'role' => 'admin'
            ],
            [
                'email' => 'titi@mail.com',
                'name' => 'Titi Planets Manager ',
                'password' => 'titititi',
                'role' => 'planetsmanager'
            ],
            [
                'email' => 'tata@mail.com',
                'name' => 'Tata Crews Manager',
                'password' => 'tatatata',
                'role' => 'crewsmanager'
            ],
            [
                'email' => 'tutu@mail.com',
                'name' => 'Tutu Technologies Manager',
                'password' => 'tutututu',
                'role' => 'technologiesmanager'
            ]
        ];

        foreach ($users as $user) {
            $newUser = User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                    'email_verified_at' => now(),
                ]
            );

            $newUser->syncRoles([$user['role']]);
        }

        foreach ($users as $u) {
    
            //...
            
            Post::factory(6)->for($newUser)->create();   
        }

    }
}