<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name'=> 'admin',
                    'surname'=> '.',
                    'data_birth'=> '2025-04-16',
                    'password'=> Hash::make('password'),
                    'tel'=> '88005553535',
                    'email'=> 'admin@mail.com',
                    'role'=> 'admin',
                ],
            ]
        );
    }
}
