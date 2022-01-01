<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'username' => 'admin',
            'password' => \Hash::make('admin'),
            'role_id' => 1
        ]);

        User::create([
            'username' => 'agent',
            'password' => \Hash::make('agent'),
            'role_id' => 3
        ]);
    }
}
