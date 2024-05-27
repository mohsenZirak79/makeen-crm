<?php

namespace Database\Seeders\Role;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = collect([
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
        $permissions->map(function ($permission) {
            Permission::create(['name' => $permission]);
        });
    }
}
