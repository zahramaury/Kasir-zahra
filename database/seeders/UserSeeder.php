<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'kasir',
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]
    );
    }
}
