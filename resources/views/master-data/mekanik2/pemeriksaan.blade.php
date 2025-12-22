@extends('layouts.app')

@section('title', 'Laporan KA 120 - Argo Bromo Anggrek')
@section('breadcrumb', 'Sabtu, 22 November 2025')

@section('content')

    <x-master-nav />

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8 pb-10">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-8">
            
            <div class="w-full md:w-2/3 space-y-4">
                <h2 class="text-lg font-bold text-gray-900 mb-6">
                    Mekanik 2 - Pemeriksaan Bagian Dalam
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                    <label class="font-bold text-gray-800">Nomor KA</label>
                    <div class="md:col-span-3">
                        <input type="text" value="KA 120" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                    <label class="font-bold text-gray-800">Tanggal</label>
                    <div class="md:col-span-3">
                        <input type="text" value="22 November 2025" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4" x-data="{ open: false, selected: 'Berangkat' }">
                    <label class="font-bold text-gray-800">Perjalanan</label>
                    <div class="md:col-span-3 relative">
                        <button @click="open = !open" type="button" class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm bg-white text-left flex items-center justify-between focus:outline-none shadow-sm">
                            <span x-text="selected"></span>
                            <span class="material-symbols-outlined text-gray-500">expand_more</span>
                        </button>

                        <div x-show="open" @click.outside="open = false" class="absolute z-10 mt-1 w-full bg-white rounded-md shadow-lg border border-gray-200 overflow-hidden" style="display: none;">
                            <div class="p-1">
                                <div @click="selected = 'Berangkat'; open = false" class="flex items-center gap-2 p-2 hover:bg-gray-100 cursor-pointer rounded">
                                    <span x-show="selected === 'Berangkat'" class="material-symbols-outlined text-blue-600 text-sm">check_circle</span>
                                    <span :class="selected !== 'Berangkat' ? 'ml-6' : ''">Berangkat</span>
                                </div>
                                <div @click="selected = 'Kembali'; open = false" class="flex items-center gap-2 p-2 hover:bg-gray-100 cursor-pointer rounded">
                                    <span x-show="selected === 'Kembali'" class="material-symbols-outlined text-blue-600 text-sm">check_circle</span>
                                    <span :class="selected !== 'Kembali' ? 'ml-6' : ''">Kembali</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div>
                <button class="bg-kai-navy hover:bg-opacity-90 text-white px-6 py-3 rounded-lg text-sm font-bold shadow-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </div>


        <div class="overflow-x-auto mb-12">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-bold text-gray-900 border-b border-gray-200 bg-gray-50">
                        <th class="px-4 py-3 text-center w-12">No</th>
                        <th class="px-4 py-3">Uraian</th>
                        <th class="px-4 py-3 text-center">Standar</th>
                        <th class="px-4 py-3">Catatan</th>
                        <th class="px-4 py-3">Petugas</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @php
                        $items = [
                            ['no' => 1, 'uraian' => 'Pintu', 'standar' => 'Baik', 'catatan' => '', 'petugas' => 'Adi', 'status' => 'Sesuai'],
                            ['no' => 2, 'uraian' => 'Engsel', 'standar' => 'Baik', 'catatan' => '', 'petugas' => 'Rafael', 'status' => 'Sesuai'],
                            ['no' => 3, 'uraian' => 'Grendel', 'standar' => 'Berfungsi', 'catatan' => '', 'petugas' => 'Ali', 'status' => 'Tidak Sesuai'],
                        ];
                    @endphp

                    @foreach($items as $index => $item)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 {{ $index % 2 != 0 ? 'bg-surface-alt' : 'bg-white' }}">
                        <td class="px-4 py-3 text-center">{{ $item['no'] }}</td>
                        <td class="px-4 py-3 font-medium">{{ $item['uraian'] }}</td>

                        <td class="px-4 py-3 text-center" x-data="{ open: false, selected: '{{ $item['standar'] }}' }">
                            
                            <button x-ref="button" @click="open = !open" type="button"
                                class="inline-flex items-center justify-between gap-2 px-3 py-1 rounded-full text-xs font-bold w-24 transition"
                                :class="{
                                    'bg-yellow-300 text-yellow-900': selected === 'Baik',
                                    'bg-blue-200 text-blue-800': selected === 'Berfungsi',
                                    'bg-orange-200 text-orange-800': selected === 'Lengkap'
                                }">
                                <span x-text="selected"></span>
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>

                            <template x-teleport="body">
                                <div x-show="open" 
                                    x-anchor.bottom-start.offset.4="$refs.button"
                                    @click.outside="open = false" 
                                    class="z-50 w-40 bg-white rounded-lg shadow-xl border border-gray-200 p-2" 
                                    style="display: none;">
                                    
                                    <div class="space-y-1">
                                        @foreach(['Baik', 'Berfungsi', 'Lengkap'] as $opt)
                                        <div @click="selected = '{{ $opt }}'; open = false" class="flex items-center gap-2 p-2 hover:bg-gray-100 cursor-pointer rounded">
                                            <span x-show="selected === '{{ $opt }}'" class="material-symbols-outlined text-blue-600 text-sm">check_circle</span>
                                            <span :class="selected !== '{{ $opt }}' ? 'ml-6' : ''" class="px-2 py-0.5 rounded-full text-xs {{ match($opt) { 'Baik' => 'bg-yellow-300 text-yellow-900', 'Berfungsi' => 'bg-blue-200 text-blue-800', 'Lengkap' => 'bg-orange-200 text-orange-800' } }}">{{ $opt }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </template>
                        </td>
                        <td class="px-4 py-3">
                            <input type="text" value="{{ $item['catatan'] }}" class="w-full rounded border border-gray-300 px-2 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </td>
                        <td class="px-4 py-3">{{ $item['petugas'] }}</td>

                        <td class="px-4 py-3 text-center" x-data="{ open: false, selected: '{{ $item['status'] }}' }">
                            
                            <button x-ref="button" @click="open = !open" type="button"
                                class="inline-flex items-center justify-between gap-2 px-3 py-1 rounded-full text-xs font-bold w-28 transition"
                                :class="{
                                    'bg-green-100 text-green-700': selected === 'Sesuai',
                                    'bg-orange-100 text-orange-700': selected === 'Tidak Sesuai'
                                }">
                                <span x-text="selected"></span>
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                            
                            <template x-teleport="body">
                                <div x-show="open" 
                                    x-anchor.bottom-end.offset.4="$refs.button"
                                    @click.outside="open = false" 
                                    class="z-50 w-40 bg-white rounded-lg shadow-xl border border-gray-200 p-2" 
                                    style="display: none;">
                                    
                                    <div class="space-y-1">
                                            @foreach(['Sesuai', 'Tidak Sesuai'] as $opt)
                                        <div @click="selected = '{{ $opt }}'; open = false" class="flex items-center gap-2 p-2 hover:bg-gray-100 cursor-pointer rounded">
                                            <span x-show="selected === '{{ $opt }}'" class="material-symbols-outlined text-blue-600 text-sm">check_circle</span>
                                            <span :class="selected !== '{{ $opt }}' ? 'ml-6' : ''" class="px-2 py-0.5 rounded-full text-xs {{ match($opt) { 'Sesuai' => 'bg-green-100 text-green-700', 'Tidak Sesuai' => 'bg-orange-100 text-orange-700' } }}">{{ $opt }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </template>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('master.mekanik2.edit') }}" class="text-blue-600 hover:text-blue-800"><span class="material-symbols-outlined text-[20px]">edit_square</span></a>
                                <button class="text-red-600 hover:text-red-800"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div>
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">Riwayat Pemeriksaan Mekanik 2</h3>
                <button class="bg-kai-navy hover:bg-opacity-90 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm transition">
                    Lihat Semua
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-xs font-bold text-gray-900 border-b border-gray-200 bg-gray-50">
                            <th class="px-4 py-3 text-center w-12">No</th>
                            <th class="px-4 py-3">Uraian</th>
                            <th class="px-4 py-3 text-center">Standar</th>
                            <th class="px-4 py-3">Catatan</th>
                            <th class="px-4 py-3">Petugas</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @php
                        $historyItems = [
                            ['no' => 1, 'uraian' => 'Pintu', 'standar' => 'Baik', 'catatan' => '', 'petugas' => 'Adi', 'status' => 'Sesuai'],
                            ['no' => 2, 'uraian' => 'Engsel', 'standar' => 'Berfungsi', 'catatan' => '', 'petugas' => 'Rafael', 'status' => 'Sesuai'],
                        ];
                        @endphp
                        @foreach($historyItems as $index => $item)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 {{ $index % 2 != 0 ? 'bg-surface-alt' : 'bg-white' }}">
                            <td class="px-4 py-3 text-center">{{ $item['no'] }}</td>
                            <td class="px-4 py-3 font-medium">{{ $item['uraian'] }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ match($item['standar']) { 'Baik' => 'bg-yellow-300 text-yellow-900', 'Berfungsi' => 'bg-blue-200 text-blue-800' } }}">
                                    {{ $item['standar'] }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <input type="text" value="{{ $item['catatan'] }}" class="w-full rounded border border-gray-300 px-2 py-1 text-sm bg-gray-50" readonly>
                            </td>
                            <td class="px-4 py-3">{{ $item['petugas'] }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                    {{ $item['status'] }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('master.mekanik2.edit') }}" class="text-blue-600 hover:text-blue-800"><span class="material-symbols-outlined text-[20px]">edit_square</span></a>
                                    <button class="text-red-600 hover:text-red-800"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection