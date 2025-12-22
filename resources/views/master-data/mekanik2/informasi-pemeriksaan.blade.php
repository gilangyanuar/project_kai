@extends('layouts.app')

@section('title', 'Laporan KA 120 - Argo Bromo Anggrek')
@section('breadcrumb', 'Sabtu, 22 November 2025')

@section('content')

    <x-master-nav />

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8 pb-10">
        
        <h2 class="text-lg font-bold text-gray-900 mb-8">
            Mekanik 2 - Informasi Pemeriksaan
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
                            <div @click="selected = 'Draft'; open = false" class="flex items-center gap-3 p-2 hover:bg-gray-50 cursor-pointer rounded-md">
                                <div class="w-5 h-5 border border-gray-300 rounded flex items-center justify-center" 
                                     :class="selected === 'Draft' ? 'bg-kai-navy border-kai-navy' : ''">
                                    <span x-show="selected === 'Draft'" class="material-symbols-outlined text-white text-sm">check</span>
                                </div>
                                <span class="px-3 py-1 bg-[#9fa6b2] text-white text-xs font-bold rounded w-full text-center">Draft</span>
                            </div>

                            <div @click="selected = 'Pending'; open = false" class="flex items-center gap-3 p-2 hover:bg-gray-50 cursor-pointer rounded-md">
                                <div class="w-5 h-5 border border-gray-300 rounded flex items-center justify-center"
                                     :class="selected === 'Pending' ? 'bg-kai-navy border-kai-navy' : ''">
                                    <span x-show="selected === 'Pending'" class="material-symbols-outlined text-white text-sm">check</span>
                                </div>
                                <span class="px-3 py-1 bg-yellow-400 text-white text-xs font-bold rounded w-full text-center">Pending</span>
                            </div>

                            <div @click="selected = 'Approval'; open = false" class="flex items-center gap-3 p-2 hover:bg-gray-50 cursor-pointer rounded-md">
                                <div class="w-5 h-5 border border-gray-300 rounded flex items-center justify-center"
                                     :class="selected === 'Approval' ? 'bg-kai-navy border-kai-navy' : ''">
                                    <span x-show="selected === 'Approval'" class="material-symbols-outlined text-white text-sm">check</span>
                                </div>
                                <span class="px-3 py-1 bg-orange-400 text-white text-xs font-bold rounded w-full text-center">Approval</span>
                            </div>

                            <div @click="selected = 'Approved'; open = false" class="flex items-center gap-3 p-2 hover:bg-gray-50 cursor-pointer rounded-md">
                                <div class="w-5 h-5 border border-gray-300 rounded flex items-center justify-center"
                                     :class="selected === 'Approved' ? 'bg-kai-navy border-kai-navy' : ''">
                                    <span x-show="selected === 'Approved'" class="material-symbols-outlined text-white text-sm">check</span>
                                </div>
                                <span class="px-3 py-1 bg-emerald-500 text-white text-xs font-bold rounded w-full text-center">Approved</span>
                            </div>

                            <div @click="selected = 'Rejected'; open = false" class="flex items-center gap-3 p-2 hover:bg-gray-50 cursor-pointer rounded-md">
                                <div class="w-5 h-5 border border-gray-300 rounded flex items-center justify-center"
                                     :class="selected === 'Rejected' ? 'bg-kai-navy border-kai-navy' : ''">
                                    <span x-show="selected === 'Rejected'" class="material-symbols-outlined text-white text-sm">check</span>
                                </div>
                                <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded w-full text-center">Rejected</span>
                            </div>
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
            <a href="{{ route('master.mekanik2.pemeriksaan') }}" 
               class="bg-kai-navy hover:bg-opacity-90 text-white px-6 py-2.5 rounded-lg text-sm font-semibold flex items-center gap-2 shadow-md transition">
                Next
                <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </a>
        </div>

    </div>

@endsection