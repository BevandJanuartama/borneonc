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
    Schema::create('logs', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');   // contoh: ADMINISTRATOR
        $table->string('ip_address');     // contoh: 103.47.133.78
        $table->string('info_aktifitas'); // contoh: Berhasil login ke aplikasi
        $table->timestamp('tanggal_kejadian'); 
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
