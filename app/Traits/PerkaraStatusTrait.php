<?php

namespace App\Traits;

use App\Enums\StatusOperator;
use App\Enums\JenisHakim;

trait PerkaraStatusTrait
{
    private function statusBadge(
        StatusOperator $status,
        string $badge,
        string $keterangan = ''
    ): array {

        return [
            'status' => $status->value,
            'badge' => $badge,
            'keterangan' => $keterangan
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | CEK HAKIM
    |--------------------------------------------------------------------------
    */

    private function hakimSudahDitentukan(): bool
    {
        if ($this->jenisHakim === null) {

            return false;

        }

        return match ($this->jenisHakim) {

            JenisHakim::TUNGGAL
                => filled($this->hakimTunggal),

            JenisHakim::MAJELIS
                => filled($this->majelisHakim),

            default
                => false,

        };
    }


    /*
    |--------------------------------------------------------------------------
    | STATUS SIDANG
    |--------------------------------------------------------------------------
    */

    private function statusSidang(): array
    {
        if (!$this->jadwal) {

            return $this->statusBadge(
                StatusOperator::MENUNGGU_JADWAL,
                'bg-primary',
                'Menunggu penjadwalan sidang'
            );

        }


        $jadwal = $this->jadwal;


        /*
        |--------------------------------------------------------------------------
        | SIDANG HARI INI
        |--------------------------------------------------------------------------
        */

        if ($jadwal->isToday()) {

            return $this->statusBadge(
                StatusOperator::SIDANG,
                'bg-danger',
                'Sidang hari ini'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | SIDANG SELESAI
        |--------------------------------------------------------------------------
        */

        if ($jadwal->isPast()) {

            return $this->statusBadge(
                StatusOperator::SIDANG_SELESAI,
                'bg-success',
                'Sidang telah selesai'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG HARI
        |--------------------------------------------------------------------------
        */

        $hari = now()->diffInDays($jadwal);


        if ($hari <= 1) {

            return $this->statusBadge(
                StatusOperator::MENUNGGU_SIDANG,
                'bg-warning',
                'Sidang besok'
            );

        }


        if ($hari <= 3) {

            return $this->statusBadge(
                StatusOperator::MENUNGGU_SIDANG,
                'bg-primary',
                $hari . ' hari lagi'
            );

        }


        return $this->statusBadge(
            StatusOperator::MENUNGGU_SIDANG,
            'bg-secondary',
            $hari . ' hari lagi'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STATUS UTAMA PERKARA
    |--------------------------------------------------------------------------
    */

    public function getStatusOperatorAttribute(): array
    {

        /*
        |--------------------------------------------------------------------------
        | 1. PERKARA SELESAI
        |--------------------------------------------------------------------------
        */

        if ($this->status_perkara == 'selesai') {

            return $this->statusBadge(
                StatusOperator::PERKARA_SELESAI,
                'bg-success',
                'Perkara selesai'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | 2. HAKIM BELUM DITENTUKAN
        |--------------------------------------------------------------------------
        */

        if (!$this->hakimSudahDitentukan()) {

            if ($this->created_at && $this->created_at->isToday()) {

                return $this->statusBadge(
                    StatusOperator::BARU,
                    'bg-info',
                    'Baru diinput hari ini'
                );

            }

            return $this->statusBadge(
                StatusOperator::MENUNGGU_HAKIM,
                'bg-warning',
                'Menunggu penetapan hakim'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | 3. HAKIM SUDAH DITENTUKAN
        |--------------------------------------------------------------------------
        */

        if ($this->hakimSudahDitentukan() && blank($this->jadwal)) {

            return $this->statusBadge(
                StatusOperator::MENUNGGU_JADWAL,
                'bg-primary',
                'Hakim telah ditetapkan, menunggu penjadwalan'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | 4. PANITERA BELUM DITENTUKAN
        |--------------------------------------------------------------------------
        */

        if (blank($this->paniteraPengganti)) {

            return $this->statusBadge(
                StatusOperator::MENUNGGU_PANITERA,
                'bg-warning',
                'Menunggu penetapan panitera'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | 5. PANITERA SUDAH MENETAPKAN
        |--------------------------------------------------------------------------
        */

        if (filled($this->paniteraPengganti)) {

            if (!$this->jadwal) {

                return $this->statusBadge(
                    StatusOperator::PANITERA_MENETAPKAN,
                    'bg-success',
                    'Panitera telah menetapkan'
                );

            }

        }


        /*
        |--------------------------------------------------------------------------
        | 6. STATUS SIDANG
        |--------------------------------------------------------------------------
        */

        if (filled($this->jadwal)) {

            return $this->statusSidang();

        }


        /*
        |--------------------------------------------------------------------------
        | DEFAULT
        |--------------------------------------------------------------------------
        */

        return $this->statusBadge(
            StatusOperator::BARU,
            'bg-info'
        );
    }
}