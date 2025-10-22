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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
            $table->enum('status', ['terdaftar', 'hadir', 'tidak_hadir'])->default('terdaftar');
            $table->string('kode_qr')->unique();
            $table->timestamp('check_in_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
