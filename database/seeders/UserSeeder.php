<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            'password'              => Hash::make('testing123'),
            'role'                  => 'super_admin',
            'remember_token'        => Str::random(10),
        ]);
    }
}
