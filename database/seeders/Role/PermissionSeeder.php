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
        $permissions = [
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
            'mentor.create',
            'mentor.show',
            'mentor.edit',
            'mentor.update',
            'mentor.delete',
        ];
        Permission::create($permissions);
    }
}
