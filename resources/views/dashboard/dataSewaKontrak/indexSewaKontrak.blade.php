@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">

        <div class="mb-6 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Data Sewa / Kontrak</h1>
        </div>

        <div class="mb-6">
            <a href="/dashboard/sewa_kontrak/view_form_tambah_data_sewa_kontrak"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2.5 bg-blue-600 hover:bg-blue-700 font-medium text-sm transition">
                <i class="fas fa-plus mr-2"></i> Tambah Data Sewa / Kontrak
            </a>
        </div>

        <div class="w-full bg-slate-800 rounded-2xl shadow-lg p-6 animate-fade-up" style="animation-delay:0.4s">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-white">Daftar Sewa / Kontrak</h3>
                    <p class="text-white/40 text-sm">Kelola data sewa / kontrak dan informasi mengenai status kontrak / sewa
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto backend-scrollbar">
                <table class="w-full min-w-[1100px] text-left border-collapse">
                    <thead>
                        <tr class="text-xs text-white/40 uppercase tracking-wider border-b border-white/5">
                            <th class="pb-4 font-medium pl-2">ID</th>
                            <th class="pb-4 font-medium">Nama Penyewa</th>
                            <th class="pb-4 font-medium">Nomor Kamar</th>
                            <th class="pb-4 font-medium max-w-[250px]">Tanggal Masuk</th>
                            <th class="pb-4 font-medium max-w-[250px]">Tanggal Keluar</th>
                            <th class="pb-4 font-medium max-w-[250px]">Harga Sewa</th>
                            <th class="pb-4 font-medium max-w-[250px]">Deposit</th>
                            <th class="pb-4 font-medium">Status</th>
                            <th class="pb-4 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach ($rentals as $item)
                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-4 font-semibold text-sm text-white/50 pl-2">#{{ $item->id }}</td>
                                <td class="py-4 font-semibold text-sm text-white">{{ $item->tenants->nama }}</td>
                                <td class="py-4 font-semibold text-sm text-white">#{{ $item->room->nomor_kamar }}</td>
                                <td class="py-4 text-sm text-white/70 max-w-[250px] break-words pr-4">
                                    {{ $item->tgl_masuk }}
                                </td>
                                <td class="py-4 text-sm text-white/70 max-w-[250px] break-words pr-4">
                                    {{ $item->tgl_keluar }}
                                </td>
                                <td class="py-4 text-sm text-white/70 max-w-[250px] break-words pr-4">
                                    Rp. {{ $item->harga_sewa }}
                                </td>
                                <td class="py-4 text-sm text-white/70 max-w-[250px] break-words pr-4">
                                    {{ $item->deposit }} %
                                </td>
                                <td class="py-4 text-sm text-white/70 max-w-[250px] break-words pr-4">
                                    {{ $item->status }}
                                </td>
                                <td class="py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/dashboard/sewa_kontrak/view_form_edit_data_sewa_kontrak/{{ $item->id }}"
                                            class="inline-block rounded-lg shadow-lg text-white px-4 py-2 bg-blue-500 hover:bg-blue-700 transition text-xs font-medium">
                                            Edit
                                        </a>
                                        <button
                                            class="inline-block rounded-lg shadow-lg text-white px-4 py-2 bg-red-500 hover:bg-red-700 transition text-xs font-medium">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end mt-6 border-t border-white/5 pt-4">
                {{ $rentals->links() }}
            </div>

        </div>
    </div>
@endsection
