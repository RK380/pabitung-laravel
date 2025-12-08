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
        Schema::table('perkaras', function (Blueprint $table) {
            $table->string('jenisHakim')->nullable();
            $table->string('hakimTunggal')->nullable();
            $table->date('jadwal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perkaras', function (Blueprint $table) {
            $table->dropColumn(['jenisHakim', 'hakimTunggal', 'jadwal']);
        });
    }
};
