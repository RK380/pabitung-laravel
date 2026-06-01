<?php

namespace App\Enums;

enum UserRole:string
{
    case OPERATOR = 'operator';

    case KETUA_MAJELIS = 'ketua_majelis';

    case HAKIM_TUNGGAL = 'hakim_tunggal';

    case PANITERA = 'panitera';
}