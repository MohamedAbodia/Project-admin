<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name', 'admin')->first();
        $user = Role::where('name', 'user')->first();

        $permissions =Permission::all();

        foreach ($permissions as $permission) {
            $admin->permissions()->attach($permission);
        }

        $user->permissions()->attach(Permission::where('name', 'view_account')->first());
        $user->permissions()->attach(Permission::where('name', 'edit_account')->first());
    }
}
