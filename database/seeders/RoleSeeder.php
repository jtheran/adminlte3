<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);

        Permission::create(['name' => 'admin.children']);
        Permission::create(['name' => 'admin.children.edit']);
        Permission::create(['name' => 'admin.children.create']);
        Permission::create(['name' => 'admin.children.destroy']);

        Permission::create(['name' => 'admin.parents']);
        Permission::create(['name' => 'admin.parents.edit']);
        Permission::create(['name' => 'admin.parents.create']);
        Permission::create(['name' => 'admin.parents.destroy']);



        $roleAdmin = Role::find(1);
        $permissionsAdmin = Permission::get();
        $roleAdmin->syncPermissions($permissionsAdmin);

        $roleUser = Role::find(2);
        $permissionsUser = Permission::whereIn('name', ['admin.parents', 'admin.parents.edit', 'admin.parents.create', 'admin.children', 'admin.children.edit', 'admin.children.create'])->get();
        $roleUser->syncPermissions($permissionsUser);

    }
}
