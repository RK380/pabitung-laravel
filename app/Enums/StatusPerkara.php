<?php

namespace App\Enums;

enum StatusPerkara:string
{
    case PROSES = 'proses';
    case SIDANG = 'sidang';
    case PUTUS = 'putusan';
    case SELESAI = 'selesai';
}