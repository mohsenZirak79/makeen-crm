<?php

namespace Database\Seeders\Role;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = Role::create(['name' => 'super_admin']);
        $admin = Role::create(['name' => 'admin']);
        $mentor = Role::create(['name' => 'mentor']);
        $student = Role::create(['name' => 'student']);

        $super_admin->givePermissionTo([
            'super_admin.search',
            'student.create',
            'student.show',
            'student.edit',
            'student.update',
            'student.delete',
            'admin.create',
            'admin.show',
            'admin.edit',
            'admin.update',
            'admin.delete',
            'admin.search',
            'mentor.create',
            'mentor.show',
            'mentor.edit',
            'mentor.update',
            'mentor.delete',
            'mentor.search',
        ]);
        $admin->givePermissionTo([
            'admin.search',
            'mentor.create',
            'mentor.show',
            'mentor.edit',
            'mentor.update',
            'mentor.delete',
            'mentor.search',
            'student.create',
            'student.show',
            'student.search',
            'student.edit',
            'student.update',
            'student.delete',
        ]);
        $mentor->givePermissionTo([
            'student.show',
            'student.search',
            'mentor.update',
            'mentor.search',
        ]);
        $student->givePermissionTo([
            'student.update',
        ]);
    }
}
