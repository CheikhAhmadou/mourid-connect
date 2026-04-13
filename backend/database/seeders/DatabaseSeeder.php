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
        // 1. Rôles & permissions
        $this->call(RoleSeeder::class);

        // 2. Catégories (10 parents, 43 sous-catégories)
        $this->call(CategorySeeder::class);

        // 3. Comptes fixes
        $admin = User::factory()->create([
            'name'  => 'Admin Souk Mouride',
            'email' => 'admin@souk-mouride.com',
        ]);
        $admin->assignRole('admin');

        $vendor = User::factory()->create([
            'name'  => 'Vendeur Test',
            'email' => 'vendor@souk-mouride.com',
        ]);
        $vendor->assignRole('vendor');

        // 4. 50 vendeurs
        $this->call(UserSeeder::class);

        // 5. 50 boutiques (liées aux vendeurs)
        $this->call(ShopSeeder::class);

        // 6. 50 produits + images
        $this->call(ProductSeeder::class);

        // 7. 50 avis
        $this->call(ReviewSeeder::class);

        // 8. Connect : membres Paris + monde
        $this->call(ParisMembersSeeder::class);
        $this->call(WorldMembersSeeder::class);

        // 9. Connect : groupes, événements, posts
        $this->call(ConnectContentSeeder::class);

        // 10. Connect : interactions sociales (follows, likes, commentaires, notifs)
        $this->call(SocialInteractionsSeeder::class);
    }
}
