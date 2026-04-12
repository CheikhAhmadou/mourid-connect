<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {

            $table->id();

            // Clé étrangère → products
            $table->foreignId('product_id')
                  ->constrained()
                  ->onDelete('cascade');    // Si produit supprimé → images supprimées

            $table->string('url');                     // Chemin fichier: "products/img.jpg"
            $table->string('url_thumbnail')->nullable(); // Version miniature
            $table->boolean('is_main')->default(false);  // Image principale
            $table->integer('order')->default(0);        // Ordre d'affichage
            $table->string('alt_text')->nullable();      // Texte alternatif SEO

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};