<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(RoleSeeder::class);

        // Compte admin par défaut
        $admin = User::factory()->create([
            'name'  => 'Admin',
            'email' => 'admin@souk-mouride.com',
        ]);
        $admin->assignRole('admin');

        // Compte vendeur de test
        $vendor = User::factory()->create([
            'name'  => 'Vendeur Test',
            'email' => 'vendor@souk-mouride.com',
        ]);
        $vendor->assignRole('vendor');
    }
}
