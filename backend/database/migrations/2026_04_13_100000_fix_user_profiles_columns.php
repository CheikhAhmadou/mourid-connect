<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Corrige les colonnes de user_profiles pour correspondre au modèle UserProfile.
 * Migration originale utilisait : dahira, cover_photo, show_on_map, address, is_public
 * Le modèle attend : dahira_name, cover_image, is_visible_map, country, city, etc.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            // Renommages
            $table->renameColumn('dahira',      'dahira_name');
            $table->renameColumn('cover_photo', 'cover_image');
            $table->renameColumn('show_on_map', 'is_visible_map');
        });

        Schema::table('user_profiles', function (Blueprint $table) {
            // Suppression colonnes obsolètes
            $table->dropColumn(['address', 'is_public']);

            // Ajout colonnes manquantes
            $table->string('cheikh_ref')->nullable()->after('dahira_name');
            $table->string('country', 5)->nullable()->after('longitude');
            $table->string('city')->nullable()->after('country');
            $table->string('whatsapp')->nullable()->after('website');
            $table->boolean('is_available_help')->default(false)->after('is_visible_map');
        });
    }

    public function down(): void
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->renameColumn('dahira_name', 'dahira');
            $table->renameColumn('cover_image', 'cover_photo');
            $table->renameColumn('is_visible_map', 'show_on_map');
        });

        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropColumn(['cheikh_ref', 'country', 'city', 'whatsapp', 'is_available_help']);
            $table->string('address')->nullable();
            $table->boolean('is_public')->default(true);
        });
    }
};
