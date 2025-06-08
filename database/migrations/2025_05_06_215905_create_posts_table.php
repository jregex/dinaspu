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
            $table->string('title', 256);
            $table->string('slug', 256)->unique();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->text('body')->nullable();
            $table->string('image', 256)->default('default.png')->nullable();
            $table->boolean('published')->nullable();
            $table->string('penulis', 256)->nullable();
            $table->timestamps();
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
