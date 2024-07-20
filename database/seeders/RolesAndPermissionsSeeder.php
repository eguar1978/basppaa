<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view stock']);
        Permission::create(['name' => 'add flavor']);
        Permission::create(['name' => 'add stock']);
        Permission::create(['name' => 'remove stock']);

        // Create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $stockManagerRole = Role::create(['name' => 'stock manager']);
        $stockManagerRole->givePermissionTo(['view stock', 'add stock', 'remove stock']);

        $flavorManagerRole = Role::create(['name' => 'flavor manager']);
        $flavorManagerRole->givePermissionTo(['add flavor']);
    }
}
