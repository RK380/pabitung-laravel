<?php

namespace App\Enums;

enum StatusOperator:string
{
    case BARU = 'Perkara Baru';

    case MENUNGGU_HAKIM = 'Menunggu Penetapan Hakim';

    case MENUNGGU_JADWAL = 'Menunggu Penjadwalan';

    case MENUNGGU_SIDANG = 'Menunggu Sidang';

    case SIDANG = 'Sedang Sidang';

    case SIDANG_SELESAI = 'Sidang Selesai';

    case PERKARA_SELESAI = 'Perkara Selesai';
}