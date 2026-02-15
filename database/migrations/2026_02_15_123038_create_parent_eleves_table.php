<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parent_eleves', function (Blueprint $table) {
            $table->id();

            // Infos du père
            $table->string('nom_pere');
            $table->string('prenom_pere');
            $table->string('contact_pere');
            $table->string('email_pere')->nullable();
            $table->string('pass_pere')->nullable();
            $table->string('quartier_pere')->nullable();
            $table->string('profession_pere')->nullable();

            // Infos de la mère
            $table->string('nom_mere');
            $table->string('prenom_mere');
            $table->string('contact_mere');
            $table->string('email_mere')->nullable();
            $table->string('pass_mere')->nullable();
            $table->string('quartier_mere')->nullable();
            $table->string('profession_mere')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parent_eleves');
    }
};
