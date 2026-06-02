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

        // User::create([
        //     'name' => 'Panitera Muda Permohonan',
        //     'email' => 'panitera_muda@gmail.com',
        //     'password' => Hash::make('Paniteraper01#'),
        //     'role' => UserRole::PANITERA,
        // ]);

        // User::create([
        //     'name' => 'Panitera Muda Gugatan',
        //     'email' => 'panitera_mudagug@gmail.com',
        //     'password' => Hash::make('Paniteragugatan01#'),
        //     'role' => UserRole::PANITERA,
        // ]);

        // User::create([
        //     'name' => 'Panitera Muda Hukum',
        //     'email' => 'panitera_mudahukum@gmail.com',
        //     'password' => Hash::make('Paniterahukum01#'),
        //     'role' => UserRole::PANITERA,
        // ]);

        // User::create([
        //     'name' => 'Panitera Pengganti',
        //     'email' => 'panitera_pengganti@gmail.com',
        //     'password' => Hash::make('Paniterapengganti01#'),
        //     'role' => UserRole::PANITERA,
        // ]);
        // User::create([
        //     'name' => 'Panitera Pengganti 2',
        //     'email' => 'panitera_pengganti2@gmail.com',
        //     'password' => Hash::make('Paniterapengganti02#'),
        //     'role' => UserRole::PANITERA,
        // ]);
        // User::create([
        //     'name' => 'Panitera Pengganti 3',
        //     'email' => 'panitera_pengganti3@gmail.com',
        //     'password' => Hash::make('Paniterapengganti03#'),
        //     'role' => UserRole::PANITERA,
        // ]);


    }
}