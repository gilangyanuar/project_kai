<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignments;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function jadwal(Request $request)
    {
         $assignments = Assignments::orderBy('jam_berangkat', 'asc')->get();

        // Jika data kosong
        if ($assignments->count() === 0) {
            return response()->json([
                'status' => 'success',
                'data'   => []   // array kosong sesuai dokumentasi
            ], 200);
        }

        // Jika ada data → map ke format response
        $data = $assignments->map(function ($item) {
            return [
                'jadwal_id'      => $item->jadwal_id,
                'no_ka'          => $item->no_ka,
                'nama_ka'        => $item->nama_ka,
                'jam_berangkat'  => $item->jam_berangkat,
                'status_laporan' => $item->status_laporan,
                'laporan_id'     => $item->laporan_id, // bisa null
            ];
        });

        return response()->json([
            'status' => 'success',
            'data'   => $data
        ], 200);
    }
}
