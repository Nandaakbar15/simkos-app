@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">

        <div class="mb-8 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Data Kamar</h1>
        </div>

        <div class="mt-3">
            <h2>
                <a href="/dashboard/kamar/view_form_tambah_data_kamar"
                    class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">
                    Tambah Data Kamar
                </a>
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-3">

            <div class="lg:col-span-2 bg-slate-800 rounded-2xl shadow-lg p-6 animate-fade-up" style="animation-delay:0.4s">

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Daftar Kamar</h3>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-xs text-white uppercase tracking-wider">
                                <th class="pb-4 font-medium">ID Kamar</th>
                                <th class="pb-4 font-medium">Nama Kosts</th>
                                <th class="pb-4 font-medium">Nomor Kamar</th>
                                <th class="pb-4 font-medium">Harga Bulanan</th>
                                <th class="pb-4 font-medium">Status Kamar</th>
                                <th class="pb-4 font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach ($room as $item)
                                <tr class="table-row transition rounded-lg">
                                    <td class="py-4 font-semibold text-sm text-white">{{ $item->id }}</td>
                                    <td class="py-4 font-semibold text-sm text-white">{{ $item->kosts->nama_kosts }}</td>
                                    <td class="py-4 font-semibold text-sm text-white">{{ $item->nomor_kamar }}</td>
                                    <td class="py-4 font-semibold text-sm text-white">Rp. {{ $item->harga_bulanan }}</td>
                                    <td class="py-4 font-semibold text-sm text-white">{{ $item->status }}</td>
                                    <td class="space-x-1 py-4">
                                        <a href="/dashboard/kamar/view_form_edit_data_kamar/{{ $item->id }}"
                                            class="inline-block rounded-lg text-white px-3 py-1.5 bg-blue-500 hover:bg-blue-700 transition text-xs font-medium">
                                            Edit
                                        </a>
                                        <button
                                            class="inline-block rounded-lg text-white px-3 py-1.5 bg-red-500 hover:bg-red-700 transition text-xs font-medium">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-content mt-3">
                    {{ $room->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
