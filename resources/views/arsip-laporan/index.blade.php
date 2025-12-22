@extends('layouts.app')

@section('title', 'Arsip Laporan')
@section('breadcrumb', 'Arsip Laporan')

@section('content')

    <div class="bg-gray-100 p-6 rounded-xl mb-8 border border-gray-200">
        <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
            
            <div class="md:col-span-4">
                <label for="nama_ka" class="block text-sm font-bold text-gray-900 mb-2">Cari Nama KA</label>
                <div class="relative">
                    <input type="text" id="nama_ka" placeholder="Masukkan nama kereta..." 
                           class="w-full pl-4 pr-4 py-2.5 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition bg-white">
                </div>
            </div>

            <div class="md:col-span-3">
                <label for="tanggal" class="block text-sm font-bold text-gray-900 mb-2">Masukkan Tanggal</label>
                <input type="date" id="tanggal" 
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition bg-white text-gray-600">
            </div>

            <div class="md:col-span-3">
                <label for="jenis" class="block text-sm font-bold text-gray-900 mb-2">Pilih Jenis Laporan</label>
                <div class="relative">
                    <select id="jenis" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition bg-white appearance-none cursor-pointer">
                        <option value="">Semua Laporan</option>
                        <option value="toolbox">Tool Box</option>
                        <option value="toolkit">Tool Kit</option>
                        <option value="mekanik">Mekanik</option>
                        <option value="genset">Genset</option>
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 pointer-events-none">expand_more</span>
                </div>
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="w-full bg-kai-navy hover:bg-indigo-900 text-white font-semibold py-2.5 px-6 rounded-lg transition shadow-sm flex justify-center items-center gap-2">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        
        <div class="px-6 py-5 border-b border-gray-200 bg-white">
            <h2 class="text-xl font-bold text-gray-800">Arsip Laporan</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                        <th class="px-6 py-4 text-center w-16">No</th>
                        <th class="px-6 py-4">Nama KA</th>
                        <th class="px-6 py-4">Nomor KA</th>
                        <th class="px-6 py-4">Tanggal Laporan</th>
                        <th class="px-6 py-4">Jenis Laporan</th>
                        <th class="px-6 py-4">
                            <div class="flex items-center gap-1 cursor-pointer hover:text-indigo-600">
                                Status
                                <span class="material-symbols-outlined text-sm">unfold_more</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-medium text-gray-700">
                    @php
                        $data = [
                            ['no' => 1, 'nama' => 'Argo Bromo Anggrek', 'noka' => 'KA-120', 'tgl' => '8 November 2025', 'jenis' => 'Tool Box', 'status' => 'Draft'],
                            ['no' => 2, 'nama' => 'Argo Bromo Anggrek', 'noka' => 'KA-120', 'tgl' => '13 November 2025', 'jenis' => 'Tool Kit', 'status' => 'Draft'],
                            ['no' => 3, 'nama' => 'Argo Bromo Anggrek', 'noka' => 'KA-120', 'tgl' => '15 November 2025', 'jenis' => 'Mekanik', 'status' => 'Pending'],
                            ['no' => 4, 'nama' => 'Gayana', 'noka' => 'KA-7048', 'tgl' => '19 November 2025', 'jenis' => 'Genset', 'status' => 'Approved'],
                            ['no' => 5, 'nama' => 'Progo', 'noka' => 'KA-1203', 'tgl' => '20 November 2025', 'jenis' => 'Mekanik 2', 'status' => 'Rejected'],
                            ['no' => 6, 'nama' => 'Senja Utama YK', 'noka' => 'KA-1243', 'tgl' => '29 Desember 2025', 'jenis' => 'Elektrik', 'status' => 'Approved'],
                            ['no' => 7, 'nama' => 'Serayu', 'noka' => 'KA-5632', 'tgl' => '26 Desember 2025', 'jenis' => 'Gangguan', 'status' => 'Approved'],
                            ['no' => 8, 'nama' => 'Bengawan', 'noka' => 'KA-3425', 'tgl' => '23 Desember 2025', 'jenis' => 'Gangguan', 'status' => 'Rejected'],
                        ];
                    @endphp

                    @foreach($data as $row)
                    <tr class="hover:bg-gray-50 border-b border-gray-100 last:border-b-0 {{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-surface-alt' }}">
                        <td class="px-6 py-4 text-center">{{ $row['no'] }}</td>
                        <td class="px-6 py-4 text-gray-900">{{ $row['nama'] }}</td>
                        <td class="px-6 py-4">{{ $row['noka'] }}</td>
                        <td class="px-6 py-4">{{ $row['tgl'] }}</td>
                        
                        <td class="px-6 py-4">
                            @php
                                $jenisColor = match($row['jenis']) {
                                    'Tool Box' => 'bg-emerald-400 text-white',
                                    'Tool Kit' => 'bg-blue-400 text-white',
                                    'Mekanik' => 'bg-orange-100 text-orange-600 border border-orange-200', // Warna peach
                                    'Mekanik 2' => 'bg-yellow-300 text-yellow-900',
                                    'Genset' => 'bg-cyan-400 text-white',
                                    'Elektrik' => 'bg-red-400 text-white',
                                    'Gangguan' => 'bg-indigo-300 text-indigo-900',
                                    default => 'bg-gray-200 text-gray-800'
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $jenisColor }}">
                                {{ $row['jenis'] }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                             @php
                                $statusClass = match($row['status']) {
                                    'Draft' => 'bg-indigo-100 text-indigo-700 border border-indigo-200',
                                    'Pending' => 'bg-amber-100 text-amber-700 border border-amber-200',
                                    'Approved' => 'bg-emerald-500 text-white',
                                    'Rejected' => 'bg-red-500 text-white',
                                    default => 'bg-gray-100 text-gray-600'
                                };
                            @endphp
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $statusClass }}">
                                @if($row['status'] == 'Approved') <span class="material-symbols-outlined text-[14px]">check</span> @endif
                                {{ $row['status'] }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($row['status'] === 'Draft' || $row['status'] === 'Pending')
                                <button class="text-gray-500 hover:text-indigo-600 transition" title="Edit">
                                    <span class="material-symbols-outlined">edit_square</span>
                                </button>
                            @else
                                <button class="text-gray-500 hover:text-emerald-600 transition" title="Download">
                                    <span class="material-symbols-outlined">download</span>
                                </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200 flex justify-end items-center gap-2">
            <button class="w-8 h-8 flex items-center justify-center rounded bg-kai-navy text-white text-sm font-medium transition">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">3</button>
            <button class="px-3 h-8 flex items-center justify-center rounded text-gray-500 hover:text-gray-700 text-sm font-medium transition">Next</button>
        </div>

    </div>

@endsection