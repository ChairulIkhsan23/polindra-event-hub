<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'kegiatan_id',
        'status',
        'kode_qr',
        'check_in_at',
    ];

    protected $casts = [
        'check_in_at' => 'datetime',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
