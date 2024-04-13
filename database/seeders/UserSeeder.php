<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'                  => 'Super Admin',
            'email'                 => 'admin@admin.com',
            'email_verified_at'     => now(),
            'password'              => '$2y$10$8FOGhQHMpIPYzOPQW25LL.va6EURgIrDPI1BuUdDfXSIZ/sZ2CO3.',  // 12345678
            'role'                  => 'admin',
            'remember_token'        => Str::random(10),
        ]);
    }
}
