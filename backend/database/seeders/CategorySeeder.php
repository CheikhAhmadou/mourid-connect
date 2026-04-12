<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'icon' => '🛒',
                'name' => 'Commerce & Distribution',
                'children' => [
                    'Épiceries & alimentation africaine',
                    'Import-export',
                    'Grossistes & détaillants',
                    'Produits sénégalais en diaspora',
                ],
            ],
            [
                'icon' => '🍽️',
                'name' => 'Restauration & Alimentation',
                'children' => [
                    'Restaurants africains & halal',
                    'Traiteurs & cuisinières à domicile',
                    'Vente de thiéboudienne, mafé, yassa',
                    'Pâtisseries & gâteaux africains',
                    'Vente de café Touba',
                ],
            ],
            [
                'icon' => '👗',
                'name' => 'Mode & Artisanat',
                'children' => [
                    'Couturiers & tailleurs',
                    'Tissus wax & bazin',
                    'Bijoux & accessoires',
                    'Chaussures artisanales',
                    'Boubous & tenues traditionnelles',
                ],
            ],
            [
                'icon' => '🏗️',
                'name' => 'BTP & Services',
                'children' => [
                    'Maçons & entrepreneurs BTP',
                    'Plombiers & électriciens',
                    'Menuisiers & charpentiers',
                    'Décoration & aménagement intérieur',
                ],
            ],
            [
                'icon' => '🌿',
                'name' => 'Santé & Bien-être',
                'children' => [
                    'Coiffeurs & barbiers africains',
                    'Produits cosmétiques naturels',
                    'Huiles & savons traditionnels',
                    'Thérapeutes & praticiens',
                ],
            ],
            [
                'icon' => '🌾',
                'name' => 'Agriculture & Terroir',
                'children' => [
                    'Arachides & produits du Sénégal',
                    'Épices & condiments africains',
                    'Fruits & légumes africains',
                    'Miel & produits naturels',
                ],
            ],
            [
                'icon' => '📱',
                'name' => 'Tech & Services Numériques',
                'children' => [
                    'Développeurs web & mobile',
                    'Graphistes & créatifs',
                    'Comptables & conseillers fiscaux',
                    'Agents immobiliers',
                ],
            ],
            [
                'icon' => '🚗',
                'name' => 'Transport & Logistique',
                'children' => [
                    'Transporteurs de marchandises',
                    'Chauffeurs & VTC',
                    'Déménageurs',
                    'Envoi de colis Sénégal ↔ Diaspora',
                ],
            ],
            [
                'icon' => '🎓',
                'name' => 'Éducation & Formation',
                'children' => [
                    'Cours particuliers',
                    'Formations professionnelles',
                    'Cours de wolof pour enfants diaspora',
                    'Coaching & mentorat',
                ],
            ],
            [
                'icon' => '🕌',
                'name' => 'Services Religieux',
                'children' => [
                    'Vente de livres islamiques',
                    'Chapelets & articles religieux',
                    'Photos & tableaux de Touba',
                    'Parfums & encens',
                ],
            ],
        ];

        foreach ($categories as $order => $data) {
            $parent = Category::firstOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'name'      => $data['name'],
                    'icon'      => $data['icon'],
                    'is_active' => true,
                    'order'     => $order,
                ]
            );

            foreach ($data['children'] as $childOrder => $childName) {
                Category::firstOrCreate(
                    ['slug' => Str::slug($childName)],
                    [
                        'name'      => $childName,
                        'icon'      => $data['icon'],
                        'parent_id' => $parent->id,
                        'is_active' => true,
                        'order'     => $childOrder,
                    ]
                );
            }
        }
    }
}
