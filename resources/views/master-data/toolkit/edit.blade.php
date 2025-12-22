@extends('layouts.app')

@section('title', 'Master Data') 
@section('breadcrumb', 'Edit Toolkit')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-8rem)]">
    
    <div class="w-full max-w-3xl rounded-xl bg-white p-10 shadow-sm border border-gray-200">

        <div class="mb-8 border-b border-gray-100 pb-4">
            <h1 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                <span class="material-symbols-outlined text-kai-navy">build_circle</span>
                Edit Toolkit
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi inventaris toolkit dengan data terbaru.
            </p>
        </div>

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
                    value="{{ old('nama_item', $toolbox->nama_item ?? 'Palu') }}"
                    placeholder="Contoh: Palu Godam"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    required
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">
                    Jumlah <span class="text-red-500">*</span>
                </label>
                <input
                    type="number"
                    name="jumlah"
                    value="{{ old('jumlah', $toolbox->jumlah ?? 2) }}"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    required
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700">
                    Kondisi
                </label>
                <div class="md:col-span-3 relative">
                    <select
                        name="kondisi"
                        class="w-full appearance-none rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent bg-white cursor-pointer transition"
                    >
                        @foreach (['Baik', 'Rusak', 'Perlu Perbaikan'] as $item)
                            <option
                                value="{{ $item }}"
                                @selected(old('kondisi', $toolbox->kondisi ?? 'Baik') === $item)
                            >
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">
                        expand_more
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-start gap-4 md:gap-6">
                <label class="pt-2 font-medium text-gray-700">
                    Keterangan
                </label>
                <textarea
                    name="keterangan"
                    rows="3"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >{{ old('keterangan', $toolbox->keterangan ?? 'Sudah diperbaiki') }}</textarea>
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-gray-100 mt-8">
                {{-- {{ route('toolbox.index') }} --}}
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