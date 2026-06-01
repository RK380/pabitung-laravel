<?php

namespace App\Enums;

class StatusPerkara
{
    const BARU = 'Perkara Baru';

    const MENUNGGU_HAKIM = 'Menunggu Penetapan Hakim';

    const MENUNGGU_SIDANG = 'Menunggu Penetapan Tanggal Sidang';

    const MENUNGGU = 'Menunggu Sidang';

    const SIDANG = 'Sedang Sidang';

    const SELESAI = 'Sudah Selesai Sidang';
}