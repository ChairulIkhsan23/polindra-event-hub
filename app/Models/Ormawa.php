<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ormawa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ormawa',
        'jenis',
        'kontak',
        'logo',
        'deskripsi',
    ];

    /**
     * Relasi (Satu ormawa bisa punya banyak user)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
