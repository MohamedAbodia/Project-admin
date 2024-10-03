<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignAdminRoleToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have a user with ID 1
        $user = User::find(1);

        if ($user) {
            // Create the admin role if it doesn't exist
            $adminRole = Role::firstOrCreate(['name' => 'admin']);

            // Assign the admin role to the user
            $user->roles()->syncWithoutDetaching([$adminRole->id]);
        }
    }
}
