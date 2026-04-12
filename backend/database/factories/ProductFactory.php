<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    // [nom, prix FCFA, unité, type: physical|service|digital]
    private static array $products = [
        ['Grand Boubou brodé homme',          45000,  'unité',          'physical'],
        ['Tissu Wax 6 yards',                 18000,  'lot',            'physical'],
        ['Tissu Bazin riche',                 22000,  'yard',           'physical'],
        ['Chèche Touba coton',                8500,   'unité',          'physical'],
        ['Boubou femme 3 pièces',             55000,  'unité',          'physical'],
        ['Tenue mariage bazin',               120000, 'unité',          'physical'],
        ['Bijoux or sénégalais collier',      35000,  'unité',          'physical'],
        ['Bague argent filigrane',            12000,  'unité',          'physical'],
        ['Chaussures cuir artisanales',       28000,  'paire',          'physical'],
        ['Sandales tressées Touba',           15000,  'paire',          'physical'],
        ['Café Touba 500g',                   3500,   'sachet',         'physical'],
        ['Café Touba 1kg',                    6500,   'sachet',         'physical'],
        ['Thiéboudienne fraîche 10 pers',     25000,  'plat',           'physical'],
        ['Mafé sauce 5 pers',                 12000,  'plat',           'physical'],
        ['Yassa poulet 6 pers',               18000,  'plat',           'physical'],
        ['Thiakry pot 500ml',                 3000,   'pot',            'physical'],
        ['Gâteau Tabaski traditionnel',       8000,   'unité',          'physical'],
        ['Arachides grillées 1kg',            2500,   'kg',             'physical'],
        ['Huile d\'arachide artisanale 1L',   4500,   'litre',          'physical'],
        ['Attaya thé vert Gunpowder 250g',    2800,   'paquet',         'physical'],
        ['Encens Touba premium',              5000,   'boîte',          'physical'],
        ['Chapelet Mouride 99 grains',        7500,   'unité',          'physical'],
        ['Photo Cheikh Ahmadou Bamba 40x60',  12000,  'unité',          'physical'],
        ['Livre Xassida Burdah',              8500,   'unité',          'physical'],
        ['Huile de coco vierge 250ml',        6000,   'flacon',         'physical'],
        ['Savon karité naturel',              2000,   'unité',          'physical'],
        ['Beurre de karité pur 200g',         4500,   'pot',            'physical'],
        ['Épices mafé mélange 200g',          3500,   'sachet',         'physical'],
        ['Piment séché Sénégal 100g',         2000,   'sachet',         'physical'],
        ['Mangues séchées bio 250g',          4000,   'sachet',         'physical'],
        ['Couture boubou sur mesure',         35000,  'service',        'service'],
        ['Retouche vêtements',                5000,   'service',        'service'],
        ['Coiffure tresses africaines',       25000,  'service',        'service'],
        ['Coiffure dreadlocks',               40000,  'service',        'service'],
        ['Maçonnerie & rénovation',           0,      'devis',          'service'],
        ['Plomberie urgence',                 15000,  'intervention',   'service'],
        ['Électricité installation',          0,      'devis',          'service'],
        ['Menuiserie portes & fenêtres',      0,      'devis',          'service'],
        ['Transport colis Sénégal-France',    25000,  'kg',             'service'],
        ['VTC aéroport Paris',                45000,  'trajet',         'service'],
        ['Déménagement intra-Paris',          85000,  'service',        'service'],
        ['Développement site web',            250000, 'projet',         'service'],
        ['Graphisme logo & identité',         75000,  'projet',         'service'],
        ['Comptabilité PME mensuel',          50000,  'mois',           'service'],
        ['Cours particuliers maths',          15000,  'heure',          'service'],
        ['Formation vente en ligne',          99000,  'formation',      'digital'],
        ['Guide création boutique Mouride',   15000,  'téléchargement', 'digital'],
        ['Cours wolof débutant PDF',          8000,   'téléchargement', 'digital'],
        ['Pack photos produits tutoriel',     12000,  'téléchargement', 'digital'],
        ['Formation entrepreneuriat diaspora', 149000, 'formation',     'digital'],
    ];

    private static int $index = 0;

    public function definition(): array
    {
        $item      = self::$products[self::$index % count(self::$products)];
        self::$index++;

        $isService  = $item[3] === 'service';
        $isDigital  = $item[3] === 'digital';
        $price      = $item[1] === 0 ? 0 : $item[1];
        $hasPromo   = ! $isService && ! $isDigital && fake()->boolean(25);

        $deliveryZones = $isDigital
            ? 'Monde entier'
            : fake()->randomElement([
                'France,Sénégal',
                'France,Italie,Espagne',
                'Europe',
                'Sénégal',
                'France,Belgique,Suisse',
                'Monde entier',
            ]);

        return [
            'shop_id'        => Shop::inRandomOrder()->value('id') ?? Shop::factory(),
            'category_id'    => Category::whereNotNull('parent_id')->inRandomOrder()->value('id'),
            'name'           => $item[0],
            'slug'           => Str::slug($item[0]).'-'.fake()->unique()->numberBetween(1, 99999),
            'description'    => fake()->paragraphs(3, true),
            'specifications' => $isService ? null : fake()->optional(0.5)->sentence(10),
            'price'          => $price,
            'price_promo'    => $hasPromo ? round($price * fake()->randomFloat(2, 0.7, 0.9)) : null,
            'unit'           => $item[2],
            'stock'          => $isService || $isDigital ? 0 : fake()->numberBetween(1, 200),
            'min_order'      => 1,
            'delivery_zones' => $deliveryZones,
            'delivery_delay' => $isDigital ? 'Instantané' : fake()->randomElement(['24h', '3-5 jours', '7-14 jours', '2-4 semaines']),
            'delivery_free'  => $isDigital || fake()->boolean(20),
            'is_available'   => true,
            'is_featured'    => fake()->boolean(15),
            'is_active'      => true,
            'views_count'    => fake()->numberBetween(10, 2000),
            'contacts_count' => fake()->numberBetween(0, 200),
        ];
    }
}
