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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('sources');
            $table->enum('type', ['TV', 'MOVIE', 'OVA', 'ONA', 'SPECIAL', 'UNKNOWN']);
            $table->integer('episodes');
            $table->enum('status', ['FINISHED', 'ONGOING', 'UPCOMING', 'UNKNOWN']);
            $table->json('anime_season');
            $table->string('picture');
            $table->string('thumbnail');
            $table->json('synonyms');
            $table->json('related_anime');
            $table->json('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
