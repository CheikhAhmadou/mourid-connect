<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * 10 membres actifs géolocalisés dans différents arrondissements de Paris.
 * Chaque membre a un profil complet visible sur la carte.
 */
class ParisMembersSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'user' => [
                    'name'    => 'Amadou Diop',
                    'email'   => 'amadou.diop@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Médecin généraliste à Paris 1er. Engagé pour la santé de la communauté mouride.',
                    'profession'        => 'Médecin généraliste',
                    'dahira_name'       => 'Dahira Moustarchidine Paris',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8606,
                    'longitude'         => 2.3448,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33612000001',
                ],
                'zone' => '75001 – Châtelet / Louvre',
            ],
            [
                'user' => [
                    'name'    => 'Serigne Fall',
                    'email'   => 'serigne.fall@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Avocat au barreau de Paris. Je défends les droits des membres de notre communauté.',
                    'profession'        => 'Avocat',
                    'dahira_name'       => 'Dahira Hizbut Tarkhiyya',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8503,
                    'longitude'         => 2.3470,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33612000002',
                ],
                'zone' => '75005 – Quartier Latin',
            ],
            [
                'user' => [
                    'name'    => 'Binta Ndiaye',
                    'email'   => 'binta.ndiaye@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Enseignante en école primaire. Je donne des cours de wolof pour les enfants mourides.',
                    'profession'        => 'Enseignante',
                    'dahira_name'       => 'Dahira Moustarchidine Paris',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8749,
                    'longitude'         => 2.2963,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33612000003',
                ],
                'zone' => '75008 – Champs-Élysées',
            ],
            [
                'user' => [
                    'name'    => 'Omar Gaye',
                    'email'   => 'omar.gaye@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Ingénieur logiciel chez une startup parisienne. Passionné par la tech et la communauté.',
                    'profession'        => 'Ingénieur logiciel',
                    'dahira_name'       => 'Mourides de France',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8818,
                    'longitude'         => 2.3571,
                    'is_visible_map'    => true,
                    'is_available_help' => false,
                    'whatsapp'          => '+33612000004',
                ],
                'zone' => '75010 – Gare du Nord',
            ],
            [
                'user' => [
                    'name'    => 'Mariama Sow',
                    'email'   => 'mariama.sow@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Comptable et responsable financière. Je peux aider les nouveaux arrivants dans leurs démarches.',
                    'profession'        => 'Comptable',
                    'dahira_name'       => 'Dahira Moustarchidine Paris',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8534,
                    'longitude'         => 2.3693,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33612000005',
                ],
                'zone' => '75011 – Bastille / République',
            ],
            [
                'user' => [
                    'name'    => 'Ibrahima Ba',
                    'email'   => 'ibrahima.ba@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Restaurateur. Propriétaire d\'un restaurant africain à Paris 13e. Cuisine sénégalaise authentique.',
                    'profession'        => 'Restaurateur',
                    'dahira_name'       => 'Dahira Hizbut Tarkhiyya',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8291,
                    'longitude'         => 2.3659,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33612000006',
                ],
                'zone' => '75013 – Ivry / Place d\'Italie',
            ],
            [
                'user' => [
                    'name'    => 'Fatou Mbaye',
                    'email'   => 'fatou.mbaye@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Infirmière à l\'hôpital Lariboisière. Disponible pour conseils santé à la communauté.',
                    'profession'        => 'Infirmière',
                    'dahira_name'       => 'Mourides de France',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8402,
                    'longitude'         => 2.2941,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33612000007',
                ],
                'zone' => '75015 – Montparnasse',
            ],
            [
                'user' => [
                    'name'    => 'Moussa Cissé',
                    'email'   => 'moussa.cisse@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Entrepreneur et président du groupe Mourides de Montmartre. Importateur de produits artisanaux.',
                    'profession'        => 'Entrepreneur',
                    'dahira_name'       => 'Mourides de Montmartre',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8867,
                    'longitude'         => 2.3431,
                    'is_visible_map'    => true,
                    'is_available_help' => false,
                    'whatsapp'          => '+33612000008',
                ],
                'zone' => '75018 – Montmartre',
            ],
            [
                'user' => [
                    'name'    => 'Aissatou Diallo',
                    'email'   => 'aissatou.diallo@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Doctorante en droit international à Paris. Je participe activement aux activités de la dahira.',
                    'profession'        => 'Doctorante en droit',
                    'dahira_name'       => 'Dahira Moustarchidine Paris',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8896,
                    'longitude'         => 2.3888,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33612000009',
                ],
                'zone' => '75019 – La Villette',
            ],
            [
                'user' => [
                    'name'    => 'Cheikh Sarr',
                    'email'   => 'cheikh.sarr@mouride-paris.test',
                    'city'    => 'Paris',
                    'country' => 'FR',
                ],
                'profile' => [
                    'bio'               => 'Musicien et artiste. Ambassadeur de la culture mouride à travers la musique mbalax à Paris.',
                    'profession'        => 'Musicien / Artiste',
                    'dahira_name'       => 'Dahira Hizbut Tarkhiyya',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Paris',
                    'country'           => 'FR',
                    'latitude'          => 48.8681,
                    'longitude'         => 2.4001,
                    'is_visible_map'    => true,
                    'is_available_help' => false,
                    'whatsapp'          => '+33612000010',
                ],
                'zone' => '75020 – Belleville',
            ],
        ];

        foreach ($members as $data) {
            // Vérifier si l'utilisateur existe déjà
            if (User::where('email', $data['user']['email'])->exists()) {
                $this->command->line("  Déjà existant : {$data['user']['name']} ({$data['zone']}) — ignoré");
                continue;
            }

            // Créer l'utilisateur
            $user = new User();
            $user->name     = $data['user']['name'];
            $user->email    = $data['user']['email'];
            $user->password = Hash::make('password');
            $user->city     = $data['user']['city'];
            $user->country  = $data['user']['country'];
            $user->save();

            // Créer le profil
            UserProfile::create(array_merge(
                $data['profile'],
                ['user_id' => $user->id]
            ));

            $this->command->info("  ✓ {$data['user']['name']} — {$data['zone']}");
        }

        $this->command->info("\n  10 membres parisiens créés avec succès !");
    }
}
