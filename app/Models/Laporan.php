<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'dibuat_oleh',
        'total_peserta',
        'total_hadir',
        'tingkat_kehadiran',
        'file_pdf',
        'file_excel',
        'dokumentasi',
        'dibuat_pada',
    ];

    protected $casts = [
        'dibuat_pada' => 'datetime',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }
}
