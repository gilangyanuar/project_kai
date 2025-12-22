@extends('layouts.app')

@section('title', 'Laporan KA 120 - Argo Bromo Anggrek')
@section('breadcrumb', 'Sabtu, 22 November 2025')

@section('content')

    <x-master-nav />

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        
        <div class="px-8 py-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">
                Mekanik - Pemeriksaan
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-bold text-gray-900 border-b border-gray-200 bg-white">
                        <th class="px-6 py-4 text-center w-16">Nomor</th>
                        <th class="px-6 py-4">Nama Item</th>
                        <th class="px-6 py-4 text-center">Standar</th>
                        <th class="px-6 py-4 text-center">Kondisi</th>
                        <th class="px-6 py-4 text-left">Keterangan</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-medium text-gray-700">                    
                    @php
                        $items = [
                            ['no' => 1, 'nama' => 'Kopler Merah', 'standar' => 'Baik', 'kondisi' => 'Baik', 'ket' => '-'],
                            ['no' => 2, 'nama' => 'Selang Timpal Brake', 'standar' => 'Seimbang', 'kondisi' => 'Rusak', 'ket' => 'Sedang dalam perbaikan'],
                            ['no' => 3, 'nama' => 'Selang Udara', 'standar' => 'Baik', 'kondisi' => 'Tidak ada', 'ket' => '-'],
                            ['no' => 4, 'nama' => 'Penyangga Kopler', 'standar' => 'Baik', 'kondisi' => 'Rusak', 'ket' => 'Sedang dalam perbaikan'],
                            ['no' => 5, 'nama' => 'Selang Angin Rem', 'standar' => 'Lengkap', 'kondisi' => 'Tidak ada', 'ket' => '-'],
                            ['no' => 6, 'nama' => 'Pegangan Rem', 'standar' => 'Lengkap', 'kondisi' => 'Baik', 'ket' => 'Bagus'],
                            ['no' => 7, 'nama' => 'Pegangan Rem', 'standar' => 'Lengkap', 'kondisi' => 'Rusak', 'ket' => 'Perlu diganti'],
                        ];
                    @endphp

                    @foreach($items as $index => $item)
                    <tr class="border-b border-gray-100 last:border-b-0 hover:bg-gray-50 {{ $index % 2 != 0 ? 'bg-surface-alt' : 'bg-white' }}">
                        
                        <td class="px-6 py-5 text-center">{{ $item['no'] }}</td>
                        <td class="px-6 py-5 font-medium text-gray-900">{{ $item['nama'] }}</td>
                        
                        <td class="px-6 py-5 text-center">
                             @php
                                $stdClass = match($item['standar']) {
                                    'Baik' => 'bg-green-100 text-green-700',
                                    'Seimbang' => 'bg-yellow-400 text-white', 
                                    'Lengkap' => 'bg-blue-200 text-blue-700',
                                    default => 'bg-gray-100 text-gray-600'
                                };
                            @endphp
                            <div class="inline-flex items-center justify-between gap-2 px-3 py-1.5 rounded-lg text-xs font-bold w-28 {{ $stdClass }}">
                                {{ $item['standar'] }}
                                <span class="material-symbols-outlined text-sm">arrow_drop_down</span>
                            </div>
                        </td>

                        <td class="px-6 py-5 text-center">
                            @php
                                $condClass = match($item['kondisi']) {
                                    'Baik' => 'bg-green-100 text-green-700',
                                    'Rusak' => 'bg-red-400 text-white', // Merah Solid
                                    'Tidak ada' => 'bg-[#9fa6b2] text-white', // Abu-abu Solid
                                    default => 'bg-gray-100 text-gray-600'
                                };
                            @endphp
                            <div class="inline-flex items-center justify-between gap-2 px-3 py-1.5 rounded-lg text-xs font-bold w-28 {{ $condClass }}">
                                {{ $item['kondisi'] }}
                                <span class="material-symbols-outlined text-sm">arrow_drop_down</span>
                            </div>
                        </td>

                        <td class="px-6 py-5 text-xs text-gray-600 max-w-50 leading-tight">
                            {{ $item['ket'] }}
                        </td>

                        <td class="px-6 py-5 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('master.mekanik.edit') }}" class="text-blue-600 hover:text-blue-800 transition">
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
            <button class="w-8 h-8 flex items-center justify-center rounded bg-kai-navy text-white text-xs font-bold shadow-md">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-200 text-gray-500 text-xs font-bold hover:bg-gray-300 transition">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-200 text-gray-500 text-xs font-bold hover:bg-gray-300 transition">3</button>
            <button class="pl-2 pr-1 h-8 flex items-center justify-center text-gray-500 text-xs font-medium hover:text-gray-700 transition">
                Next
            </button>
        </div>

    </div>

@endsection