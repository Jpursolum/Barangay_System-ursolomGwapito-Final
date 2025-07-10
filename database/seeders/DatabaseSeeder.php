<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles if they don't exist
        if (! Role::where('name', 'brgyUser')->exists()) {
            Role::create(['name' => 'brgyUser', 'guard_name' => 'web']);
        }

        if (! Role::where('name', 'brgySecretary')->exists()) {
            Role::create(['name' => 'brgySecretary', 'guard_name' => 'web']);
        }

        if (! Role::where('name', 'preregister')->exists()) {
            Role::create(['name' => 'preregister', 'guard_name' => 'web']);
        }

        // Create an admin user
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        // Assign the 'super_admin' role to the admin user
        $user->assignRole('super_admin');
    }
}
