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
        Schema::create('absensi_tidak_hadirs', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('username');
            $table->string('kelas');
            $table->foreignId('role_id');
            $table->text('jurusan');
            $table->date('hari_tanggal');
            $table->foreignId('alasan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_tidak_hadirs');
    }
};
