<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerkaraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tanggal_pendaftaran' => 'required|date',
            'jenis' => 'required|string',
            'noperkara' => 'required|string',
            'pemohon' => 'required|string',
            'tergugat' => 'required|string',
            'kuasa_hukum_status' => 'required|string|in:1,2',
            'kuasa_hukum' => 'required_if:kuasa_hukum_status,1|string|nullable',
            'lokasipemohon' => 'required|string',
            'lokasitergugat' => 'required|string',
            'emailpemohon' => 'required|email',
            'emailtergugat' => 'nullable|email',
            'keterangan' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal_pendaftaran.required' => 'Tanggal Pendaftaran wajib diisi.',
            'tanggal_pendaftaran.date' => 'Format Tanggal Pendaftaran tidak valid.',
            'jenis.required' => 'Jenis Perkara wajib dipilih.',
            'noperkara.required' => 'Nomor Perkara wajib diisi.',
            'pemohon.required' => 'Pemohon/Penggugat wajib diisi.',
            'tergugat.required' => 'Termohon/Tergugat wajib diisi.',
            'kuasa_hukum_status.required' => 'Kuasa Hukum wajib dipilih.',
            'kuasa_hukum_status.in' => 'Pilihan Kuasa Hukum tidak valid.',
            'kuasa_hukum.required_if' => 'Nama Kuasa Hukum wajib diisi jika Kuasa Hukum dipilih Ada.',
            'lokasipemohon.required' => 'Lokasi Pemohon/Penggugat wajib diisi.',
            'lokasitergugat.required' => 'Lokasi Tergugat wajib diisi.',
            'emailpemohon.required' => 'Email Pemohon/Penggugat wajib diisi.',
            'emailpemohon.email' => 'Format Email Pemohon/Penggugat tidak valid.',
            'emailtergugat.email' => 'Format Email Tergugat tidak valid.',
            'keterangan.required' => 'Keterangan wajib diisi.',
        ];
    }
}
