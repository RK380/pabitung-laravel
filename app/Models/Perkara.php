<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'noperkara',
        'pemohon',
        'pemohoni',
        'pemohoniii',
        'pemohoniv',
        'tergugat',
        'kuasa_hukum',
        'lokasi_pemohon',
        'lokasi_tergugat',
        'email_pemohon',
        'email_pemohonii',
        'email_pemohoniii',
        'email_pemohoniv',
        'email_tergugat',
        'keterangan',

        'tanggal_pendaftaran',
        'jenisHakim',
        'majelisHakim',
        'hakimTunggal',
        'jadwal',
        'paniteraPengganti',
        'juruSita',
    ];

    // 16 field

    public function getJenisHakimTextAttribute()
    {
        return $this->jenisHakim == 1 ? 'Majelis Hakim' : 'Hakim Tunggal';
    }

    public function getHakimTunggalNameAttribute()
    {
        return match ($this->hakimTunggal) {
            '1' => 'Harisan Upuolat, S.H.I., M.H. (Ketua Majelis)',
            '2' => 'Jasni Manoso, S.H.I (Hakim Anggota 1)',
            '3' => 'Muhammad Iklil Lahilote, S.H. (Hakim Anggota 2)',
            default => '-',
        };
    }

    public function getMajelisHakimNameAttribute()
    {
        if (empty($this->majelisHakim)) {
            return '-';
        }

        $hakimIds = explode(',', $this->majelisHakim);
        $names = [];

        foreach ($hakimIds as $id) {
            $name = match (trim($id)) {
                '1' => 'Harisan Upuolat, S.H.I., M.H. (Ketua Majelis)',
                '2' => 'Jasni Manoso, S.H.I (Hakim Anggota 1)',
                '3' => 'Muhammad Iklil Lahilote, S.H. (Hakim Anggota 2)',
                default => null,
            };

            if ($name) {
                $names[] = "<li>{$name}</li>";
            }
        }

        return empty($names) ? '-' : '<ul>'.implode('', $names).'</ul>';
    }

    public function getPaniteraPenggantiNameAttribute()
    {
        return match ($this->paniteraPengganti) {
            '1' => 'Hasna Bin Nurdin Harun, S.H. (Panitera)',
            '2' => 'Jane, S.H. (Panitera Muda Permohonan)',
            '3' => 'Muhammad Shabri Hakim, S.H.I., M.H. (Panitera Muda Gugatan)',
            '4' => 'Sitti Aisa Halidu, S.H. (Panitera Muda Hukum)',
            '5' => 'Lutfiah Mamonto, S.Ag (Panitera Pengganti)',
            '6' => 'Riska Poli (Panitera Pengganti)',
            '7' => 'Firdha Djubedi, S.H., M.H. (Panitera Pengganti)',
            default => '-',
        };
    }

    public function getJuruSitaNameAttribute()
    {
        return match ($this->juruSita) {
            '1' => 'Fadly Ratuwalangon (Jurusita)',
            '2' => 'Nona Mifta Kusuma, A.Md.A.B. (Jurusita)',
            '3' => 'Imam Purwo Sulistiyo, S.I.A. (Jurusita Pengganti)',
            default => '-',
        };
    }
}
