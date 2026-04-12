<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();                          // BIGINT UNSIGNED AUTO_INCREMENT PK

            // Infos personnelles
            $table->string('name');                // VARCHAR(255)
            $table->string('email')->unique();     // UNIQUE
            $table->string('password');            // Hashé par bcrypt
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();  // Chemin image

            // Localisation
            $table->string('country', 10)->default('SN'); // Code pays ISO
            $table->string('city')->nullable();

            // Rôle
            $table->enum('role', [
                'admin',
                'vendeur',
                'acheteur'
            ])->default('acheteur');

            // Vérification
            $table->boolean('is_verified')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->timestamps(); // created_at + updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};