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
        Schema::disableForeignKeyConstraints();

        Schema::create('turma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('curso')->cascadeOnDelete();
            $table->string('nome',150);
            $table->string('codigo',20);
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turma');
    }
};
