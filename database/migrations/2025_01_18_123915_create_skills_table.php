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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('character_id');
            $table->string('preview_image')->nullable();
            $table->integer('level')->default(0);
            $table->integer('experience')->default(0);
            $table->timestamps();

            $table->foreign('character_id')->references('id')->on('characters');
            $table->index('character_id');
            $table->unique(['character_id', 'title']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
