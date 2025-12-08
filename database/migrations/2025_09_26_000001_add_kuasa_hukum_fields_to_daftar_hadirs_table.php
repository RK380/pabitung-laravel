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
        Schema::table('daftar_hadirs', function (Blueprint $table) {
            $table->string('kuasa_hukum_pemohon')->nullable();
            $table->string('kuasa_hukum_tergugat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_hadirs', function (Blueprint $table) {
            $table->dropColumn(['kuasa_hukum_pemohon', 'kuasa_hukum_tergugat']);
        });
    }
};
