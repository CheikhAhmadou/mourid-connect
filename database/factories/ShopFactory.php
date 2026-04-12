<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Shop>
 */
class ShopFactory extends Factory
{
    private static array $shopNames = [
        'Baay Fall Textiles', 'Touba Délices', 'Ndiguël Services', 'Dakar Mode',
        'Mouride Import Export', 'Xam-Xam Formation', 'Touba Cosmetics', 'Sénégal Artisanat',
        'Diaspora Connect', 'Modou-Modou Shop', 'Café Touba Paris', 'Wax & Bazin Premium',
        'Cheikh Ibra Mode', 'Serigne Touba Store', 'Ndigël BTP', 'Baobab Saveurs',
        'Thiébou Dieune Traiteur', 'Jolof Rice Catering', 'Grand Boubou Couture',
        'Sénégal Fresh Products', 'Touba Digital Services', 'African Beauty Shop',
        'Mouride Tech Solutions', 'Tivaouane Parfums', 'Dakar Logistics',
        'West Africa Spices', 'Coumba Couture', 'Sokhna Mode & Beauté',
        'Baay Lahat Distribution', 'Keur Serigne Bi Commerce', 'Modou Fall Transport',
        'Sénégal Santé Naturelle', 'Islam & Tradition', 'Touba Music & Culture',
        'Diaspora BTP Services', 'Ndar Textiles', 'Casamance Products',
        'Fatou Bijoux', 'Mbacké Electronics', 'Dieylani Store',
        'Bamba Services', 'Cheikh Ahmadou Bamba Shop', 'Murid Organic',
        'Fouta Toro Artisanat', 'Sénégal Digital Hub', 'Touba Halal Market',
        'African Fashion House', 'Mouride Immobilier', 'Keur Ndaw Store', 'Yoff Plage Mode',
    ];

    private static array $locations = [
        ['city' => 'Touba',      'country' => 'SN'],
        ['city' => 'Dakar',      'country' => 'SN'],
        ['city' => 'Thiès',      'country' => 'SN'],
        ['city' => 'Diourbel',   'country' => 'SN'],
        ['city' => 'Paris',      'country' => 'FR'],
        ['city' => 'Lyon',       'country' => 'FR'],
        ['city' => 'Marseille',  'country' => 'FR'],
        ['city' => 'Milan',      'country' => 'IT'],
        ['city' => 'Rome',       'country' => 'IT'],
        ['city' => 'Madrid',     'country' => 'ES'],
        ['city' => 'Barcelone',  'country' => 'ES'],
        ['city' => 'New York',   'country' => 'US'],
        ['city' => 'Bruxelles',  'country' => 'BE'],
        ['city' => 'Genève',     'country' => 'CH'],
        ['city' => 'Montréal',   'country' => 'CA'],
    ];

    private static int $index = 0;

    public function definition(): array
    {
        $location = fake()->randomElement(self::$locations);
        $name     = self::$shopNames[self::$index % count(self::$shopNames)];
        self::$index++;

        return [
            'user_id'        => User::inRandomOrder()->value('id') ?? User::factory(),
            'name'           => $name,
            'slug'           => Str::slug($name).'-'.fake()->unique()->numberBetween(1, 9999),
            'description'    => fake()->paragraphs(2, true),
            'country'        => $location['country'],
            'city'           => $location['city'],
            'address'        => fake()->streetAddress(),
            'phone'          => '+221'.fake()->numerify(' ## ### ## ##'),
            'whatsapp'       => '+221'.fake()->numerify(' ## ### ## ##'),
            'email'          => fake()->companyEmail(),
            'website'        => fake()->optional(0.3)->url(),
            'level'          => fake()->randomElement(['basic', 'basic', 'basic', 'pro', 'premium']),
            'is_verified'    => fake()->boolean(40),
            'is_active'      => true,
            'views_count'    => fake()->numberBetween(50, 5000),
            'contacts_count' => fake()->numberBetween(5, 500),
        ];
    }
}
