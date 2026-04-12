<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {

            $table->id();

            // Clé étrangère → users
            $table->foreignId('user_id')
                  ->constrained()           // → users.id automatiquement
                  ->onDelete('cascade');    // Si user supprimé → boutique supprimée

            // Infos boutique
            $table->string('name');
            $table->string('slug')->unique();     // URL : "baay-fall-textiles"
            $table->text('description')->nullable();

            // Médias
            $table->string('logo')->nullable();
            $table->string('cover_image')->nullable();

            // Localisation
            $table->string('country', 10)->default('SN');
            $table->string('city')->nullable();
            $table->text('address')->nullable();

            // Contact
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            // Niveau de la boutique
            $table->enum('level', [
                'basic',    // Gratuit — 10 produits max
                'pro',      // 4,99€/mois — illimité
                'premium'   // 9,99€/mois — illimité + mise en avant
            ])->default('basic');

            // Vérification
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);

            // Stats (mis à jour automatiquement)
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('contacts_count')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};