<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    // Images placeholder par type (picsum IDs thématiques)
    private static array $imageSeeds = [
        10, 20, 30, 40, 50, 60, 70, 80, 90, 100,
        110, 120, 130, 140, 150, 160, 170, 180, 190, 200,
    ];

    public function run(): void
    {
        Product::factory(50)->create()->each(function (Product $product) {
            $imageCount = rand(1, 5);

            foreach (range(0, $imageCount - 1) as $i) {
                $seed = fake()->randomElement(self::$imageSeeds);
                ProductImage::create([
                    'product_id'    => $product->id,
                    'url'           => "https://picsum.photos/seed/{$seed}/800/600",
                    'url_thumbnail' => "https://picsum.photos/seed/{$seed}/400/300",
                    'is_main'       => $i === 0,
                    'order'         => $i,
                    'alt_text'      => $product->name,
                ]);
            }
        });
    }
}
