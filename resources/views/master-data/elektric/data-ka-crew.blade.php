@extends('layouts.app')

@section('title', 'Laporan KA 120 - Argo Bromo Anggrek')
@section('breadcrumb', 'Sabtu, 22 November 2025')

@section('content')

    <x-master-nav />

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8 pb-4 mb-10">
        
        <h2 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">
            Electric - Data KA & Crew
        </h2>

        <div class="space-y-4 mb-10">
            
            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Nama KA</label>
                <div class="md:col-span-3">
                    <input type="text" value="Argo Bromo Anggrek" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Nomor KA</label>
                <div class="md:col-span-3">
                    <input type="text" value="KA - 120" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Lokasi Panel / Gerbong</label>
                <div class="md:col-span-3">
                    <input type="text" value="K1-0 18 01" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Teknisi Kereta Api</label>
                <div class="md:col-span-3 grid grid-cols-2 gap-4">
                    <input type="text" value="NIPP.333211213" placeholder="NIPP Teknisi 1" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="text" value="NIPP.422411134" placeholder="NIPP Teknisi 2" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Tanggal Pelaksanaan</label>
                <div class="md:col-span-3">
                    <span class="text-sm font-bold text-gray-900">22 November 2025</span>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto pb-2">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-bold text-gray-900 border-b border-gray-200 bg-gray-50">
                        <th class="px-4 py-3 text-center w-12">No</th>
                        <th class="px-4 py-3 w-1/4">Suku Yang Diperiksa</th>
                        <th class="px-4 py-3 text-center">Standar</th>
                        <th class="px-4 py-3 text-center">Hasil Pemeriksaan</th>
                        <th class="px-4 py-3">Petugas</th>
                        <th class="px-4 py-3 text-center">Keterangan</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    
                    @php
                        $items = [
                            ['no' => 1, 'suku' => 'Panel Distribusi Utama', 'standar' => 'Normal', 'hasil' => 'Baik', 'petugas' => 'Adi', 'ket' => ''],
                            ['no' => 2, 'suku' => 'Suhu Kabel Jumper', 'standar' => 'Dingin', 'hasil' => 'Panas', 'petugas' => 'Rafael', 'ket' => 'Overheat pada konektor'],
                            ['no' => 3, 'suku' => 'Inverter AC', 'standar' => 'Berfungsi', 'hasil' => 'Berfungsi', 'petugas' => 'Ali', 'ket' => ''],
                        ];
                    @endphp

                    @foreach($items as $index => $item)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 {{ $index % 2 != 0 ? 'bg-surface-alt' : 'bg-white' }}">
                        <td class="px-4 py-3 text-center">{{ $item['no'] }}</td>
                        <td class="px-4 py-3 font-medium">{{ $item['suku'] }}</td>

                        <td class="px-4 py-3 text-center" x-data="{ open: false, selected: '{{ $item['standar'] }}' }">
                            <button x-ref="btnStd" @click="open = !open" type="button"
                                class="inline-flex items-center justify-between gap-2 px-3 py-1 rounded-full text-xs font-bold w-28 transition"
                                :class="{
                                    'bg-green-400 text-white': ['Normal', 'Dingin', 'Berfungsi'].includes(selected),
                                    'bg-blue-300 text-blue-900': ['Menyala'].includes(selected),
                                    'bg-orange-200 text-orange-800': ['Cukup'].includes(selected)
                                }">
                                <span x-text="selected"></span>
                                <span class="material-symbols-outlined text-[14px]">edit</span>
                            </button>

                            <template x-teleport="body">
                                <div x-show="open" 
                                     x-anchor.bottom-start.offset.4="$refs.btnStd"
                                     @click.outside="open = false" 
                                     class="z-50 w-40 bg-white rounded-lg shadow-xl border border-gray-200 p-2 overflow-hidden" 
                                     style="display: none;">
                                    <div class="space-y-1">
                                        @foreach(['Normal', 'Dingin', 'Berfungsi', 'Menyala'] as $opt)
                                            @php
                                                $bgClass = match($opt) {
                                                    'Normal', 'Dingin', 'Berfungsi' => 'bg-green-400 text-white',
                                                    'Menyala' => 'bg-blue-300 text-blue-900',
                                                    default => 'bg-gray-200 text-gray-800'
                                                };
                                            @endphp
                                            <div @click="selected = '{{ $opt }}'; open = false" class="flex items-center gap-2 p-2 hover:bg-gray-100 cursor-pointer rounded">
                                                <div class="w-5 h-5 border border-gray-300 rounded flex items-center justify-center"
                                                     :class="selected === '{{ $opt }}' ? 'bg-kai-navy border-kai-navy' : ''">
                                                    <span x-show="selected === '{{ $opt }}'" class="material-symbols-outlined text-white text-[14px]">check</span>
                                                </div>
                                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $bgClass }} w-full text-center">
                                                    {{ $opt }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </template>
                        </td>

                        <td class="px-4 py-3 text-center" x-data="{ open: false, selected: '{{ $item['hasil'] }}' }">
                            <button x-ref="btnHasil" @click="open = !open" type="button"
                                class="inline-flex items-center justify-between gap-2 px-3 py-1 rounded-full text-xs font-bold w-28 transition"
                                :class="{
                                    'bg-green-400 text-white': selected === 'Baik' || selected === 'Berfungsi',
                                    'bg-red-500 text-white': selected === 'Panas' || selected === 'Rusak',
                                    'bg-yellow-300 text-yellow-900': selected === 'Cukup'
                                }">
                                <span x-text="selected"></span>
                                <span class="material-symbols-outlined text-[14px]">edit</span>
                            </button>

                            <template x-teleport="body">
                                <div x-show="open" 
                                     x-anchor.bottom-start.offset.4="$refs.btnHasil"
                                     @click.outside="open = false" 
                                     class="z-50 w-40 bg-white rounded-lg shadow-xl border border-gray-200 p-2 overflow-hidden" 
                                     style="display: none;">
                                    <div class="space-y-1">
                                        @foreach(['Baik', 'Berfungsi', 'Panas', 'Rusak'] as $opt)
                                            @php
                                                $bgClass = match($opt) {
                                                    'Baik', 'Berfungsi' => 'bg-green-400 text-white',
                                                    'Panas', 'Rusak' => 'bg-red-500 text-white',
                                                    default => 'bg-gray-200'
                                                };
                                            @endphp
                                            <div @click="selected = '{{ $opt }}'; open = false" class="flex items-center gap-2 p-2 hover:bg-gray-100 cursor-pointer rounded">
                                                <div class="w-5 h-5 border border-gray-300 rounded flex items-center justify-center"
                                                     :class="selected === '{{ $opt }}' ? 'bg-kai-navy border-kai-navy' : ''">
                                                    <span x-show="selected === '{{ $opt }}'" class="material-symbols-outlined text-white text-[14px]">check</span>
                                                </div>
                                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $bgClass }} w-full text-center">
                                                    {{ $opt }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </template>
                        </td>

                        <td class="px-4 py-3">{{ $item['petugas'] }}</td>

                        <td class="px-4 py-3">
                            <input type="text" value="{{ $item['ket'] }}" class="w-full rounded border border-gray-300 px-2 py-1 text-xs focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </td>

                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('master.elektric.edit') }}" class="text-blue-600 hover:text-blue-800"><span class="material-symbols-outlined text-[20px]">edit_square</span></a>
                                <button class="text-red-600 hover:text-red-800"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-end">
            <button class="bg-kai-navy hover:bg-opacity-90 text-white px-6 py-2 rounded-lg text-sm font-semibold shadow-md transition">
                Simpan
            </button>
        </div>
    </div>

    <div class="flex justify-end mb-10">
        <a href="#" class="bg-kai-navy hover:bg-opacity-90 text-white px-6 py-2.5 rounded-lg text-sm font-semibold flex items-center gap-2 shadow-md transition">
            Next
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
        </a>
    </div>

@endsection