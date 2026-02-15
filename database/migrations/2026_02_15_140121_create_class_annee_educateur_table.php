<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_annee_educateur', function (Blueprint $table) {
            $table->id();

            // Clés étrangères
            $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade');
            $table->foreignId('annee_id')->constrained('annees')->onDelete('cascade');
            $table->foreignId('educateur_id')->constrained('educateurs')->onDelete('cascade');

            $table->timestamps();

            // Pour éviter les doublons
            $table->unique(['classe_id', 'annee_id', 'educateur_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_annee_educateur');
    }
};
