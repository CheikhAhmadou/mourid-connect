<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Permissions granulaires
        $permissions = [
            // Shops
            'shop.create',
            'shop.update',
            'shop.delete',

            // Products
            'product.create',
            'product.update',
            'product.delete',

            // Admin
            'shop.verify',
            'user.manage',
            'category.manage',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // Rôle vendeur : gère ses propres boutiques et produits
        $vendor = Role::firstOrCreate(['name' => 'vendor', 'guard_name' => 'web']);
        $vendor->syncPermissions([
            'shop.create',
            'shop.update',
            'shop.delete',
            'product.create',
            'product.update',
            'product.delete',
        ]);

        // Rôle admin : tout
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions($permissions);
    }
}
