@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Daftar Jadwal Penugasan
</h2>

<div class="space-y-6">

    @php
        $jadwal = [
            ['kode' => 'KA 120', 'nama' => 'Argo Bromo Anggrek', 'jam' => '09.00'],
            ['kode' => 'KA 233', 'nama' => 'Probowangi', 'jam' => '17.30'],
            ['kode' => 'KA 7048', 'nama' => 'Gajayana', 'jam' => '16.00'],
            ['kode' => 'KA 108', 'nama' => 'Taksaka', 'jam' => '17.00'],
            ['kode' => 'KA 10', 'nama' => 'Bima', 'jam' => '16.00'],
        ];
    @endphp

    @foreach ($jadwal as $item)
        <div class="flex items-center justify-between border rounded-xl p-6">

            <div>
                <p class="text-lg font-semibold">
                    {{ $item['kode'] }} – {{ $item['nama'] }}
                </p>
                <p class="text-gray-600 mt-1">
                    Jadwal Berangkat: {{ $item['jam'] }}
                </p>
            </div>

            <a  href="{{ route('master.toolbox.informasi-pemeriksaan') }}"
                class="px-6 py-2 rounded-lg bg-indigo-900 text-white hover:bg-indigo-800 transition">
                Detail
            </a>

        </div>
    @endforeach

</div>

@endsection