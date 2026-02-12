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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('nom_pere');
    $table->string('prenom_pere');
    $table->string('contact_pere')->nullable();
    $table->string('email_pere')->nullable();
    $table->string('profession_pere')->nullable();
    $table->string('quartier_pere')->nullable();
    $table->string('nom_mere');
    $table->string('prenom_mere');
    $table->string('contact_mere')->nullable();
    $table->string('email_mere')->nullable();
    $table->string('profession_mere')->nullable();
    $table->string('quartier_mere')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
