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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index('user_id');
            $table->integer('level')->default(0);
            $table->integer('experience')->default(0);
            $table->integer('gold')->default(0);
            $table->integer('health')->default(100);

            ///Attributes
            $table->integer('strength_level')->default(0);
            $table->integer('strength_experience')->default(0);
            $table->integer('intelligence_level')->default(0);
            $table->integer('intelligence_experience')->default(0);
            $table->integer('creativity_level')->default(0);
            $table->integer('creativity_experience')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
