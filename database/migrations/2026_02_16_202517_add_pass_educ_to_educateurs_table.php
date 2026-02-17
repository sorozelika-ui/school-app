<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('educateurs', function (Blueprint $table) {
            $table->string('pass_educ')->after('email'); // Ajoute la colonne après email
        });
    }

    public function down(): void
    {
        Schema::table('educateurs', function (Blueprint $table) {
            $table->dropColumn('pass_educ');
        });
    }
};
