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
            $table->string('pemohoniii');
            $table->string('pemohoniv');
            $table->string('email_pemohonii')->nullable();
            $table->string('email_pemohoniii')->nullable();
            $table->string('email_pemohoniv')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perkaras', function (Blueprint $table) {
            //
        });
    }
};
