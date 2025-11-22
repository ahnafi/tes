<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles and assign existing permissions
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'student']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'email_verified_at' => Carbon::now(),
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@example.com',
            'password' => 'password',
            'email_verified_at' => Carbon::now(),
        ]);

        $admin->assignRole('teacher');

        $admin = User::create([
            'name' => 'Student',
            'email' => 'student@example.com',
            'password' => 'password',
            'email_verified_at' => Carbon::now(),
        ]);

        $admin->assignRole('student');

    }
}
