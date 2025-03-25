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
        Schema::create('absensi_hadirs', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->date('hari_tanggal');
            $table->string('username');
            $table->foreignId('role_id');
            $table->bigInteger('kelas');
            $table->string('jurusan');
            $table->boolean('status')->default(false);
            $table->time('waktu_datang');
            $table->time('waktu_pulang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_hadirs');
    }
};
