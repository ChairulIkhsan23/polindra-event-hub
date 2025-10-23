<?php

namespace App\Enums;

enum StatusKegiatan: string
{
    case Draft = 'draft';
    case MenungguPersetujuan = 'menunggu_persetujuan';
    case Disetujui = 'disetujui';
    case Ditolak = 'ditolak';
    case Selesai = 'selesai';
}
