<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persetujuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'dosen_id',
        'status',
        'catatan',
        'approved_at',
        'ip_address',
        'signature_hash',
        'signature_image',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}
