<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi massal
     */
    protected $fillable = [
        'nama',
        'email',
        'nim',
        'nidn',
        'password',
        'role_id',
        'ormawa_id',
        'foto',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Accessor: Format nama jadi Title Case
     */
    protected function nama(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucwords(strtolower($value))
        );
    }

    /**
     * Relasi ke Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relasi ke Ormawa
     */
    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class);
    }

    /**
     * Relasi contoh ke Kegiatan
     */
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    /**
     * Scope: filter user berdasarkan role tertentu
     */
    public function scopeByRole($query, $roleName)
    {
        return $query->whereHas('role', fn($q) => $q->where('nama', $roleName));
    }

    /**
     * Scope: hanya mahasiswa
     */
    public function scopeMahasiswa($query)
    {
        return $query->whereNotNull('nim');
    }

    /**
     * Scope: hanya dosen
     */
    public function scopeDosen($query)
    {
        return $query->whereNotNull('nidn');
    }

    /**
     * Accessor: cek apakah user punya role tertentu
     */
    public function hasRole(string $roleName): bool
    {
        return optional($this->role)->nama === $roleName;
    }

    /**
     * Accessor: dapatkan foto dengan URL default jika kosong
     */
    protected function fotoUrl(): Attribute
    {
        return Attribute::get(fn() => $this->foto 
            ? asset('storage/' . $this->foto)
            : asset('images/default-avatar.png')
        );
    }
}
