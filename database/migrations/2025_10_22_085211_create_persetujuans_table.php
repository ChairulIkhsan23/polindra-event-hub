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
        Schema::create('persetujuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
            $table->foreignId('dosen_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['menunggu_persetujuan', 'disetujui', 'ditolak', 'selesai'])->default('menunggu_persetujuan');
            $table->text('catatan')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('signature_hash')->nullable();
            $table->string('signature_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuans');
    }
};
