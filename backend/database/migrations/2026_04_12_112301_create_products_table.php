<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            // Clé étrangère → shops
            $table->foreignId('shop_id')
                  ->constrained()
                  ->onDelete('cascade');    // Si boutique supprimée → produits supprimés

            // Clé étrangère → categories
            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('restrict');   // Ne peut pas supprimer une catégorie avec produits

            // Infos produit
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('specifications')->nullable(); // JSON ou texte

            // Prix — TOUJOURS en FCFA comme référence
            // La conversion €/$etc se fait dans le Resource
            $table->decimal('price', 12, 2);           // Ex: 3500.00 FCFA
            $table->decimal('price_promo', 12, 2)
                  ->nullable();                         // Prix promo optionnel
            $table->string('unit')->default('unité');   // unité, kg, litre, lot...

            // Stock
            $table->integer('stock')->default(0);
            $table->integer('min_order')->default(1);   // Commande minimum

            // Livraison
            $table->string('delivery_zones')->nullable(); // "France,Italie,Sénégal"
            $table->string('delivery_delay')->nullable(); // "3-5 jours ouvrés"
            $table->boolean('delivery_free')->default(false);

            // Statut
            $table->boolean('is_available')->default(true);
            $table->boolean('is_featured')->default(false); // Mis en avant
            $table->boolean('is_active')->default(true);

            // Stats
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('contacts_count')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};