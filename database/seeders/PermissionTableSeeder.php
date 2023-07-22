<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
 

    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
            'designation-list',
            'designation-create',
            'designation-edit',
            'designation-delete',
            'employee-list',
            'employee-create',
            'employee-edit',
            'employee-delete',
            // 'user-list',
            // 'user-create',
            // 'user-edit',
            // 'user-delete',
        ];
        
        foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
        }
    }
}

