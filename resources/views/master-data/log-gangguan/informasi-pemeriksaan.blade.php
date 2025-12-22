@extends('layouts.app')

@section('title', 'Laporan KA 120 - Argo Bromo Anggrek')
@section('breadcrumb', 'Sabtu, 22 November 2025')

@section('content')

    <x-master-nav />

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8 pb-10">
        
        <h2 class="text-lg font-bold text-gray-900 mb-8 border-b border-gray-100 pb-4">
            Log Gangguan - Informasi Pemeriksaan
        </h2>

        <form action="#" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Master ID</label>
                <div class="md:col-span-3">
                    <input type="text" value="12039" readonly 
                           class="w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-600 focus:outline-none shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Nomor KA</label>
                <div class="md:col-span-3">
                    <input type="text" value="KA - 120" readonly 
                           class="w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-600 focus:outline-none shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Tanggal Inspeksi</label>
                <div class="md:col-span-3">
                    <input type="text" value="22 November 2025" readonly 
                           class="w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-600 focus:outline-none shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-start gap-4" x-data="{ open: false, selected: 'Draft' }">
                <label class="font-bold text-gray-800 pt-2">Status</label>
                <div class="md:col-span-3 relative">
                    
                    <button @click="open = !open" type="button" 
                        class="inline-flex items-center justify-between gap-3 px-4 py-2 rounded-md text-white text-sm font-medium w-40 transition shadow-sm"
                        :class="{
                            'bg-[#9fa6b2]': selected === 'Draft',
                            'bg-yellow-400': selected === 'Pending',
                            'bg-orange-400': selected === 'Approval', 
                            'bg-emerald-500': selected === 'Approved',
                            'bg-red-500': selected === 'Rejected'
                        }">
                        <span x-text="selected"></span>
                        <span class="material-symbols-outlined text-sm">edit</span>
                    </button>

                    <div x-show="open" @click.outside="open = false" 
                         class="absolute z-10 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden"
                         style="display: none;">
                        
                        <div class="p-2 space-y-1">
                            @foreach(['Draft', 'Pending', 'Approval', 'Approved', 'Rejected'] as $status)
                                @php
                                    $colorClass = match($status) {
                                        'Draft' => 'bg-[#9fa6b2]',
                                        'Pending' => 'bg-yellow-400',
                                        'Approval' => 'bg-orange-400',
                                        'Approved' => 'bg-emerald-500',
                                        'Rejected' => 'bg-red-500',
                                    };
                                @endphp

                                <div @click="selected = '{{ $status }}'; open = false" class="flex items-center gap-3 p-2 hover:bg-gray-50 cursor-pointer rounded-md">
                                    <div class="w-5 h-5 border border-gray-300 rounded flex items-center justify-center" 
                                         :class="selected === '{{ $status }}' ? 'bg-kai-navy border-kai-nabg-kai-navy' : ''">
                                        <span x-show="selected === '{{ $status }}'" class="material-symbols-outlined text-white text-sm">check</span>
                                    </div>
                                    <span class="px-3 py-1 {{ $colorClass }} text-white text-xs font-bold rounded w-full text-center">{{ $status }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Pengawas</label>
                <div class="md:col-span-3">
                    <input type="text" value="Ali" readonly 
                           class="w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-600 focus:outline-none shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4">
                <label class="font-bold text-gray-800">Mekanik</label>
                <div class="md:col-span-3">
                    <input type="text" value="Amir" readonly 
                           class="w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-600 focus:outline-none shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-start gap-4">
                <label class="font-bold text-gray-800 pt-2">Catatan Pengawas</label>
                <div class="md:col-span-3">
                    <textarea rows="4" class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"></textarea>
                </div>
            </div>

        </form>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('master.log-gangguan.gangguan-kereta') }}" 
               class="bg-kai-navy hover:bg-opacity-90 text-white px-6 py-2.5 rounded-lg text-sm font-semibold flex items-center gap-2 shadow-md transition">
                Next
                <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </a>
        </div>

    </div>

@endsection