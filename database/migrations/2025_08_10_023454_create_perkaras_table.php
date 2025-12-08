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
        Schema::create('perkaras', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('noperkara');
            $table->string('pemohon');
            $table->string('tergugat');
            $table->string('kuasa_hukum')->nullable();
            $table->string('lokasi_pemohon')->nullable();
            $table->string('lokasi_tergugat')->nullable();
            $table->string('email_pemohon')->nullable();
            $table->string('email_tergugat')->nullable();
            $table->text('keterangan')->nullable();

            $table->date('tanggal_pendaftaran')->nullable();
            $table->string('jenisHakim')->nullable();
            $table->string('hakimTunggal')->nullable();
            $table->string('jadwal')->nullable();
            $table->string('paniteraPengganti')->nullable();
            $table->string('juruSita')->nullable();
            $table->timestamps();
        });
        // 10 field
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkaras');
    }
};
