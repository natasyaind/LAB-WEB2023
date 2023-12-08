<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorities = config('permission.authorities');

        $listPermission = [];
        $adminPermissions = [];
        $teacherPermissions = [];
        $studentPermissions = [];

        foreach ($authorities as $label => $permissions) {
            foreach ($permissions as $permission) {
                $listPermission[] = [
                    'name' => $permission,
                    'guard_name' => 'web',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                // admin
                $adminPermissions[] = $permission;
                // teacher
                if (in_array($label, ['manage_posts', 'manage_categories', 'manage_tags'])) {
                    $teacherPermissions[] =  $permission;
                }
                // student
                if (in_array($label, ['manage_posts'])) {
                    $studentPermissions[] =  $permission;
                }
            }
        }

        // insert permission
        Permission::insert($listPermission);

        // insert roles
        # admin
        $admin = Role::create([
            'name' => "Admin",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        # teacher
        $teacher = Role::create([
            'name' => "Teacher",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        # student
        $student = Role::create([
            'name' => "Student",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Role -> permission
        $admin->givePermissionTo($adminPermissions);
        $teacher->givePermissionTo($teacherPermissions);
        $student->givePermissionTo($studentPermissions);

        $userAdmin = User::find(1)->assignRole("Admin");
    }
}
