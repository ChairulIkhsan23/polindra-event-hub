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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('lokasi');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->integer('kapasitas')->default(0);
            $table->enum('status', ['draft', 'menunggu', 'disetujui', 'ditolak', 'selesai'])->default('draft');
            $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
            $table->string('lampiran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
