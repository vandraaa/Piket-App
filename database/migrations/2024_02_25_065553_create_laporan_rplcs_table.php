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
        Schema::create('laporan_rplcs', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal')->nullable();
            $table->string('hari');
            $table->string('status_1')->nullable();
            $table->string('siswa_1');
            $table->string('status_2')->nullable();
            $table->string('siswa_2');
            $table->string('status_3')->nullable();
            $table->string('siswa_3');
            $table->string('status_4')->nullable();
            $table->string('siswa_4');
            $table->string('status_5')->nullable();
            $table->string('siswa_5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_rplcs');
    }
};
