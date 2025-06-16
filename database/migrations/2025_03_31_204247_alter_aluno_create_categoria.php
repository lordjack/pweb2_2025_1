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
        Schema::create('categoria_alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80);
            $table->string('nivel', 40)->nullable();
            $table->timestamps();
        });

        Schema::disableForeignKeyConstraints();

        Schema::table('aluno', function (Blueprint $table) {
            $table->foreignId('categoria_id')
                ->after('telefone')
                ->constrained('categoria_alunos');
        });

        Schema::enableForeignKeyConstraints();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aluno', function (Blueprint $table) {
            //
        });
    }
};
