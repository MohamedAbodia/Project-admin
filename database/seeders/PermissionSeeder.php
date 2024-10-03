<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view_account']);
        Permission::create(['name' => 'edit_account']);
        Permission::create(['name' => 'manage_projects']);
        Permission::create(['name' => 'manage_blogs']);
        Permission::create(['name' => 'manage_services']);
        Permission::create(['name' => 'manage_partners']);
        Permission::create(['name' => 'manage_settings']);
        Permission::create(['name' => 'access_admin_dashboard']);
    }
}
