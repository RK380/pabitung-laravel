<?php

namespace App\Enums;

enum StatusOperator: string
{
    case BARU = 'Perkara Baru';

    case MENUNGGU = 'Menunggu Sidang';

    case SIDANG = 'Sedang Sidang';

    case SELESAI = 'Sudah Selesai Sidang';
}