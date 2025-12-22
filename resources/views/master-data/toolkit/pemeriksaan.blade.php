@extends('layouts.app')

@section('title', 'Laporan KA 120 - Argo Bromo Anggrek')
@section('breadcrumb', 'Sabtu, 22 November 2025')

@section('content')

    <x-master-nav />

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        
        <div class="px-8 py-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">
                {{ request()->routeIs('laporan.toolbox.*') ? 'Tool Box' : 'Tool Kit' }} - Pemeriksaan
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-bold text-gray-900 border-b border-gray-200 bg-white">
                        <th class="px-6 py-4 text-center">Nomor</th>
                        <th class="px-6 py-4">Nama Item</th>
                        <th class="px-6 py-4 text-center">Jumlah</th>
                        <th class="px-6 py-4 text-center">Satuan</th>
                        <th class="px-6 py-4 text-center">Kondisi</th>
                        <th class="px-6 py-4 text-center">Keterangan</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-medium text-gray-700">
                    
                    {{-- DATA DUMMY (Logic untuk mengganti isi tabel berdasarkan Tab) --}}
                    @php
                        $isToolbox = request()->routeIs('laporan.toolbox.*');
                        
                        $items = $isToolbox ? [
                            ['no' => 9, 'nama' => 'Stop block', 'qty' => 4, 'sat' => 'set', 'kondisi' => 'Baik', 'ket' => '-'],
                            ['no' => 10, 'nama' => 'Kain lap', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Rusak', 'ket' => 'Sedang dalam perbaikan'],
                            ['no' => 11, 'nama' => 'Bendera putih', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Baik', 'ket' => '-'],
                            ['no' => 12, 'nama' => 'Bendera merah', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Rusak', 'ket' => 'Sedang dalam perbaikan'],
                            ['no' => 13, 'nama' => 'Kabel 1 meter NYAF, NYHY 2,5mm', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Baik', 'ket' => '-'],
                        ] : [
                            ['no' => 8, 'nama' => 'Obeng plus dan minus', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Baik', 'ket' => '-'],
                            ['no' => 9, 'nama' => 'Tang ampere', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Rusak', 'ket' => 'Sedang dalam perbaikan'],
                            ['no' => 10, 'nama' => 'Thermo digital/minitemp', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Baik', 'ket' => '-'],
                            ['no' => 11, 'nama' => 'Betel/pahat', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Rusak', 'ket' => 'Sedang dalam perbaikan'],
                            ['no' => 12, 'nama' => 'Isolasi bening, hitam', 'qty' => 1, 'sat' => 'bh', 'kondisi' => 'Tidak Ada', 'ket' => '-'],
                        ];
                    @endphp

                    @foreach($items as $index => $item)
                    <tr class="border-b border-gray-100 last:border-b-0 hover:bg-gray-50 {{ $index % 2 != 0 ? 'bg-surface-alt' : 'bg-white' }}">
                        
                        <td class="px-6 py-5 text-center">{{ $item['no'] }}</td>
                        <td class="px-6 py-5 font-medium text-gray-900">{{ $item['nama'] }}</td>
                        <td class="px-6 py-5 text-center">{{ $item['qty'] }}</td>
                        <td class="px-6 py-5 text-center">{{ $item['sat'] }}</td>
                        
                        <td class="px-6 py-5 text-center">
                            @php
                                $badgeClass = match($item['kondisi']) {
                                    'Baik' => 'bg-green-100 text-green-700',
                                    'Rusak' => 'bg-red-400 text-white', // Sesuai gambar merah solid
                                    'Tidak Ada' => 'bg-[#9fa6b2] text-white', // Abu-abu solid sesuai gambar
                                    default => 'bg-gray-100 text-gray-600'
                                };
                            @endphp
                            <div class="inline-flex items-center justify-between gap-2 px-3 py-1.5 rounded-lg text-xs font-bold w-28 {{ $badgeClass }}">
                                {{ $item['kondisi'] }}
                                <span class="material-symbols-outlined text-sm">arrow_drop_down</span>
                            </div>
                        </td>

                        <td class="px-6 py-5 text-center text-xs text-gray-600 max-w-37.5 leading-tight">
                            {{ $item['ket'] }}
                        </td>

                        <td class="px-6 py-5 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('master.toolkit.edit') }}" class="text-blue-600 hover:text-blue-800 transition">
                                    <span class="material-symbols-outlined text-[20px]">edit_square</span>
                                </a>
                                <button class="text-red-600 hover:text-red-800 transition">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-8 py-6 border-t border-gray-200 flex justify-end items-center gap-2">
            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-200 text-gray-500 text-xs font-bold">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded bg-kai-navy text-white text-xs font-bold shadow-md">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-200 text-gray-500 text-xs font-bold">3</button>
            <button class="pl-2 pr-1 h-8 flex items-center justify-center text-gray-500 text-xs font-medium hover:text-gray-700">
                Next
            </button>
        </div>

    </div>

@endsection