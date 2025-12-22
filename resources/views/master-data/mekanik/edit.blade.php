@extends('layouts.app')

{{-- Mengatur Header dan Breadcrumb --}}
@section('title', 'Master Data')
@section('breadcrumb', 'Edit Mekanik')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-8rem)]">

    <div class="w-full max-w-3xl rounded-xl bg-white p-10 shadow-sm border border-gray-200">

        <div class="mb-8 border-b border-gray-100 pb-4">
            <h1 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                <span class="material-symbols-outlined text-kai-navy text-3xl">build</span>
                Edit Mekanik
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi item, standar, dan kondisi mekanik.
            </p>
        </div>

        {{-- {{ route('mekanik.update', $mekanik->id ?? '#') }} --}}
        <form method="POST" action="#" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">
                    Nama item <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    name="nama_item"
                    value="{{ old('nama_item', $mekanik->nama_item ?? 'Pegangan Rem') }}"
                    placeholder="Contoh: Pegangan Rem"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    required
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">
                    Standar
                </label>

                <div class="md:col-span-3 relative">
                    <input
                        type="text"
                        value="{{ old('standar', $mekanik->standar ?? 'Lengkap') }}"
                        readonly
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-gray-600 focus:outline-none cursor-not-allowed"
                    >

                    <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-3">
                        
                        <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700 border border-emerald-200">
                            Baik
                        </span>

                        <div class="h-4 w-px bg-gray-300"></div> 

                        <button type="button"
                            class="text-gray-400 hover:text-kai-navy transition"
                            title="Edit Standar">
                            <span class="material-symbols-outlined text-[20px]">edit_square</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">
                    Kondisi
                </label>
                <input
                    type="text"
                    name="kondisi"
                    value="{{ old('kondisi', $mekanik->kondisi ?? 'Rusak') }}"
                    placeholder="Contoh: Rusak Ringan / Berat"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-start gap-4 md:gap-6">
                <label class="pt-2 font-medium text-gray-700">
                    Keterangan
                </label>
                <textarea
                    name="keterangan"
                    rows="3"
                    placeholder="Tambahkan catatan perbaikan..."
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >{{ old('keterangan', $mekanik->keterangan ?? 'Sudah diperbaiki') }}</textarea>
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-gray-100 mt-8">
                {{-- {{ route('mekanik.index') }} --}}
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