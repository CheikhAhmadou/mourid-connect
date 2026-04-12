<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    private static array $firstNames = [
        'Cheikh', 'Modou', 'Mamadou', 'Ibrahima', 'Oumar', 'Abdoulaye', 'Serigne',
        'Moussa', 'Babacar', 'Saliou', 'Pape', 'Lamine', 'Assane', 'Mor', 'Bamba',
        'Fatou', 'Ndéye', 'Mariama', 'Aminata', 'Aissatou', 'Sokhna', 'Khady',
        'Rokhaya', 'Mame', 'Coumba', 'Dieynaba', 'Astou', 'Seynabou', 'Rama',
    ];

    private static array $lastNames = [
        'Diallo', 'Ba', 'Ndiaye', 'Fall', 'Sy', 'Kane', 'Mbaye', 'Diop', 'Sarr',
        'Toure', 'Sow', 'Diagne', 'Gueye', 'Diouf', 'Cissé', 'Tall', 'Faye',
        'Mbacké', 'Thiam', 'Seck', 'Badji', 'Manga', 'Lo', 'Camara', 'Kouyaté',
    ];

    public function definition(): array
    {
        $first = fake()->randomElement(self::$firstNames);
        $last  = fake()->randomElement(self::$lastNames);

        return [
            'name'               => "{$first} {$last}",
            'email'              => Str::lower("{$first}.{$last}") . fake()->unique()->numberBetween(1, 999) . '@gmail.com',
            'email_verified_at'  => now(),
            'password'           => static::$password ??= Hash::make('password'),
            'remember_token'     => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
