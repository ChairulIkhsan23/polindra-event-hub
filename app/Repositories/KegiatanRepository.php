<?php

namespace App\Repositories;

use App\Models\Kegiatan;

class KegiatanRepository
{
    public function getAll()
    {
        return Kegiatan::latest()->paginate(10);
    }

    public function getByStatus($status)
    {
        return Kegiatan::where('status', $status)->latest()->get();
    }

    public function create(array $data)
    {
        return Kegiatan::create($data);
    }

    public function update(Kegiatan $kegiatan, array $data)
    {
        return $kegiatan->update($data);
    }
}
