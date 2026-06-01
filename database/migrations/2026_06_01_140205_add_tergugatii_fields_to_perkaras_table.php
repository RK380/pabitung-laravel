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
            $table->string('tergugatii');
            $table->string('tergugatiii');
            $table->string('tergugativ');
            $table->string('email_tergugatii')->nullable();
            $table->string('email_tergugatiii')->nullable();
            $table->string('email_tergugativ')->nullable();
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
