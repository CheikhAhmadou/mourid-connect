<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Follow;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Notification;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Interactions sociales de démonstration :
 * - Follows entre membres Paris + World
 * - Commentaires sur les posts
 * - Likes sur les posts (enregistrements réels)
 * - Participants aux événements
 * - Notifications pour amadou.diop (utilisateur test principal)
 *
 * Idempotent — ignore les doublons via firstOrCreate / exists().
 */
class SocialInteractionsSeeder extends Seeder
{
    // Tous les emails des membres de démo
    private array $parisEmails = [
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

    private array $worldEmails = [
        'mame.thiaw@mouride-world.test',
        'ibou.ngom@mouride-world.test',
        'rokhaya.diouf@mouride-world.test',
        'mamadou.sy@mouride-world.test',
        'ndeye.sall@mouride-world.test',
        'aliou.badji@mouride-world.test',
        'fatoumata.kane@mouride-world.test',
        'ousmane.faye@mouride-world.test',
        'adja.diallo@mouride-world.test',
        'modou.diallo@mouride-world.test',
        'yacine.mboup@mouride-world.test',
        'pape.ndao@mouride-world.test',
        'coumba.gueye@mouride-world.test',
        'assane.samb@mouride-world.test',
        'bineta.niang@mouride-world.test',
    ];

    public function run(): void
    {
        $allEmails = array_merge($this->parisEmails, $this->worldEmails);
        $users     = User::whereIn('email', $allEmails)->get()->keyBy('email');

        if ($users->isEmpty()) {
            $this->command->warn('  ⚠ Aucun membre de démo trouvé. Lancez ParisMembersSeeder et WorldMembersSeeder d\'abord.');
            return;
        }

        $this->command->info('  Création des follows...');
        $this->createFollows($users);

        $this->command->info('  Création des commentaires...');
        $this->createComments($users);

        $this->command->info('  Création des likes...');
        $this->createPostLikes($users);

        $this->command->info('  Création des participants aux événements...');
        $this->createEventParticipants($users);

        $this->command->info('  Ajout des membres mondiaux aux groupes...');
        $this->addWorldMembersToGroups($users);

        $this->command->info('  Création des notifications...');
        $this->createNotifications($users);

        $this->command->info("\n  ✓ Interactions sociales créées !");
    }

    // ─────────────────────────────────────────────────────────────────────
    // FOLLOWS
    // ─────────────────────────────────────────────────────────────────────
    private function createFollows($users): void
    {
        // Graphe de follows Paris ↔ Paris
        $parisPairs = [
            ['amadou.diop@mouride-paris.test',     'serigne.fall@mouride-paris.test'],
            ['amadou.diop@mouride-paris.test',     'binta.ndiaye@mouride-paris.test'],
            ['amadou.diop@mouride-paris.test',     'fatou.mbaye@mouride-paris.test'],
            ['amadou.diop@mouride-paris.test',     'mariama.sow@mouride-paris.test'],
            ['serigne.fall@mouride-paris.test',    'amadou.diop@mouride-paris.test'],
            ['serigne.fall@mouride-paris.test',    'moussa.cisse@mouride-paris.test'],
            ['serigne.fall@mouride-paris.test',    'aissatou.diallo@mouride-paris.test'],
            ['binta.ndiaye@mouride-paris.test',    'amadou.diop@mouride-paris.test'],
            ['binta.ndiaye@mouride-paris.test',    'mariama.sow@mouride-paris.test'],
            ['binta.ndiaye@mouride-paris.test',    'fatou.mbaye@mouride-paris.test'],
            ['omar.gaye@mouride-paris.test',       'moussa.cisse@mouride-paris.test'],
            ['omar.gaye@mouride-paris.test',       'serigne.fall@mouride-paris.test'],
            ['omar.gaye@mouride-paris.test',       'cheikh.sarr@mouride-paris.test'],
            ['mariama.sow@mouride-paris.test',     'amadou.diop@mouride-paris.test'],
            ['mariama.sow@mouride-paris.test',     'binta.ndiaye@mouride-paris.test'],
            ['ibrahima.ba@mouride-paris.test',     'moussa.cisse@mouride-paris.test'],
            ['ibrahima.ba@mouride-paris.test',     'cheikh.sarr@mouride-paris.test'],
            ['fatou.mbaye@mouride-paris.test',     'amadou.diop@mouride-paris.test'],
            ['fatou.mbaye@mouride-paris.test',     'binta.ndiaye@mouride-paris.test'],
            ['moussa.cisse@mouride-paris.test',    'serigne.fall@mouride-paris.test'],
            ['moussa.cisse@mouride-paris.test',    'omar.gaye@mouride-paris.test'],
            ['moussa.cisse@mouride-paris.test',    'ibrahima.ba@mouride-paris.test'],
            ['aissatou.diallo@mouride-paris.test', 'amadou.diop@mouride-paris.test'],
            ['aissatou.diallo@mouride-paris.test', 'serigne.fall@mouride-paris.test'],
            ['cheikh.sarr@mouride-paris.test',     'moussa.cisse@mouride-paris.test'],
            ['cheikh.sarr@mouride-paris.test',     'ibrahima.ba@mouride-paris.test'],
        ];

        // Membres mondiaux → membres parisiens (influenceurs)
        $worldToParisInfluencers = [
            'amadou.diop@mouride-paris.test',
            'serigne.fall@mouride-paris.test',
            'moussa.cisse@mouride-paris.test',
            'binta.ndiaye@mouride-paris.test',
            'fatou.mbaye@mouride-paris.test',
        ];

        $worldFollowParis = [
            ['mame.thiaw@mouride-world.test',     'amadou.diop@mouride-paris.test'],
            ['mame.thiaw@mouride-world.test',     'binta.ndiaye@mouride-paris.test'],
            ['ibou.ngom@mouride-world.test',      'moussa.cisse@mouride-paris.test'],
            ['ibou.ngom@mouride-world.test',      'omar.gaye@mouride-paris.test'],
            ['rokhaya.diouf@mouride-world.test',  'amadou.diop@mouride-paris.test'],
            ['rokhaya.diouf@mouride-world.test',  'fatou.mbaye@mouride-paris.test'],
            ['mamadou.sy@mouride-world.test',     'moussa.cisse@mouride-paris.test'],
            ['mamadou.sy@mouride-world.test',     'serigne.fall@mouride-paris.test'],
            ['ndeye.sall@mouride-world.test',     'binta.ndiaye@mouride-paris.test'],
            ['ndeye.sall@mouride-world.test',     'fatou.mbaye@mouride-paris.test'],
            ['aliou.badji@mouride-world.test',    'serigne.fall@mouride-paris.test'],
            ['fatoumata.kane@mouride-world.test', 'omar.gaye@mouride-paris.test'],
            ['ousmane.faye@mouride-world.test',   'omar.gaye@mouride-paris.test'],
            ['ousmane.faye@mouride-world.test',   'moussa.cisse@mouride-paris.test'],
            ['adja.diallo@mouride-world.test',    'amadou.diop@mouride-paris.test'],
            ['modou.diallo@mouride-world.test',   'ibrahima.ba@mouride-paris.test'],
            ['yacine.mboup@mouride-world.test',   'serigne.fall@mouride-paris.test'],
            ['assane.samb@mouride-world.test',    'ibrahima.ba@mouride-paris.test'],
            ['bineta.niang@mouride-world.test',   'amadou.diop@mouride-paris.test'],
            ['bineta.niang@mouride-world.test',   'binta.ndiaye@mouride-paris.test'],
            ['coumba.gueye@mouride-world.test',   'cheikh.sarr@mouride-paris.test'],
            ['pape.ndao@mouride-world.test',      'moussa.cisse@mouride-paris.test'],
        ];

        $allPairs = array_merge($parisPairs, $worldFollowParis);
        $count    = 0;

        foreach ($allPairs as [$followerEmail, $followingEmail]) {
            $follower  = $users->get($followerEmail);
            $following = $users->get($followingEmail);
            if (!$follower || !$following) continue;

            Follow::firstOrCreate([
                'follower_id'  => $follower->id,
                'following_id' => $following->id,
            ]);
            $count++;
        }

        $this->command->info("    ✓ {$count} follows créés");
    }

    // ─────────────────────────────────────────────────────────────────────
    // COMMENTAIRES
    // ─────────────────────────────────────────────────────────────────────
    private function createComments($users): void
    {
        $posts = Post::all();
        if ($posts->isEmpty()) {
            $this->command->warn('    ⚠ Aucun post trouvé — lancez ConnectContentSeeder d\'abord');
            return;
        }

        // Banque de commentaires réalistes
        $commentBank = [
            'Alhamdoulilah ! Que Serigne Touba bénisse cette initiative 🕌',
            'Barakhallahu fikoum frère, c\'est exactement ce dont notre communauté a besoin.',
            'Magnifique nouvelle ! Je partage avec tous mes proches. 🤲',
            'Ma sha Allah, vous êtes un exemple pour toute la diaspora mouride.',
            'Très bonne initiative, je suis disponible pour aider si besoin. N\'hésitez pas à me contacter.',
            'C\'est exactement pourquoi j\'ai rejoint Mourid Connect. Tellement de belles personnes ici.',
            'Ameen ! Que Allah accepte vos efforts et vous récompense au centuple.',
            'Incroyable travail, continuez ainsi. La communauté mouride est une force.',
            'Je suis très touché par cette solidarité. Voilà la vraie valeur de notre dahira.',
            'Nous sommes avec vous ! La dahira de Montréal envoie ses prières. 🇨🇦',
            'Message reçu, je transmets à notre groupe WhatsApp. Jazakallahu khayran !',
            'Cette plateforme est une bénédiction pour notre communauté dispersée aux 4 coins du monde.',
            'Bienvenue à tous les nouveaux membres ! La communauté mouride de Paris vous accueille 🤝',
            'C\'est inspirant. Nous avons besoin de plus de leaders comme vous dans notre communauté.',
            'Quel beau programme ! J\'inscris mes enfants dès demain. Barakallahu fikoum.',
            'Très utile comme information, merci de partager. Que Allah vous guide toujours.',
            'Je suis de Dakar et je suis impressionné par le dynamisme de la diaspora mouride en France.',
            'Mourid Connect est vraiment une révolution pour notre communauté. Longue vie à cette plateforme !',
            'On sera là en nombre ! Rendez-vous à tous le jour J. 💪',
            'Subhana Allah, c\'est une grande chance d\'avoir des personnes aussi engagées parmi nous.',
        ];

        $commenters  = $users->values()->shuffle();
        $totalCreated = 0;

        foreach ($posts as $post) {
            // 2 à 4 commentaires par post
            $count = rand(2, 4);
            $used  = [];

            for ($i = 0; $i < $count; $i++) {
                $commenter = $commenters->random();

                // Éviter que l'auteur commente son propre post ou doublon
                if ($commenter->id === $post->user_id) continue;

                $exists = Comment::where('post_id', $post->id)
                    ->where('user_id', $commenter->id)
                    ->exists();
                if ($exists) continue;

                Comment::create([
                    'post_id'    => $post->id,
                    'user_id'    => $commenter->id,
                    'content'    => $commentBank[array_rand($commentBank)],
                    'likes_count'=> rand(0, 8),
                ]);
                $totalCreated++;
            }
        }

        $this->command->info("    ✓ {$totalCreated} commentaires créés");
    }

    // ─────────────────────────────────────────────────────────────────────
    // LIKES
    // ─────────────────────────────────────────────────────────────────────
    private function createPostLikes($users): void
    {
        $reactions = ['like', 'love', 'amen', 'baraka'];
        $posts     = Post::all();
        $userList  = $users->values();
        $count     = 0;

        foreach ($posts as $post) {
            // 4 à 8 likers par post
            $likers = $userList->shuffle()->take(rand(4, 8));

            foreach ($likers as $liker) {
                if ($liker->id === $post->user_id) continue;

                PostLike::firstOrCreate(
                    ['post_id' => $post->id, 'user_id' => $liker->id],
                    ['reaction' => $reactions[array_rand($reactions)]]
                );
                $count++;
            }
        }

        $this->command->info("    ✓ {$count} likes créés");
    }

    // ─────────────────────────────────────────────────────────────────────
    // PARTICIPANTS ÉVÉNEMENTS
    // ─────────────────────────────────────────────────────────────────────
    private function createEventParticipants($users): void
    {
        $events   = Event::all();
        $userList = $users->values();
        $statuses = ['going', 'going', 'going', 'maybe']; // 75 % going
        $count    = 0;

        foreach ($events as $event) {
            // 8 à 15 participants par événement
            $participants = $userList->shuffle()->take(rand(8, 15));

            foreach ($participants as $participant) {
                if ($participant->id === $event->user_id) continue;

                $created = EventParticipant::firstOrCreate(
                    ['event_id' => $event->id, 'user_id' => $participant->id],
                    ['status'   => $statuses[array_rand($statuses)]]
                );

                if ($created->wasRecentlyCreated) $count++;
            }

            // Mettre à jour participants_count
            $event->update([
                'participants_count' => EventParticipant::where('event_id', $event->id)
                    ->where('status', 'going')
                    ->count(),
            ]);
        }

        $this->command->info("    ✓ {$count} participants créés");
    }

    // ─────────────────────────────────────────────────────────────────────
    // MEMBRES MONDIAUX → GROUPES
    // ─────────────────────────────────────────────────────────────────────
    private function addWorldMembersToGroups($users): void
    {
        // Ajouter des membres mondiaux aux groupes existants
        $assignments = [
            'mourides-de-france' => [
                'mame.thiaw@mouride-world.test',
                'ibou.ngom@mouride-world.test',
                'mamadou.sy@mouride-world.test',
                'aliou.badji@mouride-world.test',
                'ousmane.faye@mouride-world.test',
                'modou.diallo@mouride-world.test',
                'assane.samb@mouride-world.test',
            ],
            'entrepreneurs-mourides' => [
                'mamadou.sy@mouride-world.test',
                'pape.ndao@mouride-world.test',
                'ibou.ngom@mouride-world.test',
                'ousmane.faye@mouride-world.test',
            ],
            'mourides-paris-sante-entraide' => [
                'rokhaya.diouf@mouride-world.test',
                'ndeye.sall@mouride-world.test',
                'adja.diallo@mouride-world.test',
                'bineta.niang@mouride-world.test',
            ],
        ];

        $count = 0;
        foreach ($assignments as $groupSlug => $emails) {
            $group = Group::where('slug', $groupSlug)->first();
            if (!$group) continue;

            foreach ($emails as $email) {
                $user = $users->get($email);
                if (!$user) continue;

                $created = GroupMember::firstOrCreate(
                    ['group_id' => $group->id, 'user_id' => $user->id],
                    ['role'     => 'member']
                );

                if ($created->wasRecentlyCreated) {
                    $count++;
                    $group->increment('members_count');
                }
            }
        }

        $this->command->info("    ✓ {$count} nouveaux membres de groupes ajoutés");
    }

    // ─────────────────────────────────────────────────────────────────────
    // NOTIFICATIONS
    // ─────────────────────────────────────────────────────────────────────
    private function createNotifications($users): void
    {
        // Destinataire principal : amadou.diop (utilisateur test)
        $recipient = $users->get('amadou.diop@mouride-paris.test');
        if (!$recipient) return;

        // Ne pas créer si des notifications existent déjà
        if (Notification::where('user_id', $recipient->id)->count() >= 5) {
            $this->command->line('    Notifications déjà existantes — ignorées');
            return;
        }

        $actors = [
            $users->get('moussa.cisse@mouride-paris.test'),
            $users->get('serigne.fall@mouride-paris.test'),
            $users->get('binta.ndiaye@mouride-paris.test'),
            $users->get('mame.thiaw@mouride-world.test'),
            $users->get('ibou.ngom@mouride-world.test'),
        ];

        $event = Event::first();

        $notifications = [
            [
                'type' => 'App\\Notifications\\NewFollower',
                'data' => [
                    'actor_id'   => $actors[0]?->id,
                    'actor_name' => $actors[0]?->name,
                    'text'       => "{$actors[0]?->name} vous suit maintenant.",
                    'link'       => '/connect/carte',
                    'icon'       => 'person_add',
                ],
                'read_at' => null,
            ],
            [
                'type' => 'App\\Notifications\\NewFollower',
                'data' => [
                    'actor_id'   => $actors[3]?->id,
                    'actor_name' => $actors[3]?->name,
                    'text'       => "{$actors[3]?->name} (Dakar) vous suit maintenant.",
                    'link'       => '/connect/carte',
                    'icon'       => 'person_add',
                ],
                'read_at' => null,
            ],
            [
                'type' => 'App\\Notifications\\PostLiked',
                'data' => [
                    'actor_id'   => $actors[1]?->id,
                    'actor_name' => $actors[1]?->name,
                    'text'       => "{$actors[1]?->name} a aimé votre publication.",
                    'link'       => '/connect',
                    'icon'       => 'favorite',
                ],
                'read_at' => null,
            ],
            [
                'type' => 'App\\Notifications\\PostCommented',
                'data' => [
                    'actor_id'   => $actors[2]?->id,
                    'actor_name' => $actors[2]?->name,
                    'text'       => "{$actors[2]?->name} a commenté votre publication.",
                    'link'       => '/connect',
                    'icon'       => 'chat_bubble',
                ],
                'read_at' => null,
            ],
            [
                'type' => 'App\\Notifications\\EventReminder',
                'data' => [
                    'event_id'   => $event?->id,
                    'event_title'=> $event?->title,
                    'text'       => "Rappel : \"{$event?->title}\" commence bientôt.",
                    'link'       => '/connect/evenements',
                    'icon'       => 'event',
                ],
                'read_at' => now()->subHours(2),
            ],
            [
                'type' => 'App\\Notifications\\GroupInvite',
                'data' => [
                    'actor_id'   => $actors[0]?->id,
                    'actor_name' => $actors[0]?->name,
                    'text'       => "{$actors[0]?->name} vous a invité dans «\u{202F}Entrepreneurs Mourides\u{202F}».",
                    'link'       => '/connect/groupes',
                    'icon'       => 'group_add',
                ],
                'read_at' => now()->subDay(),
            ],
            [
                'type' => 'App\\Notifications\\NewFollower',
                'data' => [
                    'actor_id'   => $actors[4]?->id,
                    'actor_name' => $actors[4]?->name,
                    'text'       => "{$actors[4]?->name} (Dakar) vous suit maintenant.",
                    'link'       => '/connect/carte',
                    'icon'       => 'person_add',
                ],
                'read_at' => now()->subDays(2),
            ],
        ];

        foreach ($notifications as $notifData) {
            Notification::create([
                'id'      => (string) Str::uuid(),
                'user_id' => $recipient->id,
                'type'    => $notifData['type'],
                'data'    => json_encode($notifData['data']),
                'read_at' => $notifData['read_at'],
            ]);
        }

        $this->command->info('    ✓ ' . count($notifications) . ' notifications créées pour amadou.diop');
    }
}
