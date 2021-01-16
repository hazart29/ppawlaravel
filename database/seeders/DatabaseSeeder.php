<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin12345'),
            'roles' => 'akademik',
            'remember_token' => Str::random(10),
        ]);
    }
}
