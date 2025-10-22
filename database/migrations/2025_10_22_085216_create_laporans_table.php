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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
            $table->foreignId('dibuat_oleh')->constrained('users')->onDelete('cascade');
            $table->integer('total_peserta')->default(0);
            $table->integer('total_hadir')->default(0);
            $table->float('tingkat_kehadiran')->default(0);
            $table->string('file_pdf')->nullable();
            $table->string('file_excel')->nullable();
            $table->string('dokumentasi')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
