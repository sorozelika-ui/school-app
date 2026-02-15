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
    Schema::table('eleves', function (Blueprint $table) {
        $table->string('matricule')->unique()->after('id');
        $table->date('date_naissance')->after('prenom');
    });
}

public function down(): void
{
    Schema::table('eleves', function (Blueprint $table) {
        $table->dropColumn(['matricule', 'date_naissance']);
    });
}

};
