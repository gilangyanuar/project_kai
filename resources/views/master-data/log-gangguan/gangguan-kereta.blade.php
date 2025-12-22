@extends('layouts.app')

@section('title', 'Laporan KA 120 - Argo Bromo Anggrek')
@section('breadcrumb', 'Sabtu, 22 November 2025')

@section('content')

    <x-master-nav />

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8 pb-6 mb-10">
        
        <h2 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">
            Gangguan Kereta / Genset - Dalam Perjalanan
        </h2>

        <div class="space-y-4 mb-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Identitas Komponen</label>
                <div class="md:col-span-3">
                    <input type="text" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Tindak Gangguan</label>
                <div class="md:col-span-3">
                    <input type="text" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Tindak Lanjut TKA</label>
                <div class="md:col-span-3">
                    <input type="text" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Diketahui Kondektur</label>
                <div class="md:col-span-3">
                    <span class="text-sm font-bold text-gray-900">Rendi</span>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button class="bg-kai-navy hover:bg-opacity-90 text-white px-6 py-2.5 rounded-lg text-xs font-bold shadow-md transition uppercase tracking-wide">
                    Simpan Log Gangguan
                </button>
            </div>
        </div>

        <div class="overflow-x-auto border-t border-gray-200 pt-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-bold text-gray-900 border-b border-gray-200 bg-gray-50">
                        <th class="px-4 py-4 text-center w-12">No</th>
                        <th class="px-4 py-4 w-[15%]">Identitas<br>Komponen</th> <th class="px-4 py-4 w-[15%]">Bentuk<br>Gangguan</th>
                        <th class="px-4 py-4 w-[25%]">Tindak Lanjut<br>TKA</th>
                        <th class="px-4 py-4 w-[10%]">Dikerjakan oleh<br>TKA</th>
                        <th class="px-4 py-4 w-[15%]">Waktu Lapor</th>
                        <th class="px-4 py-4 text-center w-[10%]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-xs text-gray-700"> @php
                        $logs = [
                            [
                                'no' => 1, 
                                'komponen' => 'Rem Pending', 
                                'bentuk' => 'Berbunyi Keras', 
                                'tindak' => 'Pengecekan kampas & tekanan angin, normal', 
                                'tka' => '13:20', 
                                'waktu' => '22/11/2025 12:25'
                            ],
                            [
                                'no' => 2, 
                                'komponen' => 'AC Gerbong 5', 
                                'bentuk' => 'Tidak Dingin', 
                                'tindak' => 'Reset MCB & pengecekan blower', 
                                'tka' => '13:50', 
                                'waktu' => '22/11/2025 14:15'
                            ],
                            [
                                'no' => 3, 
                                'komponen' => 'Lampu Gerbong 7', 
                                'bentuk' => 'Mati', 
                                'tindak' => 'Ganti sekring, lampu menyala', 
                                'tka' => '12:20', 
                                'waktu' => '22/11/2025 16:05'
                            ],
                        ];
                    @endphp

                    @foreach($logs as $index => $log)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 {{ $index % 2 != 0 ? 'bg-surface-alt' : 'bg-white' }}">
                        <td class="px-4 py-4 text-center">{{ $log['no'] }}</td>
                        <td class="px-4 py-4 font-medium">{{ $log['komponen'] }}</td>
                        <td class="px-4 py-4">{{ $log['bentuk'] }}</td>
                        <td class="px-4 py-4 leading-relaxed">{{ $log['tindak'] }}</td>
                        <td class="px-4 py-4">{{ $log['tka'] }}</td>
                        <td class="px-4 py-4">{{ $log['waktu'] }}</td>
                        
                        <td class="px-4 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('master.log-gangguan.edit') }}" class="text-blue-600 hover:text-blue-800 transition">
                                    <span class="material-symbols-outlined text-[18px]">edit_square</span>
                                </a>
                                <button class="text-red-600 hover:text-red-800 transition">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-6 flex justify-end items-center gap-2">
            <button class="w-8 h-8 flex items-center justify-center rounded bg-kai-navy text-white text-xs font-bold shadow-md">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-200 text-gray-500 text-xs font-bold hover:bg-gray-300 transition">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded bg-gray-200 text-gray-500 text-xs font-bold hover:bg-gray-300 transition">3</button>
            <button class="pl-2 pr-1 h-8 flex items-center justify-center text-gray-500 text-xs font-medium hover:text-gray-700 transition">
                Next
            </button>
        </div>

    </div>

@endsection