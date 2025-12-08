<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPerkara extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal', 'nomor', 'panitera', 'tanda_tangan'
    ];

    public function getPaniteraPenggantiNameAttribute()
    {
        return match($this->panitera) {
            '1' => "Hasna Bin Nurdin Harun, S.H. (Panitera)",
            '2' => "Jane, S.H. (Panitera Muda Permohonan)",
            '3' => "Muhammad Shabri Hakim, S.H.I., M.H. (Panitera Muda Gugatan)",
            '4' => "Sitti Aisa Halidu, S.H. (Panitera Muda Hukum)",
            '5' => "Lutfiah Mamonto, S.Ag (Panitera Pengganti)",
            '6' => "Riska Poli (Panitera Pengganti)",
            '7' => "Firdha Djubedi, S.H., M.H. (Panitera Pengganti)",
            default => "-",
        };
    }
}
