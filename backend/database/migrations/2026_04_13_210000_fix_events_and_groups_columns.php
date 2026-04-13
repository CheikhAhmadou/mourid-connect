<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Corrige les colonnes de events et groups pour correspondre aux modèles.
 *
 * events :
 *   organizer_id → user_id
 *   cover_photo  → cover
 *   starts_at    → start_date
 *   ends_at      → end_date
 *   location_name→ location
 *   attendees_count → participants_count
 *   is_published → is_active
 *   type enum    : ziarra/dahira/conference/cultural/sports/general
 *                → religious/cultural/professional/general
 *   drop: address, online_url, is_free, slug
 *   add : max_participants
 *
 * groups :
 *   cover_photo → cover
 *   is_public   → is_private  (valeur inversée)
 *   add: is_active
 *   type enum   : ajoute 'theme'
 *   drop: avatar, requires_approval
 */
return new class extends Migration
{
    public function up(): void
    {
        // ── EVENTS ──────────────────────────────────────────────────────
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('organizer_id',    'user_id');
            $table->renameColumn('cover_photo',     'cover');
            $table->renameColumn('starts_at',       'start_date');
            $table->renameColumn('ends_at',         'end_date');
            $table->renameColumn('location_name',   'location');
            $table->renameColumn('attendees_count', 'participants_count');
            $table->renameColumn('is_published',    'is_active');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['address', 'online_url', 'is_free', 'slug']);
            $table->unsignedInteger('max_participants')->nullable()->after('participants_count');
        });

        // Mettre à jour l'enum type (MySQL ne peut pas le faire via Blueprint seul)
        DB::statement("ALTER TABLE events MODIFY COLUMN type ENUM('religious','cultural','professional','general') DEFAULT 'general'");

        // ── GROUPS ──────────────────────────────────────────────────────
        Schema::table('groups', function (Blueprint $table) {
            $table->renameColumn('cover_photo', 'cover');
            $table->renameColumn('is_public',   'is_private');
        });

        // Inverser is_private (was is_public: 1=public → is_private: 0=not private)
        DB::statement('UPDATE groups SET is_private = NOT is_private');

        Schema::table('groups', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('posts_count');
            $table->dropColumn(['avatar', 'requires_approval']);
        });

        // Ajouter 'theme' à l'enum type des groupes
        DB::statement("ALTER TABLE groups MODIFY COLUMN type ENUM('dahira','city','country','theme','interest','general') DEFAULT 'general'");
    }

    public function down(): void
    {
        // EVENTS – inverse
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('user_id',            'organizer_id');
            $table->renameColumn('cover',              'cover_photo');
            $table->renameColumn('start_date',         'starts_at');
            $table->renameColumn('end_date',           'ends_at');
            $table->renameColumn('location',           'location_name');
            $table->renameColumn('participants_count', 'attendees_count');
            $table->renameColumn('is_active',          'is_published');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('max_participants');
            $table->string('address')->nullable();
            $table->string('online_url')->nullable();
            $table->boolean('is_free')->default(true);
            $table->string('slug')->nullable();
        });

        DB::statement("ALTER TABLE events MODIFY COLUMN type ENUM('ziarra','dahira','conference','cultural','sports','general') DEFAULT 'general'");

        // GROUPS – inverse
        Schema::table('groups', function (Blueprint $table) {
            $table->renameColumn('cover',      'cover_photo');
            $table->renameColumn('is_private', 'is_public');
        });

        DB::statement('UPDATE groups SET is_public = NOT is_public');

        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->string('avatar')->nullable();
            $table->boolean('requires_approval')->default(false);
        });

        DB::statement("ALTER TABLE groups MODIFY COLUMN type ENUM('dahira','city','country','interest','general') DEFAULT 'general'");
    }
};
