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


    /**
     * CEK APAKAH HAKIM SUDAH DITENTUKAN
     */
    private function hakimSudahDitentukan(): bool
    {
        if ($this->jenisHakim === null) {
            return false;
        }

        return match ($this->jenisHakim) {

            JenisHakim::TUNGGAL =>
                filled($this->hakimTunggal),

            JenisHakim::MAJELIS =>
                filled($this->majelisHakim),

        };
    }


    /**
     * STATUS SIDANG
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

        if ($jadwal->isToday()) {

            return $this->statusBadge(
                StatusOperator::SIDANG,
                'bg-danger',
                'Sidang hari ini'
            );

        }

        if ($jadwal->isPast()) {

            return $this->statusBadge(
                StatusOperator::SIDANG_SELESAI,
                'bg-success',
                'Sidang telah selesai'
            );

        }

        $hari = ceil(now()->floatDiffInDays($jadwal));

        return match (true) {

            $hari <= 1 =>

                $this->statusBadge(
                    StatusOperator::MENUNGGU_SIDANG,
                    'bg-warning',
                    'Sidang besok'
                ),

            $hari <= 3 =>

                $this->statusBadge(
                    StatusOperator::MENUNGGU_SIDANG,
                    'bg-primary',
                    "$hari hari lagi"
                ),

            default =>

                $this->statusBadge(
                    StatusOperator::MENUNGGU_SIDANG,
                    'bg-secondary',
                    "$hari hari lagi"
                ),

        };
    }


    /**
     * STATUS UTAMA OPERATOR
     */
    public function getStatusOperatorAttribute(): array
    {

        /*
        |--------------------------------------------------------------------------
        | 1. CEK HAKIM
        |--------------------------------------------------------------------------
        */

        if (!$this->hakimSudahDitentukan()) {

            return $this->statusBadge(
                StatusOperator::MENUNGGU_HAKIM,
                'bg-warning',
                'Menunggu penetapan hakim'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | 2. CEK PANITERA
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
        | 3. PANITERA SUDAH DITETAPKAN
        |--------------------------------------------------------------------------
        */

        if (
            filled($this->paniteraPengganti)
            && blank($this->jadwal)
        ) {

            return $this->statusBadge(
                StatusOperator::PANITERA_TELAH_MENETAPKAN,
                'bg-info',
                'Panitera telah menetapkan'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | 4. PERKARA SELESAI
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
        | 5. CEK SIDANG
        |--------------------------------------------------------------------------
        */

        if ($this->jadwal) {

            return $this->statusSidang();

        }


        /*
        |--------------------------------------------------------------------------
        | 6. BARU DIINPUT
        |--------------------------------------------------------------------------
        */

        if ($this->created_at->isToday()) {

            return $this->statusBadge(
                StatusOperator::BARU,
                'bg-info',
                'Baru diinput hari ini'
            );

        }


        return $this->statusBadge(
            StatusOperator::BARU,
            'bg-secondary'
        );
    }
}