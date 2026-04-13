<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Contenu de démonstration pour le pilier Connect :
 * - 4 groupes (Dahiras + thématiques)
 * - 5 événements
 * - 20 posts des membres parisiens
 */
class ConnectContentSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer les 10 membres parisiens
        $emails = [
            'amadou.diop@mouride-paris.test',
            'serigne.fall@mouride-paris.test',
            'binta.ndiaye@mouride-paris.test',
            'omar.gaye@mouride-paris.test',
            'mariama.sow@mouride-paris.test',
            'ibrahima.ba@mouride-paris.test',
            'fatou.mbaye@mouride-paris.test',
            'moussa.cisse@mouride-paris.test',
            'aissatou.diallo@mouride-paris.test',
            'cheikh.sarr@mouride-paris.test',
        ];

        $users = User::whereIn('email', $emails)->get()->keyBy('email');

        if ($users->isEmpty()) {
            $this->command->warn('  ⚠ Membres parisiens introuvables. Lancez ParisMembersSeeder d\'abord.');
            return;
        }

        $this->command->info('  Création des groupes...');
        $groups = $this->createGroups($users);

        $this->command->info('  Création des événements...');
        $this->createEvents($users, $groups);

        $this->command->info('  Création des posts...');
        $this->createPosts($users, $groups);

        $this->command->info("\n  ✓ Contenu Connect créé avec succès !");
    }

    private function createGroups($users): array
    {
        $groupsData = [
            [
                'name'        => 'Mourides de France',
                'slug'        => 'mourides-de-france',
                'description' => 'Le plus grand groupe de la communauté mouride en France. Échanges, entraide, événements et partage spirituel pour tous les mourides résidant en France.',
                'type'        => 'country',
                'country'     => 'FR',
                'city'        => null,
                'creator'     => 'moussa.cisse@mouride-paris.test',
                'members'     => ['amadou.diop@mouride-paris.test', 'serigne.fall@mouride-paris.test', 'binta.ndiaye@mouride-paris.test', 'fatou.mbaye@mouride-paris.test'],
            ],
            [
                'name'        => 'Dahira Moustarchidine Paris',
                'slug'        => 'dahira-moustarchidine-paris',
                'description' => 'Dahira officielle Moustarchidine Wal Moustarchidati de Paris. Réunions spirituelles, collectes pour le Grand Magal et activités communautaires.',
                'type'        => 'dahira',
                'country'     => 'FR',
                'city'        => 'Paris',
                'creator'     => 'amadou.diop@mouride-paris.test',
                'members'     => ['binta.ndiaye@mouride-paris.test', 'mariama.sow@mouride-paris.test', 'aissatou.diallo@mouride-paris.test'],
            ],
            [
                'name'        => 'Entrepreneurs Mourides',
                'slug'        => 'entrepreneurs-mourides',
                'description' => 'Réseau d\'affaires des entrepreneurs mourides en Europe. Partage d\'opportunités, mentorat, accompagnement à la création d\'entreprise.',
                'type'        => 'theme',
                'country'     => null,
                'city'        => null,
                'creator'     => 'moussa.cisse@mouride-paris.test',
                'members'     => ['omar.gaye@mouride-paris.test', 'ibrahima.ba@mouride-paris.test', 'serigne.fall@mouride-paris.test'],
            ],
            [
                'name'        => 'Mourides de Paris — Santé & Entraide',
                'slug'        => 'mourides-paris-sante-entraide',
                'description' => 'Groupe d\'entraide médicale et sociale pour les mourides à Paris. Orientation vers les professionnels de santé de la communauté, conseils pratiques.',
                'type'        => 'theme',
                'country'     => 'FR',
                'city'        => 'Paris',
                'creator'     => 'amadou.diop@mouride-paris.test',
                'members'     => ['fatou.mbaye@mouride-paris.test', 'mariama.sow@mouride-paris.test'],
            ],
        ];

        $created = [];
        foreach ($groupsData as $data) {
            if (Group::where('slug', $data['slug'])->exists()) {
                $this->command->line("    Déjà existant : {$data['name']} — ignoré");
                $created[] = Group::where('slug', $data['slug'])->first();
                continue;
            }

            $creator = $users->get($data['creator']);
            if (!$creator) continue;

            $group = Group::create([
                'name'         => $data['name'],
                'slug'         => $data['slug'],
                'description'  => $data['description'],
                'type'         => $data['type'],
                'country'      => $data['country'],
                'city'         => $data['city'],
                'creator_id'   => $creator->id,
                'members_count'=> 1 + count($data['members']),
                'posts_count'  => 0,
                'is_active'    => true,
                'is_private'   => false,
            ]);

            // Ajouter le créateur comme admin
            GroupMember::create([
                'group_id' => $group->id,
                'user_id'  => $creator->id,
                'role'     => 'admin',
            ]);

            // Ajouter les membres
            foreach ($data['members'] as $memberEmail) {
                $member = $users->get($memberEmail);
                if ($member) {
                    GroupMember::firstOrCreate([
                        'group_id' => $group->id,
                        'user_id'  => $member->id,
                    ], ['role' => 'member']);
                }
            }

            $created[] = $group;
            $this->command->info("    ✓ {$group->name} ({$group->members_count} membres)");
        }

        return $created;
    }

    private function createEvents($users, array $groups): void
    {
        $eventsData = [
            [
                'title'       => 'Grand Magal de Touba 2025 — Collecte Paris',
                'description' => 'Collecte communautaire pour le Grand Magal de Touba 2025. Rejoignez-nous pour organiser le voyage collectif depuis Paris. Inscription obligatoire.',
                'type'        => 'religious',
                'city'        => 'Paris',
                'country'     => 'FR',
                'location'    => 'Salle communautaire, 75018 Paris',
                'start_date'  => now()->addMonths(2)->format('Y-m-d H:i:s'),
                'is_online'   => false,
                'max'         => 150,
                'organizer'   => 'amadou.diop@mouride-paris.test',
            ],
            [
                'title'       => 'Conférence : Islam et Modernité — Cheikh Ahmadou Bamba',
                'description' => 'Conférence sur l\'enseignement de Cheikh Ahmadou Bamba face aux défis de la modernité. Intervenants : imams et chercheurs de la diaspora.',
                'type'        => 'religious',
                'city'        => 'Paris',
                'country'     => 'FR',
                'location'    => 'Centre islamique de Paris, 75005',
                'start_date'  => now()->addDays(15)->format('Y-m-d H:i:s'),
                'is_online'   => false,
                'max'         => 200,
                'organizer'   => 'serigne.fall@mouride-paris.test',
            ],
            [
                'title'       => 'Cours de Wolof pour enfants — Samedi',
                'description' => 'Cours de wolof hebdomadaires pour enfants mourides de 6 à 14 ans. Animé par des enseignants bénévoles de la communauté. Chaque samedi matin.',
                'type'        => 'cultural',
                'city'        => 'Paris',
                'country'     => 'FR',
                'location'    => 'École associative, Paris 10e',
                'start_date'  => now()->addDays(7)->format('Y-m-d H:i:s'),
                'is_online'   => false,
                'max'         => 30,
                'organizer'   => 'binta.ndiaye@mouride-paris.test',
            ],
            [
                'title'       => 'Forum Entrepreneurs Mourides — Paris 2025',
                'description' => 'Premier forum des entrepreneurs mourides en France. Pitchs de startups, tables rondes, networking. Investisseurs de la communauté présents.',
                'type'        => 'professional',
                'city'        => 'Paris',
                'country'     => 'FR',
                'location'    => 'Espace événementiel, La Défense',
                'start_date'  => now()->addMonths(3)->format('Y-m-d H:i:s'),
                'is_online'   => false,
                'max'         => 300,
                'organizer'   => 'moussa.cisse@mouride-paris.test',
            ],
            [
                'title'       => 'Concert Mbalax & Culture Sénégalaise',
                'description' => 'Soirée culturelle : musique mbalax live, exposition artisanale, dégustation culinaire sénégalaise. Entrée libre pour les membres de la dahira.',
                'type'        => 'cultural',
                'city'        => 'Paris',
                'country'     => 'FR',
                'location'    => 'La Bellevilloise, Paris 20e',
                'start_date'  => now()->addDays(20)->format('Y-m-d H:i:s'),
                'is_online'   => false,
                'max'         => 500,
                'organizer'   => 'cheikh.sarr@mouride-paris.test',
            ],
        ];

        foreach ($eventsData as $data) {
            if (Event::where('title', $data['title'])->exists()) {
                $this->command->line("    Déjà existant : {$data['title']} — ignoré");
                continue;
            }

            $organizer = $users->get($data['organizer']);
            if (!$organizer) continue;

            Event::create([
                'user_id'            => $organizer->id,
                'title'              => $data['title'],
                'description'        => $data['description'],
                'type'               => $data['type'],
                'city'               => $data['city'],
                'country'            => $data['country'],
                'location'           => $data['location'],
                'start_date'         => $data['start_date'],
                'participants_count' => rand(8, 45),
                'max_participants'   => $data['max'],
                'is_active'          => true,
                'is_online'          => $data['is_online'],
                'is_full'            => false,
            ]);

            $this->command->info("    ✓ {$data['title']}");
        }
    }

    private function createPosts($users, array $groups): void
    {
        $group = collect($groups)->first(fn($g) => $g?->slug === 'dahira-moustarchidine-paris');

        $postsData = [
            [
                'author'  => 'amadou.diop@mouride-paris.test',
                'content' => 'Alhamdoulilah ! Notre dahira a atteint l\'objectif de collecte pour le Grand Magal 2025 🎉 Merci à tous les frères et sœurs pour leur générosité et leur confiance. Que Serigne Touba nous bénisse tous ! 🕌',
                'type'    => 'text',
                'likes'   => 47,
                'comments'=> 12,
                'group_id'=> $group?->id,
            ],
            [
                'author'  => 'binta.ndiaye@mouride-paris.test',
                'content' => 'Les inscriptions pour les cours de wolof du samedi sont ouvertes ! 📚 Nous accueillons les enfants de 6 à 14 ans tous les samedis matin à Paris 10e. Les enfants de la diaspora ont le droit de connaître leur langue maternelle. Contactez-moi en message privé.',
                'type'    => 'text',
                'likes'   => 89,
                'comments'=> 23,
                'group_id'=> null,
            ],
            [
                'author'  => 'serigne.fall@mouride-paris.test',
                'content' => 'Rappel : tous les membres qui ont des problèmes administratifs (titre de séjour, naturalisation, démarches CAF) peuvent me contacter. Je propose des consultations gratuites pour la communauté le premier samedi du mois. 🤝 #SolidaritéMouride',
                'type'    => 'text',
                'likes'   => 156,
                'comments'=> 34,
                'group_id'=> null,
            ],
            [
                'author'  => 'ibrahima.ba@mouride-paris.test',
                'content' => 'Nouveau menu spécial Magal au restaurant cette semaine 🍲 Thiéboudienne au poisson, mafé agneau, yassa poulet et ceebu jën. Réservations au 📞 ou en DM. Bienvenue à tous les frères et sœurs ! 🇸🇳',
                'type'    => 'text',
                'likes'   => 73,
                'comments'=> 18,
                'group_id'=> null,
            ],
            [
                'author'  => 'omar.gaye@mouride-paris.test',
                'content' => 'Je cherche des développeurs web/mobile dans la communauté pour un projet de plateforme d\'entraide mouride. Le projet est bénévole mais avec de belles perspectives. Qui est partant ? 💻 #TechMouride',
                'type'    => 'text',
                'likes'   => 38,
                'comments'=> 27,
                'group_id'=> null,
            ],
            [
                'author'  => 'mariama.sow@mouride-paris.test',
                'content' => 'Aide aux déclarations fiscales pour les membres de la communauté 💼 C\'est la période de déclaration d\'impôts. Si vous avez besoin d\'aide pour comprendre votre avis ou remplir votre déclaration, n\'hésitez pas à me solliciter. Service gratuit pour la communauté.',
                'type'    => 'text',
                'likes'   => 112,
                'comments'=> 41,
                'group_id'=> null,
            ],
            [
                'author'  => 'fatou.mbaye@mouride-paris.test',
                'content' => 'Rappel de santé pour la communauté 🌿 Le printemps est là — pensez à votre bilan de santé annuel ! En tant qu\'infirmière, je recommande particulièrement le dépistage du diabète et de l\'hypertension, plus fréquents dans notre communauté. Alhamdoulilah pour la santé !',
                'type'    => 'text',
                'likes'   => 94,
                'comments'=> 15,
                'group_id'=> null,
            ],
            [
                'author'  => 'moussa.cisse@mouride-paris.test',
                'content' => 'Le Forum Entrepreneurs Mourides Paris 2025 est officiel ! 🚀 Plus de 50 entrepreneurs inscrits, des investisseurs confirmés, des tables rondes inspirantes. C\'est l\'événement de l\'année pour notre communauté business. Inscriptions ouvertes sur le lien en bio.',
                'type'    => 'text',
                'likes'   => 203,
                'comments'=> 56,
                'group_id'=> null,
            ],
            [
                'author'  => 'aissatou.diallo@mouride-paris.test',
                'content' => 'Je finalise ma thèse sur "Le droit international face aux migrations climatiques" 📖 Si des membres de la communauté ont des expériences de migration à partager (anonymement), je serais très reconnaissante. Mourid Connect me permet de toucher notre diaspora mondiale. Barakallahu fikoum !',
                'type'    => 'text',
                'likes'   => 67,
                'comments'=> 19,
                'group_id'=> null,
            ],
            [
                'author'  => 'cheikh.sarr@mouride-paris.test',
                'content' => 'Concert organisé ! 🎵 Soirée mbalax & culture sénégalaise à La Bellevilloise (Paris 20e). Musique live, expo artisanale, gastronomie. Les bénéfices iront à la dahira. Places limitées — réservez tôt ! Lien en bio. 🕌🎶',
                'type'    => 'text',
                'likes'   => 145,
                'comments'=> 33,
                'group_id'=> null,
            ],
            // Posts de groupe
            [
                'author'  => 'amadou.diop@mouride-paris.test',
                'content' => 'Réunion mensuelle de la Dahira Moustarchidine ce dimanche à 15h. Ordre du jour : préparation Magal, collecte en cours, accueil nouveaux membres. Soyez nombreux ! 🕌',
                'type'    => 'text',
                'likes'   => 34,
                'comments'=> 8,
                'group_id'=> $group?->id,
            ],
            [
                'author'  => 'mariama.sow@mouride-paris.test',
                'content' => 'Collecte pour la dahira : nous avons atteint 78% de l\'objectif ! 💰 Il nous reste 3 semaines. Chaque contribution compte. Barakhallahu fikoum pour votre générosité.',
                'type'    => 'text',
                'likes'   => 28,
                'comments'=> 6,
                'group_id'=> $group?->id,
            ],
        ];

        foreach ($postsData as $data) {
            $author = $users->get($data['author']);
            if (!$author) continue;

            // Vérifier si ce post existe déjà (par contenu tronqué)
            $snippet = substr($data['content'], 0, 50);
            if (Post::where('user_id', $author->id)->where('content', 'like', $snippet . '%')->exists()) {
                $this->command->line("    Post déjà existant — ignoré");
                continue;
            }

            Post::create([
                'user_id'        => $author->id,
                'group_id'       => $data['group_id'] ?? null,
                'content'        => $data['content'],
                'type'           => $data['type'],
                'likes_count'    => $data['likes'],
                'comments_count' => $data['comments'],
                'is_active'      => true,
                'is_pinned'      => false,
            ]);
        }

        $this->command->info('    ✓ ' . count($postsData) . ' posts créés');
    }
}
