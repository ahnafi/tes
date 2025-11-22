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
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'email_verified_at' => Carbon::now(),
        ])->assignRole($admin);

        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@example.com',
            'password' => 'password',
            'email_verified_at' => Carbon::now(),
        ])->assignRole($teacher);

        User::create([
            'name' => 'Student',
            'email' => 'student@example.com',
            'password' => 'password',
            'email_verified_at' => Carbon::now(),
        ])->assignRole($student);

    }
}
