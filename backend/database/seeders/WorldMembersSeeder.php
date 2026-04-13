<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * 15 membres mourides géolocalisés dans 7 grandes villes mondiales.
 * Idempotent — ignoré si l'email existe déjà.
 */
class WorldMembersSeeder extends Seeder
{
    public function run(): void
    {
        $members = [

            // ─── DAKAR (SN) ────────────────────────────────────────────
            [
                'user' => ['name' => 'Mame Diarra Thiaw',    'email' => 'mame.thiaw@mouride-world.test',    'city' => 'Dakar',    'country' => 'SN'],
                'profile' => [
                    'bio'               => 'Directrice d\'école coranique à Dakar. Engagée pour l\'éducation islamique des jeunes mourides.',
                    'profession'        => 'Directrice d\'école',
                    'dahira_name'       => 'Dahira Moustarchidine Dakar',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Dakar',
                    'country'           => 'SN',
                    'latitude'          => 14.7167,
                    'longitude'         => -17.4677,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+221771000001',
                ],
            ],
            [
                'user' => ['name' => 'Ibou Ngom',             'email' => 'ibou.ngom@mouride-world.test',      'city' => 'Dakar',    'country' => 'SN'],
                'profile' => [
                    'bio'               => 'Architecte et président de la dahira des jeunes de Dakar-Plateau.',
                    'profession'        => 'Architecte',
                    'dahira_name'       => 'Dahira Jeunes Dakar-Plateau',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Dakar',
                    'country'           => 'SN',
                    'latitude'          => 14.6928,
                    'longitude'         => -17.4467,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+221771000002',
                ],
            ],
            [
                'user' => ['name' => 'Rokhaya Diouf',         'email' => 'rokhaya.diouf@mouride-world.test',  'city' => 'Dakar',    'country' => 'SN'],
                'profile' => [
                    'bio'               => 'Médecin urgentiste à l\'hôpital Principal de Dakar. Coordinatrice santé de la communauté.',
                    'profession'        => 'Médecin urgentiste',
                    'dahira_name'       => 'Hizbut Tarkhiyya Dakar',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Dakar',
                    'country'           => 'SN',
                    'latitude'          => 14.6837,
                    'longitude'         => -17.4368,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+221771000003',
                ],
            ],

            // ─── NEW YORK (US) ─────────────────────────────────────────
            [
                'user' => ['name' => 'Mamadou Sy',            'email' => 'mamadou.sy@mouride-world.test',    'city' => 'New York', 'country' => 'US'],
                'profile' => [
                    'bio'               => 'Entrepreneur en import-export sénégalais à Harlem. Fondateur de l\'association Mourides NY.',
                    'profession'        => 'Entrepreneur',
                    'dahira_name'       => 'Mourides de New York',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'New York',
                    'country'           => 'US',
                    'latitude'          => 40.7990,
                    'longitude'         => -73.9380,
                    'is_visible_map'    => true,
                    'is_available_help' => false,
                    'whatsapp'          => '+12125551001',
                ],
            ],
            [
                'user' => ['name' => 'Ndéye Sall',            'email' => 'ndeye.sall@mouride-world.test',    'city' => 'New York', 'country' => 'US'],
                'profile' => [
                    'bio'               => 'Infirmière diplômée à NYC. Organisatrice des collectes annuelles pour le Grand Magal.',
                    'profession'        => 'Infirmière',
                    'dahira_name'       => 'Dahira Moustarchidine NY',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'New York',
                    'country'           => 'US',
                    'latitude'          => 40.7282,
                    'longitude'         => -73.7949,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+12125551002',
                ],
            ],

            // ─── LONDON (GB) ──────────────────────────────────────────
            [
                'user' => ['name' => 'Aliou Badji',           'email' => 'aliou.badji@mouride-world.test',   'city' => 'London',   'country' => 'GB'],
                'profile' => [
                    'bio'               => 'Comptable certifié à Londres. Trésorier de la dahira mouride du Royaume-Uni.',
                    'profession'        => 'Comptable certifié',
                    'dahira_name'       => 'Mourides du Royaume-Uni',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'London',
                    'country'           => 'GB',
                    'latitude'          => 51.5271,
                    'longitude'         => -0.0756,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+447700900001',
                ],
            ],
            [
                'user' => ['name' => 'Fatoumata Kane',        'email' => 'fatoumata.kane@mouride-world.test', 'city' => 'London',   'country' => 'GB'],
                'profile' => [
                    'bio'               => 'Développeuse web senior à Londres. Active dans la communauté mouride britannique.',
                    'profession'        => 'Développeuse web',
                    'dahira_name'       => 'Mourides du Royaume-Uni',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'London',
                    'country'           => 'GB',
                    'latitude'          => 51.4613,
                    'longitude'         => -0.1156,
                    'is_visible_map'    => true,
                    'is_available_help' => false,
                    'whatsapp'          => '+447700900002',
                ],
            ],

            // ─── MONTRÉAL (CA) ────────────────────────────────────────
            [
                'user' => ['name' => 'Ousmane Faye',          'email' => 'ousmane.faye@mouride-world.test',  'city' => 'Montréal', 'country' => 'CA'],
                'profile' => [
                    'bio'               => 'Étudiant en doctorat d\'informatique à l\'Université de Montréal. Modérateur du groupe Connect.',
                    'profession'        => 'Doctorant en informatique',
                    'dahira_name'       => 'Mourides du Québec',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Montréal',
                    'country'           => 'CA',
                    'latitude'          => 45.5088,
                    'longitude'         => -73.5878,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+15145551001',
                ],
            ],
            [
                'user' => ['name' => 'Adja Diallo',           'email' => 'adja.diallo@mouride-world.test',   'city' => 'Montréal', 'country' => 'CA'],
                'profile' => [
                    'bio'               => 'Pharmacienne à Montréal. Responsable de l\'action sociale de la dahira québécoise.',
                    'profession'        => 'Pharmacienne',
                    'dahira_name'       => 'Dahira Moustarchidine Québec',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Montréal',
                    'country'           => 'CA',
                    'latitude'          => 45.4890,
                    'longitude'         => -73.6441,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+15145551002',
                ],
            ],

            // ─── BRUXELLES (BE) ───────────────────────────────────────
            [
                'user' => ['name' => 'Modou Diallo',          'email' => 'modou.diallo@mouride-world.test',  'city' => 'Bruxelles','country' => 'BE'],
                'profile' => [
                    'bio'               => 'Chauffeur de taxi indépendant à Bruxelles. Pilier de la dahira mouride belge depuis 15 ans.',
                    'profession'        => 'Entrepreneur (transport)',
                    'dahira_name'       => 'Mourides de Belgique',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Bruxelles',
                    'country'           => 'BE',
                    'latitude'          => 50.8619,
                    'longitude'         => 4.3690,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+32471000001',
                ],
            ],
            [
                'user' => ['name' => 'Yacine Mboup',          'email' => 'yacine.mboup@mouride-world.test',  'city' => 'Bruxelles','country' => 'BE'],
                'profile' => [
                    'bio'               => 'Juriste en droit européen. Conseille les immigrés sénégalais sur leurs droits en Europe.',
                    'profession'        => 'Juriste européen',
                    'dahira_name'       => 'Hizbut Tarkhiyya Bruxelles',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Bruxelles',
                    'country'           => 'BE',
                    'latitude'          => 50.8476,
                    'longitude'         => 4.3572,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+32471000002',
                ],
            ],

            // ─── MILAN (IT) ───────────────────────────────────────────
            [
                'user' => ['name' => 'Pape Ndao',             'email' => 'pape.ndao@mouride-world.test',     'city' => 'Milan',    'country' => 'IT'],
                'profile' => [
                    'bio'               => 'Commerçant textile dans le marché africain de Milan. Vice-président de l\'association Mourides d\'Italie.',
                    'profession'        => 'Commerçant',
                    'dahira_name'       => 'Mourides d\'Italie',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Milan',
                    'country'           => 'IT',
                    'latitude'          => 45.4654,
                    'longitude'         => 9.1913,
                    'is_visible_map'    => true,
                    'is_available_help' => false,
                    'whatsapp'          => '+393301000001',
                ],
            ],
            [
                'user' => ['name' => 'Coumba Gueye',          'email' => 'coumba.gueye@mouride-world.test',  'city' => 'Milan',    'country' => 'IT'],
                'profile' => [
                    'bio'               => 'Coiffeuse afro à Milan. Anime des ateliers de tressage et transmet la culture sénégalaise.',
                    'profession'        => 'Coiffeuse & Artisane',
                    'dahira_name'       => 'Dahira Moustarchidine Milan',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Milan',
                    'country'           => 'IT',
                    'latitude'          => 45.4739,
                    'longitude'         => 9.1735,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+393301000002',
                ],
            ],

            // ─── MARSEILLE (FR) ───────────────────────────────────────
            [
                'user' => ['name' => 'Assane Samb',           'email' => 'assane.samb@mouride-world.test',   'city' => 'Marseille','country' => 'FR'],
                'profile' => [
                    'bio'               => 'Pêcheur devenu entrepreneur de distribution halal à Marseille. Actif dans la dahira locale.',
                    'profession'        => 'Chef d\'entreprise (halal)',
                    'dahira_name'       => 'Mourides de Marseille',
                    'cheikh_ref'        => 'Serigne Touba',
                    'city'              => 'Marseille',
                    'country'           => 'FR',
                    'latitude'          => 43.3067,
                    'longitude'         => 5.3828,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33698000001',
                ],
            ],
            [
                'user' => ['name' => 'Bineta Niang',          'email' => 'bineta.niang@mouride-world.test',  'city' => 'Marseille','country' => 'FR'],
                'profile' => [
                    'bio'               => 'Assistante sociale à Marseille. J\'accompagne les familles mourides dans leurs démarches administratives.',
                    'profession'        => 'Assistante sociale',
                    'dahira_name'       => 'Dahira Moustarchidine Marseille',
                    'cheikh_ref'        => 'Cheikh Ahmadou Bamba',
                    'city'              => 'Marseille',
                    'country'           => 'FR',
                    'latitude'          => 43.2965,
                    'longitude'         => 5.3813,
                    'is_visible_map'    => true,
                    'is_available_help' => true,
                    'whatsapp'          => '+33698000002',
                ],
            ],
        ];

        foreach ($members as $data) {
            if (User::where('email', $data['user']['email'])->exists()) {
                $this->command->line("  Déjà existant : {$data['user']['name']} — ignoré");
                continue;
            }

            $user           = new User();
            $user->name     = $data['user']['name'];
            $user->email    = $data['user']['email'];
            $user->password = Hash::make('password');
            $user->city     = $data['user']['city'];
            $user->country  = $data['user']['country'];
            $user->save();

            UserProfile::create(array_merge($data['profile'], ['user_id' => $user->id]));

            $this->command->info("  ✓ {$data['user']['name']} ({$data['user']['city']}, {$data['user']['country']})");
        }

        $this->command->info("\n  15 membres mondiaux créés !");
    }
}
