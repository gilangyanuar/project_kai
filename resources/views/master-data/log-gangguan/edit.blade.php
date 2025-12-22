@extends('layouts.app')

@section('title', 'Master Data')
@section('breadcrumb', 'Edit Log Gangguan')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-8rem)]">

    <div class="w-full max-w-3xl rounded-xl bg-white p-10 shadow-sm border border-gray-200">

        <div class="mb-8 border-b border-gray-100 pb-4">
            <h1 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                <span class="material-symbols-outlined text-kai-navy text-3xl">edit_note</span>
                Edit Log Gangguan
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi log gangguan dengan data terbaru.
            </p>
        </div>

        <form method="POST" action="#" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700 leading-tight">
                    Identitas<br class="hidden md:block"> Komponen
                </label>
                <input
                    type="text"
                    name="identitas_komponen"
                    value="{{ old('identitas_komponen', $log->identitas_komponen ?? 'Generator Genset') }}"
                    placeholder="Nama Komponen"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700 leading-tight">
                    Bentuk<br class="hidden md:block"> Gangguan
                </label>
                <input
                    type="text"
                    name="bentuk_gangguan"
                    value="{{ old('bentuk_gangguan', $log->bentuk_gangguan ?? 'Overheating') }}"
                    placeholder="Deskripsi gangguan"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >
            </div>

            {{-- Saya ubah jadi Textarea agar lebih rapi untuk teks panjang, tapi tetap menggunakan nama field yang sama --}}
            <div class="grid grid-cols-1 md:grid-cols-4 items-start gap-4 md:gap-6">
                <label class="pt-2 font-medium text-gray-700 leading-tight">
                    Tindak<br class="hidden md:block"> Lanjut TKA
                </label>
                <textarea
                    name="tindak_lanjut"
                    rows="3"
                    placeholder="Tindakan yang dilakukan..."
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >{{ old('tindak_lanjut', $log->tindak_lanjut ?? 'Menurunkan beban genset, mengecek sistem pendingin, genset stabil.') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-4 md:gap-6">
                <label class="font-medium text-gray-700 leading-tight">
                    Dikerjakan<br class="hidden md:block"> oleh TKA
                </label>
                <input
                    type="text"
                    name="dikerjakan_oleh"
                    value="{{ old('dikerjakan_oleh', $log->dikerjakan_oleh ?? 'Darmo') }}"
                    placeholder="Nama Petugas"
                    class="md:col-span-3 w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                >
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-gray-100 mt-8">
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