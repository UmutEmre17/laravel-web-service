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
        Permission::create(['name' => 'post new product']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        // Add more permissions as needed

        // Create roles and assign existing permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['post new product', 'edit products', 'delete products']);

        $role = Role::create(['name' => 'guest']);
        
    }
}
