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
        Schema::create('daftar_hadirs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nomor');
            $table->string('jenis_perkara');
            $table->string('penggugat');
            $table->string('tergugat');
            $table->longText('tanda_tangan')->nullable(); // base64 image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_hadirs');
    }
};
