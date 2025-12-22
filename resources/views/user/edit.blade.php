@extends('layouts.app')

@section('title', 'Manajemen User')
@section('breadcrumb', 'Edit Data User')

@section('content')

<div class="flex items-center justify-center min-h-[calc(100vh-4rem)]">
    <div class="w-full max-w-4xl bg-gray-50 border rounded-xl shadow-lg p-10">

        <!-- HEADER -->
        <div class="flex items-center gap-3 mb-2">
            <span class="material-symbols-outlined text-3xl">
                edit
            </span>
            <h1 class="text-3xl font-bold">
                Edit Data User
            </h1>
        </div>

        <p class="text-gray-600 mb-10">
            Perbarui informasi pengguna dengan data terbaru.
        </p>

        <!-- FORM -->
        <div class="space-y-8">

            <x-input label="NIPP" value="12345678221" />
            <x-input label="Nama" value="Latifah" />

            <!-- JABATAN -->
            <div class="grid grid-cols-4 items-center gap-6">
                <label class="font-medium">Jabatan</label>

                <select
                    class="col-span-3 w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>Mekanik</option>
                    <option selected>Pengawas</option>
                </select>
            </div>

        </div>

        <!-- ACTION -->
        <div class="flex justify-end gap-4 mt-14">
            <button
                class="px-6 py-3 border rounded-lg hover:bg-gray-100">
                Tidak
            </button>

            <button
                class="px-6 py-3 border rounded-lg bg-white font-semibold hover:bg-gray-100">
                Simpan
            </button>
        </div>

    </div>
</div>

@endsection
