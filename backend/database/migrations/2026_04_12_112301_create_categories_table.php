<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->id();

            $table->string('name');               // Nom de la catégorie
            $table->string('slug')->unique();     // URL friendly : "mode-artisanat"
            $table->string('icon')->default('🛒'); // Emoji icône
            $table->text('description')->nullable();

            // Auto-référence : sous-catégories
            // Ex: "Vêtements" est parent de "Boubous"
            $table->foreignId('parent_id')
                  ->nullable()
                  ->constrained('categories')     // → categories.id
                  ->onDelete('set null');          // Si parent supprimé → null

            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0); // Ordre d'affichage

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};