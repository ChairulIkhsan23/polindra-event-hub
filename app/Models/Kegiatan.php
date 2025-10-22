<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
        use HasFactory;

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'kapasitas',
        'status',
        'staff_id',
        'lampiran',
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];

    
    /**
     * Relasi: kegiatan dibuat oleh staff (User)
     */ 
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    /**
     * Relasi: kegiatan punya banyak persetujuan
     */
    public function persetujuans()
    {
        return $this->hasMany(Persetujuan::class);
    }

    /** 
     * Relasi: kegiatan punya banyak pendaftaran
     */
    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    /**
     * Relasi: kegiatan punya satu laporan
     */ 
    public function laporan()
    {
        return $this->hasOne(Laporan::class);
    }
}
