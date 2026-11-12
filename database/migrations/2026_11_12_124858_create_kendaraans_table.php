<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nomor_polisi')->unique();
            $table->string('jenis_kendaraan');
            $table->string('nama_pemilik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};