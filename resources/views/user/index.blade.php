@extends('layouts.app')

@section('title', 'Manajemen User')
@section('breadcrumb', 'Manajemen User')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        
        <div class="p-6 border-b border-gray-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Manajemen User</h2>
                <p class="text-sm text-gray-500 mt-1">Daftar pengguna terbaru yang terdaftar.</p>
            </div>

            <div class="flex gap-3">
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">search</span>
                    <input type="text"
                        placeholder="Cari user..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm w-64 transition">
                </div>

                <a href="{{ route('user.create') }}" class="bg-kai-navy hover:bg-opacity-90 text-white px-4 py-2 rounded-lg flex items-center gap-2 text-sm font-semibold transition shadow-sm">
                    <span class="material-symbols-outlined text-[20px]">add</span>
                    Tambah
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200 bg-gray-50">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">NIPP</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Jabatan</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-sm text-gray-700">
                    <tr class="hover:bg-gray-50 border-b border-gray-100 last:border-b-0 bg-white">
                        <td class="px-6 py-4 font-medium text-gray-900">#20462</td>
                        <td class="px-6 py-4 font-mono text-gray-600">12345678910</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xs">B</div>
                                Budiman
                            </div>
                        </td>
                        <td class="px-6 py-4">Mekanik</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 border border-emerald-200 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Aktif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('user.edit') }}" class="text-gray-400 hover:text-indigo-600 transition" title="Edit">
                                    <span class="material-symbols-outlined text-[20px]">edit_square</span>
                                </a>
                                <button class="text-gray-400 hover:text-red-500 transition" title="Hapus">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 border-b border-gray-100 last:border-b-0 bg-surface-alt">
                        <td class="px-6 py-4 font-medium text-gray-900">#18933</td>
                        <td class="px-6 py-4 font-mono text-gray-600">12345678221</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-bold text-xs">L</div>
                                Latifah
                            </div>
                        </td>
                        <td class="px-6 py-4">Pengawas</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-red-100 text-red-700 border border-red-200 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                Non-Aktif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('user.edit') }}" class="text-gray-400 hover:text-indigo-600 transition" title="Edit">
                                    <span class="material-symbols-outlined text-[20px]">edit_square</span>
                                </a>
                                <button class="text-gray-400 hover:text-red-500 transition" title="Hapus">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-right">
            <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-kai-navy hover:text-indigo-800 transition">
                Lihat Semua User
                <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </a>
        </div>
    </div>

@endsection