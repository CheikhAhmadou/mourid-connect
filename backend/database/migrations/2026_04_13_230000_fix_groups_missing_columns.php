<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Complète ce que 2026_04_13_210000 n'a pas pu finir :
 * - Ajoute is_active à groups (bloqué par l'erreur UPDATE précédente)
 * - Met à jour l'enum type de groups pour inclure 'theme'
 */
return new class extends Migration
{
    public function up(): void
    {
        // is_active manquant (l'UPDATE qui a planté a empêché la suite)
        if (!Schema::hasColumn('groups', 'is_active')) {
            Schema::table('groups', function (Blueprint $table) {
                $table->boolean('is_active')->default(true)->after('posts_count');
            });
        }

        // Ajouter 'theme' à l'enum type des groupes
        DB::statement("ALTER TABLE groups MODIFY COLUMN type ENUM('dahira','city','country','theme','interest','general') DEFAULT 'general'");
    }

    public function down(): void
    {
        if (Schema::hasColumn('groups', 'is_active')) {
            Schema::table('groups', function (Blueprint $table) {
                $table->dropColumn('is_active');
            });
        }

        DB::statement("ALTER TABLE groups MODIFY COLUMN type ENUM('dahira','city','country','interest','general') DEFAULT 'general'");
    }
};
