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
        Schema::create('pulang_eksklusif', function (Blueprint $table) {
            $table->id();
            $table->string('user_uid');
            $table->foreign('user_uid')->references('uid')->on('users');
            $table->string('hari');
            $table->boolean('status')->default(false);
            $table->time('waktu_pulang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pulang_eksklusif');
    }
};
