<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('professeurs', function (Blueprint $table) {
            $table->string('pass_prof')->after('email'); // Ajoute la colonne après email
        });
    }

    public function down(): void
    {
        Schema::table('professeurs', function (Blueprint $table) {
            $table->dropColumn('pass_prof');
        });
    }
};
