<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $users    = User::all();
        $count    = 0;

        // On tourne sur les produits pour distribuer les avis équitablement
        foreach ($products->shuffle() as $product) {
            // 1 à 4 avis par produit
            $reviewersCount = rand(1, 4);
            $reviewers      = $users->shuffle()->take($reviewersCount);

            foreach ($reviewers as $user) {
                // Contrainte unique product_id + user_id
                $exists = Review::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->exists();

                if (! $exists && $count < 50) {
                    Review::factory()->create([
                        'product_id' => $product->id,
                        'user_id'    => $user->id,
                    ]);
                    $count++;
                }
            }

            if ($count >= 50) {
                break;
            }
        }
    }
}
