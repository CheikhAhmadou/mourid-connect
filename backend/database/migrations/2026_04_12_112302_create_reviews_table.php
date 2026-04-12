<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {

            $table->id();

            // Clés étrangères
            $table->foreignId('product_id')
                  ->constrained()
                  ->onDelete('cascade');   // Si produit supprimé → avis supprimés

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');   // Si user supprimé → avis supprimés

            // Avis
            $table->unsignedTinyInteger('rating'); // Note de 1 à 5
            $table->text('comment')->nullable();
            $table->boolean('is_verified_purchase')->default(false);

            // Un utilisateur = UN seul avis par produit
            $table->unique(['product_id', 'user_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};