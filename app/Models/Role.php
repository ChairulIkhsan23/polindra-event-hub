<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Testing\Fluent\Concerns\Has;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'deskripsi'
    ];

    /**
     * Relasi: satu role bisa punya banyak user)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
