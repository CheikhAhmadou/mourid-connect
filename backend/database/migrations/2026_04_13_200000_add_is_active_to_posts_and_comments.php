<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Ajoute is_active aux tables posts et comments
 * (manquant dans les migrations originales mais présent dans les modèles).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('is_pinned');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('likes_count');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
