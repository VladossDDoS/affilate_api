<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Create users',
            'slug' => 'create_users',
            'description' => 'Create new users'
        ]);
        Permission::create([
            'name' => 'Update users',
            'slug' => 'update_users',
            'description' => 'Update all users, change role and other information'
        ]);
        Permission::create([
            'name' => 'View roles',
            'slug' => 'role_viewany',
            'description' => 'View all roles list'
        ]);
    }
}
