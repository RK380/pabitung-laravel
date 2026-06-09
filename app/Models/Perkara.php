<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusPerkara;
use App\Enums\StatusOperator;
use Carbon\Carbon;

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
        'tergugatii',
        'tergugatiii',
        'tergugativ',
        'kuasa_hukum',
        'lokasi_pemohon',
        'lokasi_tergugat',
        'email_pemohon',
        'email_pemohonii',
        'email_pemohoniii',
        'email_pemohoniv',
        'email_tergugat',
        'email_tergugatii',
        'email_tergugatiii',
        'email_tergugativ',
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

    public function getStatusAttribute()
    {
        $hariIni = Carbon::now();

        $tanggalInput = Carbon::parse($this->created_at);

        $hakimAda =
            ($this->jenisHakim == 1 && !empty($this->majelisHakim)) ||
            ($this->jenisHakim == 2 && !empty($this->hakimTunggal));

        /*
        |--------------------------------------------------------------------------
        | PERKARA BARU
        |--------------------------------------------------------------------------
        */

        if(empty($this->jenisHakim) && $tanggalInput->isToday()){

            return [
                'status' => StatusPerkara::BARU,
                'badge' => 'bg-info',
                'keterangan' => 'Menunggu penetapan hakim'
            ];

        }

        /*
        |--------------------------------------------------------------------------
        | MENUNGGU HAKIM
        |--------------------------------------------------------------------------
        */

        if(empty($this->jenisHakim)){

            return [
                'status' => StatusPerkara::MENUNGGU_HAKIM,
                'badge' => 'bg-secondary',
                'keterangan' => ''
            ];

        }

        /*
        |--------------------------------------------------------------------------
        | MENUNGGU SIDANG
        |--------------------------------------------------------------------------
        */

        if($hakimAda && empty($this->jadwal)){

            return [
                'status' => StatusPerkara::MENUNGGU_SIDANG,
                'badge' => 'bg-warning',
                'keterangan' => ''
            ];

        }

        /*
        |--------------------------------------------------------------------------
        | STATUS SIDANG
        |--------------------------------------------------------------------------
        */

        if($hakimAda && !empty($this->jadwal)){

            $tanggalSidang = Carbon::parse($this->jadwal);

            if($tanggalSidang->isPast()){

                return [
                    'status' => StatusPerkara::SELESAI,
                    'badge' => 'bg-success',
                    'keterangan' => ''
                ];

            }

            $hari = ceil($hariIni->floatDiffInDays($tanggalSidang));

            if($tanggalSidang->isToday()){

                return [
                    'status' => StatusPerkara::SIDANG,
                    'badge' => 'bg-danger',
                    'keterangan' => 'Sidang hari ini'
                ];

            }

            return [
                'status' => StatusPerkara::MENUNGGU,
                'badge' => $hari <= 3 ? 'bg-primary' : 'bg-secondary',
                'keterangan' => $hari <= 1 ? 'Sidang besok' : "$hari hari lagi"
            ];

        }

        return [
            'status' => '-',
            'badge' => 'bg-secondary',
            'keterangan' => ''
        ];
    }

    public function getStatusOperatorAttribute()
    {
        $hariIni = Carbon::now();

        $tanggalSidang = Carbon::parse($this->jadwal);

        $tanggalInput = Carbon::parse($this->created_at);

        /*
        |--------------------------------------------------------------------------
        | PERKARA BARU
        |--------------------------------------------------------------------------
        */

        if($tanggalInput->isToday()){

            return [
                'status' => StatusOperator::BARU,
                'badge' => 'bg-info',
                'keterangan' => 'Baru diinput hari ini'
            ];

        }

        /*
        |--------------------------------------------------------------------------
        | SUDAH SELESAI
        |--------------------------------------------------------------------------
        */

        if($tanggalSidang->isPast()){

            return [
                'status' => StatusOperator::SELESAI,
                'badge' => 'bg-success',
                'keterangan' => ''
            ];

        }

        /*
        |--------------------------------------------------------------------------
        | SEDANG SIDANG
        |--------------------------------------------------------------------------
        */

        if($tanggalSidang->isToday()){

            return [
                'status' => StatusOperator::SIDANG,
                'badge' => 'bg-danger',
                'keterangan' => 'Sidang hari ini'
            ];

        }

        /*
        |--------------------------------------------------------------------------
        | MENUNGGU SIDANG
        |--------------------------------------------------------------------------
        */

        $hari = ceil($hariIni->floatDiffInDays($tanggalSidang));

        if($hari <= 1){

            return [
                'status' => StatusOperator::MENUNGGU,
                'badge' => 'bg-warning',
                'keterangan' => 'Sidang besok'
            ];

        }

        if($hari <= 3){

            return [
                'status' => StatusOperator::MENUNGGU,
                'badge' => 'bg-primary',
                'keterangan' => "$hari hari lagi"
            ];

        }

        return [
            'status' => StatusOperator::MENUNGGU,
            'badge' => 'bg-secondary',
            'keterangan' => "$hari hari lagi"
        ];
    }
}
