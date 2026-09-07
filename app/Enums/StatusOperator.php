<?php

namespace App\Enums;

enum StatusOperator: string
{
    case BARU = 'Baru';

    case MENUNGGU_HAKIM = 'Menunggu Penetapan Hakim';

    case MENUNGGU_PANITERA = 'Menunggu Penetapan Panitera';

    case PANITERA_TELAH_MENETAPKAN = 'Panitera Telah Menetapkan';

    case MENUNGGU_JADWAL = 'Menunggu Penjadwalan';

    case MENUNGGU_SIDANG = 'Menunggu Sidang';

    case SIDANG = 'Sidang Hari Ini';

    case SIDANG_SELESAI = 'Sidang Selesai';

    case PERKARA_SELESAI = 'Perkara Selesai';
}