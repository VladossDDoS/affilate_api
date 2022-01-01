<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Main user in the system that can do everything he wants'
        ]);

        Role::create([
            'name' => 'Support',
            'slug' => 'supp',
            'description' => 'Helping user that has a little bit less permissions than admin'
        ]);

        Role::create([
            'name' => 'Agent',
            'slug' => 'agent',
            'description' => 'Regular system worker with minimal permissions'
        ]);
    }
}
