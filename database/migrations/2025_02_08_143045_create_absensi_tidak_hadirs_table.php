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
            $table->id();
            $table->string('username');
            $table->foreignId('role_id');
            $table->string('kelas');
            $table->text('jurusan');
            // $table->string('hari');
            $table->string('hari');
            $table->date('tanggal');
            $table->string('alasan');
            $table->string('surat')->nullable();
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
