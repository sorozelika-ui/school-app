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
        Schema::table('parent_eleves', function (Blueprint $table) {
            $table->string('pass_pere')->after('email_pere');
            $table->string('pass_mere')->after('email_mere');
        });
    }

    public function down(): void
    {
        Schema::table('parent_eleves', function (Blueprint $table) {
            $table->dropColumn(['pass_pere', 'pass_mere']);
        });
    }
};
