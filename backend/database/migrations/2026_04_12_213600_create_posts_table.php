<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('group_id')->nullable()->constrained()->nullOnDelete();

            $table->text('content')->nullable();
            $table->enum('type', ['text', 'photo', 'video', 'audio', 'link', 'event_share'])->default('text');
            $table->enum('visibility', ['public', 'followers', 'group', 'private'])->default('public');

            $table->string('link_url')->nullable();
            $table->string('link_title')->nullable();

            // Compteurs dénormalisés
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedInteger('comments_count')->default(0);
            $table->unsignedInteger('shares_count')->default(0);

            $table->boolean('is_pinned')->default(false);

            $table->timestamps();
            $table->index(['user_id', 'created_at']);
            $table->index(['group_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
