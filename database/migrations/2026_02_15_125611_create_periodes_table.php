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
        Schema::create('periodes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('annee_id')->constrained('annees')->onDelete('cascade'); // lien vers l'année
    $table->string('libelle'); // Exemple : "Trimestre 1" ou "Semestre 2"
    $table->date('debut');
    $table->date('fin');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodes');
    }
};
