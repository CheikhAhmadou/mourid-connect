<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Corrige les colonnes de events et groups pour correspondre aux modèles.
 * Entièrement idempotente : toutes les opérations sont protégées par hasColumn.
 */
return new class extends Migration
{
    public function up(): void
    {
        // ── EVENTS : renames ──────────────────────────────────────────────
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'organizer_id'))
                $table->renameColumn('organizer_id', 'user_id');
            if (Schema::hasColumn('events', 'cover_photo'))
                $table->renameColumn('cover_photo', 'cover');
            if (Schema::hasColumn('events', 'starts_at'))
                $table->renameColumn('starts_at', 'start_date');
            if (Schema::hasColumn('events', 'ends_at'))
                $table->renameColumn('ends_at', 'end_date');
            if (Schema::hasColumn('events', 'location_name'))
                $table->renameColumn('location_name', 'location');
            if (Schema::hasColumn('events', 'attendees_count'))
                $table->renameColumn('attendees_count', 'participants_count');
            if (Schema::hasColumn('events', 'is_published'))
                $table->renameColumn('is_published', 'is_active');
        });

        // ── EVENTS : drops & ajouts ───────────────────────────────────────
        Schema::table('events', function (Blueprint $table) {
            $toDrop = array_filter(
                ['address', 'online_url', 'is_free', 'slug'],
                fn($col) => Schema::hasColumn('events', $col)
            );
            if ($toDrop) $table->dropColumn(array_values($toDrop));

            if (!Schema::hasColumn('events', 'max_participants'))
                $table->unsignedInteger('max_participants')->nullable()->after('participants_count');
        });

        // Mise à jour enum type events
        DB::statement("ALTER TABLE events MODIFY COLUMN type ENUM('religious','cultural','professional','general') DEFAULT 'general'");

        // ── GROUPS : renames ──────────────────────────────────────────────
        Schema::table('groups', function (Blueprint $table) {
            if (Schema::hasColumn('groups', 'cover_photo'))
                $table->renameColumn('cover_photo', 'cover');
            if (Schema::hasColumn('groups', 'is_public'))
                $table->renameColumn('is_public', 'is_private');
        });

        // ── GROUPS : is_active & nettoyage ───────────────────────────────
        Schema::table('groups', function (Blueprint $table) {
            if (!Schema::hasColumn('groups', 'is_active'))
                $table->boolean('is_active')->default(true)->after('posts_count');

            $toDrop = array_filter(
                ['avatar', 'requires_approval'],
                fn($col) => Schema::hasColumn('groups', $col)
            );
            if ($toDrop) $table->dropColumn(array_values($toDrop));
        });

        // Mise à jour enum type groups
        DB::statement("ALTER TABLE groups MODIFY COLUMN type ENUM('dahira','city','country','theme','interest','general') DEFAULT 'general'");
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'user_id'))       $table->renameColumn('user_id', 'organizer_id');
            if (Schema::hasColumn('events', 'cover'))          $table->renameColumn('cover', 'cover_photo');
            if (Schema::hasColumn('events', 'start_date'))     $table->renameColumn('start_date', 'starts_at');
            if (Schema::hasColumn('events', 'end_date'))       $table->renameColumn('end_date', 'ends_at');
            if (Schema::hasColumn('events', 'location'))       $table->renameColumn('location', 'location_name');
            if (Schema::hasColumn('events', 'participants_count')) $table->renameColumn('participants_count', 'attendees_count');
            if (Schema::hasColumn('events', 'is_active'))      $table->renameColumn('is_active', 'is_published');
        });

        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'max_participants')) $table->dropColumn('max_participants');
            $table->string('address')->nullable();
            $table->string('online_url')->nullable();
            $table->boolean('is_free')->default(true);
            $table->string('slug')->nullable();
        });

        DB::statement("ALTER TABLE events MODIFY COLUMN type ENUM('ziarra','dahira','conference','cultural','sports','general') DEFAULT 'general'");

        Schema::table('groups', function (Blueprint $table) {
            if (Schema::hasColumn('groups', 'cover'))      $table->renameColumn('cover', 'cover_photo');
            if (Schema::hasColumn('groups', 'is_private')) $table->renameColumn('is_private', 'is_public');
        });

        Schema::table('groups', function (Blueprint $table) {
            if (Schema::hasColumn('groups', 'is_active')) $table->dropColumn('is_active');
            $table->string('avatar')->nullable();
            $table->boolean('requires_approval')->default(false);
        });

        DB::statement("ALTER TABLE groups MODIFY COLUMN type ENUM('dahira','city','country','interest','general') DEFAULT 'general'");
    }
};
