@extends('layouts.app')

@section('title', 'Manajemen User')
@section('breadcrumb', 'Tambah Data User')

@section('content')

<div class="flex items-center justify-center min-h-[calc(100vh-8rem)]">
    <div class="w-full max-w-4xl bg-white border border-gray-200 rounded-xl shadow-sm p-10">

        <div class="flex items-center gap-3 mb-2">
            <span class="material-symbols-outlined text-3xl text-kai-navy">
                person_add
            </span>
            <h1 class="text-3xl font-bold text-gray-800">
                Tambah Data User
            </h1>
        </div>

        <p class="text-gray-500 mb-10">
            Lengkapi formulir di bawah untuk menambahkan pengguna baru.
        </p>

        <form action="#" method="POST" class="space-y-8">
            @csrf

            <x-input label="NIPP" name="nipp" placeholder="Masukkan NIPP User" />
            <x-input label="Nama" name="nama" placeholder="Masukkan Nama Lengkap" />

            <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-6">
                <label class="font-medium text-gray-800">Jabatan</label>

                <div class="col-span-3 relative">
                    <select name="jabatan"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 appearance-none bg-white cursor-pointer transition">
                        <option selected disabled>Pilih Jabatan</option>
                        <option value="Mekanik">Mekanik</option>
                        <option value="Pengawas">Pengawas</option>
                    </select>
                    
                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">
                        expand_more
                    </span>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-14">
                <a href="{{ url()->previous() }}"
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center justify-center">
                    Batal
                </a>

                <button type="submit"
                    class="px-6 py-3 rounded-lg bg-kai-navy text-white font-semibold hover:bg-opacity-90 transition shadow-md">
                    Simpan Data
                </button>
            </div>
        </form>

    </div>
</div>

@endsection