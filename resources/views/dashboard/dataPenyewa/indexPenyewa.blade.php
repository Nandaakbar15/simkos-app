@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">

        <div class="mb-6 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Data Penyewa</h1>
        </div>

        <div class="mb-6">
            <a href="/dashboard/penyewa/view_form_tambah_data_penyewa"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2.5 bg-blue-600 hover:bg-blue-700 font-medium text-sm transition">
                <i class="fas fa-plus mr-2"></i> Tambah Data Penyewa
            </a>
        </div>

        <div class="w-full bg-slate-800 rounded-2xl shadow-lg p-6 animate-fade-up" style="animation-delay:0.4s">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-white">Daftar Penyewa</h3>
                    <p class="text-white/40 text-sm">Kelola berkas identitas dan informasi personal penyewa kost</p>
                </div>
            </div>

            <div class="overflow-x-auto backend-scrollbar">
                <table class="w-full min-w-[1100px] text-left border-collapse">
                    <thead>
                        <tr class="text-xs text-white/40 uppercase tracking-wider border-b border-white/5">
                            <th class="pb-4 font-medium pl-2">ID</th>
                            <th class="pb-4 font-medium">Foto KTP</th>
                            <th class="pb-4 font-medium">Nama</th>
                            <th class="pb-4 font-medium">NIK</th>
                            <th class="pb-4 font-medium">No. HP</th>
                            <th class="pb-4 font-medium max-w-[250px]">Alamat</th>
                            <th class="pb-4 font-medium">Pekerjaan</th>
                            <th class="pb-4 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach ($tenants as $item)
                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-4 font-semibold text-sm text-white/50 pl-2">#{{ $item->id }}</td>
                                <td class="py-4">
                                    <div
                                        class="w-24 h-14 overflow-hidden rounded-lg border border-white/10 bg-slate-900 flex items-center justify-center">
                                        <img src="{{ asset($item->foto_ktp) }}" alt="KTP"
                                            class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="py-4 font-semibold text-sm text-white">{{ $item->nama }}</td>
                                <td class="py-4 text-sm text-white/70 font-mono">{{ $item->nik }}</td>
                                <td class="py-4 text-sm text-white/70">{{ $item->no_hp }}</td>
                                <td class="py-4 text-sm text-white/60 max-w-[250px] break-words pr-4">{{ $item->alamat }}
                                </td>
                                <td class="py-4 text-sm text-white/80"><span
                                        class="px-2.5 py-1 rounded-md bg-white/5 text-xs">{{ $item->pekerjaan }}</span></td>
                                <td class="py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/dashboard/penyewa/view_form_edit_data_penyewa/{{ $item->id }}"
                                            class="inline-block rounded-lg text-blue-400 px-3 py-1.5 bg-blue-500/10 hover:bg-blue-500/20 transition text-xs font-medium">
                                            Edit
                                        </a>
                                        <button
                                            class="inline-block rounded-lg text-red-400 px-3 py-1.5 bg-red-500/10 hover:bg-red-500/20 transition text-xs font-medium">
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
                {{ $tenants->links() }}
            </div>

        </div>
    </div>
@endsection
