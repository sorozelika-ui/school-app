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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();

            // Clé étrangère vers l'élève
            $table->foreignId('eleve_id')->constrained('eleves')->onDelete('cascade');

            // Clé étrangère vers le professeur
            $table->foreignId('professeur_id')->constrained('professeurs')->onDelete('cascade');

            // Clé étrangère vers la matière
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade');

            // Note de l'élève
            $table->decimal('note', 5, 2); // ex: 15.50

            // Indique le trimestre ou semestre
            $table->string('periode')->nullable(); // "Trimestre 1" ou "Semestre 2"

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
