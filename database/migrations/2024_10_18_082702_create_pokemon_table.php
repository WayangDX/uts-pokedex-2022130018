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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // required, string, max 255 characters
            $table->string('species', 100); // required, string, max 100 characters
            $table->string('primary_type', 50); // required, string, max 50 characters
            $table->decimal('weight', 8, 2)->default(0); // decimal, max 8 digits, 2 decimal places, default 0
            $table->decimal('height', 8, 2)->default(0); // decimal, max 8 digits, 2 decimal places, default 0
            $table->integer('hp')->default(0); // integer, max 4 digits, default 0
            $table->integer('attack')->default(0); // integer, max 4 digits, default 0
            $table->integer('defense')->default(0); // integer, max 4 digits, default 0
            $table->boolean('is_legendary')->default(false); // required, boolean, default false
            $table->binary('photo')->nullable(); // nullable, image, max 2048 kb, filetype jpeg/jpg/png/gif/svg
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
