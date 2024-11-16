<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'delete_tasks']);
        Permission::create(['name' => 'delete_clients']);
        Permission::create(['name' => 'delete_projects']);
        


        $role = Role::findByName('admin');
        $role->givePermissionTo([
            'manage_users',
            'delete_tasks',
            'delete_clients',
            'delete_projects',
        ]);

    }
}
