@extends('layouts.app')

@section('title', 'Master Data')
@section('breadcrumb', 'Edit Mekanik')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-8rem)]">

    <div class="w-full max-w-3xl rounded-xl bg-white p-10 shadow-sm border border-gray-200">

        <div class="mb-8 border-b border-gray-100 pb-4">
            <h1 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                <span class="material-symbols-outlined text-kai-navy text-3xl">engineering</span>
                Edit Mekanik 2
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Perbarui data uraian, standar, dan status mekanik.
            </p>
        </div>

        <form method="POST" action="#" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">Uraian</label>
                <input
                    type="text"
                    name="uraian"
                    value="{{ old('uraian', $mekanik->uraian ?? 'Pintu') }}"
                    placeholder="Masukkan uraian pekerjaan"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">Standar</label>
                <div class="md:col-span-3 relative">
                    <select
                        name="standar"
                        class="w-full appearance-none rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white cursor-pointer transition"
                    >
                        @foreach (['Baik', 'Cukup', 'Kurang'] as $item)
                            <option
                                value="{{ $item }}"
                                @selected(old('standar', $mekanik->standar ?? 'Baik') === $item)
                            >
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">expand_more</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">Catatan</label>
                <div class="md:col-span-3 relative">
                    <select
                        name="catatan"
                        class="w-full appearance-none rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white cursor-pointer transition"
                    >
                        @foreach (['Sudah sangat baik', 'Perlu pengecekan', 'Perlu perbaikan'] as $item)
                            <option
                                value="{{ $item }}"
                                @selected(old('catatan', $mekanik->catatan ?? 'Sudah sangat baik') === $item)
                            >
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">expand_more</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">Petugas</label>
                <input
                    type="text"
                    name="petugas"
                    value="{{ old('petugas', $mekanik->petugas ?? 'Adi') }}"
                    placeholder="Nama Petugas"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">Status</label>
                <div class="md:col-span-3 relative">
                    <select
                        name="status"
                        class="w-full appearance-none rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white cursor-pointer transition"
                    >
                        @foreach (['Sesuai', 'Tidak Sesuai'] as $item)
                            <option
                                value="{{ $item }}"
                                @selected(old('status', $mekanik->status ?? 'Sesuai') === $item)
                            >
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">expand_more</span>
                </div>
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-gray-100 mt-8">
                <a
                    href="#"
                    class="rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-gray-700 font-medium hover:bg-gray-50 transition"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-kai-navy px-6 py-2.5 text-white font-medium shadow-sm hover:bg-opacity-90 transition flex items-center gap-2"
                >
                    <span class="material-symbols-outlined text-[20px]">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection