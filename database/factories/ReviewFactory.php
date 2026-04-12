<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    private static array $positiveComments = [
        'Produit reçu conforme à la description, très satisfait !',
        'Vendeur très sérieux, livraison rapide. Je recommande vivement.',
        'Qualité exceptionnelle, exactement comme chez nous au Sénégal.',
        'Le tissu est magnifique, couleurs vibrantes. Barakallah félicitations.',
        'Service impeccable, le vendeur a bien communiqué tout au long.',
        'Café Touba authentique, je retrouve le goût de Touba ici en France.',
        'Boubou superbe, très bien cousu. Mon mari est ravi !',
        'Livraison en 3 jours, emballage soigné. Très bon vendeur.',
        'Je suis client depuis 6 mois, jamais déçu. Que Dieu bénisse ce frère.',
        'Produit 100% authentique sénégalais, ça fait chaud au cœur.',
        'Le traiteur a assuré pour notre fête, tout le monde a adoré le thiébou.',
        'Formations très bien structurées, j\'ai appris beaucoup.',
        'Artisan talentueux, mon boubou de mariage est une merveille.',
        'Prix très correct pour la qualité. Je reviendrai avec plaisir.',
        'Vendeur de confiance, communication excellente.',
    ];

    private static array $mixedComments = [
        'Bon produit mais la livraison a pris un peu plus de temps que prévu.',
        'Qualité satisfaisante mais l\'emballage pourrait être amélioré.',
        'Produit correct, correspond à la description.',
        'Bon rapport qualité-prix dans l\'ensemble.',
    ];

    public function definition(): array
    {
        $rating = fake()->randomElement([5, 5, 5, 5, 4, 4, 4, 3, 5, 5]);

        return [
            'product_id'           => Product::inRandomOrder()->value('id') ?? Product::factory(),
            'user_id'              => User::inRandomOrder()->value('id') ?? User::factory(),
            'rating'               => $rating,
            'comment'              => $rating >= 4
                ? fake()->randomElement(self::$positiveComments)
                : fake()->randomElement(self::$mixedComments),
            'is_verified_purchase' => fake()->boolean(70),
        ];
    }
}
