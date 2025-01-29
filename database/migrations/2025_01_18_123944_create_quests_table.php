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
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->string('description')->comment('Описание квеста');
            $table->string('preview_image')->nullable()->comment('Изображение квеста');

            // Внешний ключ для skill_id
            $table->unsignedBigInteger('skill_id')->nullable()->comment('ID навыка, связанного с квестом');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('set null');

            // Внешний ключ для character_id
            $table->unsignedBigInteger('character_id')->comment('ID игрового героя, связанного с квестом');
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');

            $table->enum('difficulty', ['easy', 'normal', 'hard', 'extreme'])->default('easy')->comment('Сложность квеста');
            $table->enum('status', ['active', 'finished', 'cancelled'])->default('active')->comment('Статус квеста');
            $table->enum('characteristic', ['strength', 'intelligence', 'health', 'creativity'])->comment('Характеристика, связанная с квестом');

            $table->timestamps();


            $table->index('skill_id');
            $table->index('character_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quests');
    }
};
