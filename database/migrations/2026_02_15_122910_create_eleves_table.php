<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
Schema::create('eleves', function (Blueprint $table) {
    $table->id();
    $table->string('matricule');
    $table->string('nom');
    $table->string('prenom');
    $table->string('contact');
    $table->string('email')->nullable();
    $table->string('quartier')->nullable();
    $table->timestamps();
// cle etrangere
     $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
