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
            'status'=>$status->value,
            'badge'=>$badge,
            'keterangan'=>$keterangan
        ];
    }

    private function hakimSudahDitentukan(): bool
    {
        return match ($this->jenisHakim) {

            JenisHakim::TUNGGAL => filled($this->hakimTunggal),

            JenisHakim::MAJELIS => filled($this->majelisHakim),

        };
    }

    private function statusSidang(): array
    {
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
                'bg-success'
            );

        }

        $hari = ceil(now()->floatDiffInDays($jadwal));

        return match (true) {

            $hari <= 1

                => $this->statusBadge(
                    StatusOperator::MENUNGGU_SIDANG,
                    'bg-warning',
                    'Sidang besok'
                ),

            $hari <= 3

                => $this->statusBadge(
                    StatusOperator::MENUNGGU_SIDANG,
                    'bg-primary',
                    "$hari hari lagi"
                ),

            default

                => $this->statusBadge(
                    StatusOperator::MENUNGGU_SIDANG,
                    'bg-secondary',
                    "$hari hari lagi"
                ),

        };
    }

    public function getStatusOperatorAttribute(): array
    {
        if ($this->created_at->isToday()) {

            return $this->statusBadge(
                StatusOperator::BARU,
                'bg-info',
                'Baru diinput hari ini'
            );

        }

        if (!$this->hakimSudahDitentukan()) {

            return $this->statusBadge(
                StatusOperator::MENUNGGU_HAKIM,
                'bg-warning'
            );

        }

        if (blank($this->jadwal)) {

            return $this->statusBadge(
                StatusOperator::MENUNGGU_JADWAL,
                'bg-primary'
            );

        }

        if ($this->status_perkara == 'selesai') {

            return $this->statusBadge(
                StatusOperator::PERKARA_SELESAI,
                'bg-success'
            );

        }

        return $this->statusSidang();
    }
}
