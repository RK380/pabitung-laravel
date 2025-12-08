<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHadir extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'nomor',
        'jenis_perkara',
        'penggugat',
        'kuasa_hukum_pemohon',
        'tergugat',
        'kuasa_hukum_tergugat',
        'tanda_tangan',
    ];
}
