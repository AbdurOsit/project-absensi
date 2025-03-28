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
        Schema::create('waktus', function (Blueprint $table) {
            $table->id();
            $table->enum('hari',['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu']);
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waktus');
    }
};
