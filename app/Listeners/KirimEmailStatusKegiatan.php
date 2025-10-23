<?php

namespace App\Listeners;

use App\Events\KegiatanDisetujui;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class KirimEmailStatusKegiatan
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(KegiatanDisetujui $event): void
    {
        //
    }
}
