<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRole;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | OPERATOR
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('Operator01#'),
            'role' => UserRole::OPERATOR,
        ]);

        /*
        |--------------------------------------------------------------------------
        | KETUA MAJELIS
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Husnul Maarif, S.H.I., M.H.',
            'email' => 'ketua@gmail.com',
            'password' => Hash::make('Ketua01#'),
            'role' => UserRole::KETUA_MAJELIS,
        ]);

        /*
        |--------------------------------------------------------------------------
        | HAKIM TUNGGAL
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Jasni Manoso, S.H.I.',
            'email' => 'hakim1@gmail.com',
            'password' => Hash::make('Hakim01#'),
            'role' => UserRole::HAKIM_TUNGGAL,
        ]);

        User::create([
            'name' => 'Muhammad Iklil Lahilote, S.H.',
            'email' => 'hakim2@gmail.com',
            'password' => Hash::make('Hakim02#'),
            'role' => UserRole::HAKIM_TUNGGAL,
        ]);

        /*
        |--------------------------------------------------------------------------
        | PANITERA
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Panitera',
            'email' => 'panitera@gmail.com',
            'password' => Hash::make('Panitera01#'),
            'role' => UserRole::PANITERA,
        ]);


    }
}