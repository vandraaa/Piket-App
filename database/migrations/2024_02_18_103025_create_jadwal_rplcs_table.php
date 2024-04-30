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
        Schema::create('jadwal_rplcs', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->string('siswa_1');
            $table->string('siswa_2');
            $table->string('siswa_3');
            $table->string('siswa_4');
            $table->string('siswa_5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_rplcs');
    }
};
