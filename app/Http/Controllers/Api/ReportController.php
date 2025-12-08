<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignments;
use App\Models\Checksheet_Master;
use App\Models\ChecksheetData;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * POST /api/laporan/cek-atau-buat
     *
     * Dipanggil saat mekanik memilih jadwal di dashboard.
     */
    public function cekAtauBuat(Request $request)
    {
        // 1. Autentikasi – pastikan route pakai middleware auth:sanctum / jwt
        $mekanik = $request->user();

        // 2. Validasi input
        $validated = $request->validate([
            'jadwal_id'    => ['required', 'integer', 'exists:assignments,jadwal_id'],
            'stamformasi'  => ['required', 'array'],
            'stamformasi.*'=> ['string'],
        ]);
        // Kalau gagal → Laravel otomatis balikin 422 dengan format
        // { message: "...", errors: {...} } (sesuai dokumentasi 422)

        $jadwalId = $validated['jadwal_id'];

        // 3. Ambil jadwal (assignments)
        $jadwal = Assignments::findOrFail($jadwalId);

        // 4. Cek apakah sudah ada draft untuk KA / jadwal ini
        // Di DB kamu belum ada kolom jadwal_id di checksheet__masters,
        // jadi kita pakai penghubung via no_ka.
        $existingDraft = Checksheet_Master::where('no_ka', $jadwal->no_ka)
            ->where('status', 'Draft')
            ->first();

        // 5. Kalau sudah ada draft
        if ($existingDraft) {
            // cek apakah mekaniknya sama
            if ((int) $existingDraft->mekanik_id === (int) $mekanik->user_id
                || (property_exists($mekanik, 'user_id') && (int) $existingDraft->mekanik_id === (int) $mekanik->user_id)
            ) {
                // mekanik sama → lanjutkan draft
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Laporan siap diisi.',
                    'data'    => [
                        'laporan_id'     => $existingDraft->master_id,
                        'status_laporan' => $existingDraft->status, // harusnya "Draft"
                    ],
                ], 200);
            }

            // mekanik beda → kunci, balikin error 401 (sesuai dokumen)
            return response()->json([
                'status'  => 'error',
                'message' => 'Laporan untuk KA ini sedang dikerjakan (status Draft) oleh mekanik lain.',
            ], 401);
        }

        // 6. Kalau belum ada draft → buat baru
        $now = now();

        $newDraft = Checksheet_Master::create([
            'no_ka'            => $jadwal->no_ka,
            'name_ka'          => $jadwal->nama_ka,
            'tanggal_inspeksi' => $now->toDateString(),
            'status'           => 'Draft',
            // sesuaikan PK user: id / user_id
            'mekanik_id'       => $mekanik->user_id,
            'pengawas_id'      => $mekanik->user_id, // placeholder
            'catatan_pengawas' => '',

            // karena di migration kamu timestamp-nya tidak nullable,
            // kita isi saja biar DB nggak error
            'created_at'       => $now,
            'submitted_at'     => $now,
            'approved_at'      => $now,
        ]);

        // NOTE: field 'stamformasi' dari request belum disimpan ke DB,
        // nanti bisa kamu pakai untuk tabel detail terpisah (Form Type 3).

        return response()->json([
            'status'  => 'success',
            'message' => 'Laporan siap diisi.',
            'data'    => [
                'laporan_id'     => $newDraft->master_id,
                'status_laporan' => $newDraft->status, // "Draft"
            ],
        ], 200);
    }
     public function simpanDataInventaris(Request $request, int $id)
    {
        $mekanik = $request->user();
        if (! $mekanik) {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }

        $validated = $request->validate([
            'nama_sheet'      => ['required', 'string'],
            'data'            => ['required', 'array', 'min:1'],
            'data.*.item_pemeriksaan' => ['required', 'string'],
            'data.*.hasil_input'      => ['required', 'string'],
            'data.*.keterangan'       => ['nullable', 'string'],
        ]);

        $namaSheet = $validated['nama_sheet'];

        $laporan = Checksheet_Master::findOrFail($id);

        $mekanikId = $mekanik->user_id;

        $bolehEdit = ((int) $laporan->mekanik_id === (int) $mekanikId)
            && $laporan->status !== 'Approved';

        if (! $bolehEdit) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Anda tidak memiliki izin untuk mengubah laporan ini.',
            ], 403);
        }

        foreach ($validated['data'] as $row) {
            \App\Models\Checksheet_Data::updateOrCreate(
                [
                    'master_id'        => $laporan->master_id,
                    'nama_sheet'       => $namaSheet,
                    'item_pemeriksaan' => $row['item_pemeriksaan'],
                ],
                [
                    'hasil_input' => $row['hasil_input'],
                    'keterangan'  => $row['keterangan'] ?? null,
                ]
            );
        }

        return response()->json([
            'status'  => 'success',
            'message' => "Data '{$namaSheet}' telah berhasil disimpan.",
        ], 200);
    }   // <--- method simpanDataInventaris selesai
}

