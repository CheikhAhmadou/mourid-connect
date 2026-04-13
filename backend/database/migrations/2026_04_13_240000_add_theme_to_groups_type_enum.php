<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Ajoute 'theme' à l'enum type de la table groups.
 * Idempotente : vérifie d'abord si 'theme' est déjà présent.
 */
return new class extends Migration
{
    public function up(): void
    {
        // Lire l'enum actuel
        $row = DB::selectOne(
            "SELECT COLUMN_TYPE FROM information_schema.COLUMNS
             WHERE TABLE_SCHEMA = DATABASE()
               AND TABLE_NAME   = 'groups'
               AND COLUMN_NAME  = 'type'"
        );

        if ($row && str_contains($row->COLUMN_TYPE, "'theme'")) {
            return; // déjà présent
        }

        DB::statement(
            "ALTER TABLE groups MODIFY COLUMN type
             ENUM('dahira','city','country','theme','interest','general')
             DEFAULT 'general'"
        );
    }

    public function down(): void
    {
        DB::statement(
            "ALTER TABLE groups MODIFY COLUMN type
             ENUM('dahira','city','country','interest','general')
             DEFAULT 'general'"
        );
    }
};
