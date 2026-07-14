<?php

namespace App\Enums;

enum StatusOperator: string
{
    const BARU = 'Perkara Baru';

    const MENUNGGU_HAKIM = 'Menunggu Penetapan Hakim';

    const MENUNGGU_JADWAL = 'Menunggu Penjadwalan';

    const MENUNGGU = 'Menunggu Sidang';

    const SIDANG = 'Sedang Sidang';

    const SELESAI_SIDANG = 'Sidang Selesai';

    const PERKARA_SELESAI = 'Perkara Selesai';
}