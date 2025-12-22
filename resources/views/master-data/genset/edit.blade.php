@extends('layouts.app')

@section('title', 'Master Data')
@section('breadcrumb', 'Edit Genset')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-8rem)]">

    <div class="w-full max-w-3xl rounded-xl bg-white p-10 shadow-sm border border-gray-200">

        <div class="mb-8 border-b border-gray-100 pb-4">
            <h1 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                <span class="material-symbols-outlined text-kai-navy text-3xl">bolt</span>
                Edit Genset
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Perbarui hasil pemeriksaan dan standar operasional genset.
            </p>
        </div>

        <form method="POST" action="#" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700 leading-tight">
                    Suku Yang<br class="hidden md:block"> Diperiksa
                </label>
                <input
                    type="text"
                    name="suku_diperiksa"
                    value="{{ old('suku_diperiksa', $genset->suku_diperiksa ?? 'Bocor tetesan pelumas') }}"
                    placeholder="Bagian yang diperiksa"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >
            </div>

           <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">Standar</label>
    
                <div class="md:col-span-3 relative" 
                    x-data="{ 
                        open: false, 
                        selected: '{{ old('standar', $electric->standar ?? 'Berfungsi') }}' 
                    }">
                    
                    <input type="hidden" name="standar" :value="selected">

                    <button @click="open = !open" type="button" 
                        class="w-full min-w-35 flex items-center justify-between gap-4 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-left focus:outline-none focus:ring-2 focus:ring-indigo-500 transition shadow-sm">
                        
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold transition-colors whitespace-nowrap"
                                :class="{
                                    'bg-green-100 text-green-700': selected === 'Berfungsi' || selected === 'Menyala' || selected === 'Normal',
                                    'bg-red-100 text-red-700': selected === 'Tidak Berfungsi' || selected === 'Rusak' || selected === 'Mati',
                                    'bg-gray-200 text-gray-700': !['Berfungsi', 'Menyala', 'Normal', 'Tidak Berfungsi', 'Rusak', 'Mati'].includes(selected)
                                }">
                                <span x-text="selected"></span>
                            </span>
                        </div>

                        <span class="material-symbols-outlined text-gray-500 transition-transform duration-200" 
                            :class="open ? 'rotate-180' : ''">
                            expand_more
                        </span>
                    </button>

                    <div x-show="open" 
                        @click.outside="open = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2 w-fit min-w-35 bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden" 
                        style="display: none;">
                        
                        <div class="p-1 space-y-1">
                            {{-- Loop Opsi --}}
                            @foreach(['Berfungsi', 'Tidak Berfungsi'] as $option)
                                @php
                                    // Logic Warna Badge List
                                    $bgClass = match($option) {
                                        'Berfungsi' => 'bg-green-100 text-green-700',
                                        'Tidak Berfungsi' => 'bg-red-100 text-red-700',
                                        default => 'bg-gray-200 text-gray-700'
                                    };
                                @endphp

                                <div @click="selected = '{{ $option }}'; open = false" 
                                    class="flex items-center gap-3 p-2 hover:bg-gray-50 cursor-pointer rounded-md transition-colors">
                                    
                                    <div class="w-5 h-5 shrink-0 border border-gray-300 rounded flex items-center justify-center transition-colors"
                                        :class="selected === '{{ $option }}' ? 'bg-kai-navy border-kai-navy' : ''">
                                        <span x-show="selected === '{{ $option }}'" class="material-symbols-outlined text-white text-[14px]">check</span>
                                    </div>

                                    <span class="px-3 py-1 rounded-full text-xs font-bold w-full text-center whitespace-nowrap {{ $bgClass }}">
                                        {{ $option }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700 leading-tight">
                    Hasil<br class="hidden md:block"> Pemeriksaan
                </label>

                <div class="md:col-span-3 relative" 
                    x-data="{ 
                        open: false, 
                        selected: '{{ old('hasil_pemeriksaan', $genset->hasil_pemeriksaan ?? 'Ada') }}' 
                    }">
                    
                    <input type="hidden" name="hasil_pemeriksaan" :value="selected">

                    <button @click="open = !open" type="button" 
                        class="w-full min-w-35 flex items-center justify-between gap-4 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-left focus:outline-none focus:ring-2 focus:ring-indigo-500 transition shadow-sm">
                        
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold transition-colors whitespace-nowrap"
                                :class="{
                                    'bg-yellow-300 text-yellow-900': selected === 'Ada',
                                    'bg-gray-500 text-white': selected === 'Tidak Ada'
                                }">
                                <span x-text="selected"></span>
                            </span>
                        </div>

                        <span class="material-symbols-outlined text-gray-500 transition-transform duration-200" 
                            :class="open ? 'rotate-180' : ''">
                            expand_more
                        </span>
                    </button>

                    <div x-show="open" 
                        @click.outside="open = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2 w-fit min-w-35 bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden" 
                        style="display: none;">
                        
                        <div class="p-1 space-y-1">
                            @foreach(['Ada', 'Tidak Ada'] as $option)
                                @php
                                    $bgClass = $option === 'Ada' ? 'bg-yellow-300 text-yellow-900' : 'bg-gray-500 text-white';
                                @endphp

                                <div @click="selected = '{{ $option }}'; open = false" 
                                    class="flex items-center gap-3 p-2 hover:bg-gray-50 cursor-pointer rounded-md transition-colors">
                                    
                                    <div class="w-5 h-5 shrink-0 border border-gray-300 rounded flex items-center justify-center transition-colors"
                                        :class="selected === '{{ $option }}' ? 'bg-kai-navy border-kai-navy' : ''">
                                        <span x-show="selected === '{{ $option }}'" class="material-symbols-outlined text-white text-[14px]">check</span>
                                    </div>

                                    <span class="px-3 py-1 rounded-full text-xs font-bold w-full text-center whitespace-nowrap {{ $bgClass }}">
                                        {{ $option }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">Petugas</label>
                <input
                    type="text"
                    name="petugas"
                    value="{{ old('petugas', $genset->petugas ?? 'Adi') }}"
                    placeholder="Nama Petugas"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-start gap-4 md:gap-6">
                <label class="pt-2 font-medium text-gray-700">Keterangan</label>
                <textarea
                    name="keterangan"
                    rows="3"
                    placeholder="Tambahkan keterangan tambahan..."
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >{{ old('keterangan', $genset->keterangan ?? '') }}</textarea>
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-gray-100 mt-8">
                {{-- {{ route('genset.index') }} --}}
                <a href="#"
                   class="rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-gray-700 font-medium hover:bg-gray-50 transition">
                    Batal
                </a>

                <button type="submit"
                    class="rounded-lg bg-kai-navy px-6 py-2.5 text-white font-medium shadow-sm hover:bg-opacity-90 transition flex items-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection