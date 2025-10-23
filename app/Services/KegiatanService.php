<?php

namespace App\Services;

use App\Repositories\KegiatanRepository;
use App\Events\KegiatanDisetujui;
use App\Events\KegiatanDitolak;

class KegiatanService
{
    public function __construct(protected KegiatanRepository $repo) {}

    public function createKegiatan(array $data)
    {
        $data['status'] = 'draft';
        return $this->repo->create($data);
    }

    public function approveKegiatan($kegiatan)
    {
        $this->repo->update($kegiatan, ['status' => 'disetujui']);
        event(new KegiatanDisetujui($kegiatan));
    }

    public function rejectKegiatan($kegiatan, $catatan)
    {
        $this->repo->update($kegiatan, ['status' => 'ditolak', 'catatan' => $catatan]);
        event(new KegiatanDitolak($kegiatan));
    }
}
