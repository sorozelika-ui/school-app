<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_prof_annee', function (Blueprint $table) {
            $table->id();

            // Clés étrangères
            $table->foreignId('professeur_id')->constrained('professeurs')->onDelete('cascade');
            $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade');
            $table->foreignId('annee_id')->constrained('annees')->onDelete('cascade');

            $table->timestamps();

            // Pour éviter les doublons
            $table->unique(['professeur_id', 'classe_id', 'annee_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_prof_annee');
    }
};
