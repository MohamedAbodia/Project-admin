<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $permissions = ['create', 'read', 'update', 'delete'];

        foreach ($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);
            $adminRole->permissions()->attach($perm);
        }
    }
}
