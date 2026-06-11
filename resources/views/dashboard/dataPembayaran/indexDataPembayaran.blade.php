@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">

        <div class="mb-6 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Data Pembayaran</h1>
        </div>

        <div class="mb-6">
            <a href="/dashboard/pembayaran/view_form_tambah_data_pembayaran"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2.5 bg-blue-600 hover:bg-blue-700 font-medium text-sm transition">
                <i class="fas fa-plus mr-2"></i> Tambah Data Pembayaran
            </a>
        </div>

        <div class="w-full bg-slate-800 rounded-2xl shadow-lg p-6 animate-fade-up" style="animation-delay:0.4s">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-white">Daftar Pembayaran</h3>
                    <p class="text-white/40 text-sm">Kelola data pembayaran dan informasi mengenai status pembayaran para
                        penyewa
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto backend-scrollbar">
                <table class="w-full min-w-[1100px] text-left border-collapse">
                    <thead>
                        <tr class="text-xs text-white/40 uppercase tracking-wider border-b border-white/5">
                            <th class="pb-4 font-medium pl-2">ID</th>
                            <th class="pb-4 font-medium">Nama Penyewa</th>
                            <th class="pb-4 font-medium">Tanggal Pembayaran</th>
                            <th class="pb-4 font-medium">Jumlah Pembayaran</th>
                            <th class="pb-4 font-medium max-w-[250px]">Metode Pembayaran</th>
                            <th class="pb-4 font-medium max-w-[250px]">Bukti Pembayaran</th>
                            <th class="pb-4 font-medium">Catatan</th>
                            <th class="pb-4 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach ($payments as $item)
                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-4 font-semibold text-sm text-white/50 pl-2">#{{ $item->id }}</td>
                                <td class="py-4 font-semibold text-sm text-white">{{ $item->bills->rentals->tenants->nama }}</td>
                                <td class="py-4 font-semibold text-sm text-white">{{ $item->tgl_bayar }}
                                </td>
                                <td class="py-4 font-semibold text-sm text-white">Rp. {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                                <td class="py-4 text-sm text-white/70 max-w-[250px] break-words pr-4">
                                    {{ $item->metode_pembayaran }}
                                </td>
                                <td class="py-4 text-sm text-white/70 max-w-[250px] break-words pr-4">
                                    @if ($item->bukti_pembayaran)
                                        <a href="{{ $item->bukti_pembayaran }}" target="_blank" class="text-blue-400 hover:text-blue-300">
                                            Lihat Bukti
                                        </a>
                                    @else
                                        <span class="text-gray-500">-</span>
                                    @endif
                                </td>
                                <td class="py-4 text-sm text-white/70 max-w-[250px] break-words pr-4">
                                    {{ $item->catatan ?? '-' }}
                                </td>
                                <td class="py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/dashboard/pembayaran/view_form_edit_data_pembayaran/{{ $item->id }}"
                                            class="inline-block rounded-lg shadow-lg text-white px-4 py-2 bg-blue-500 hover:bg-blue-700 transition text-xs font-medium">
                                            Edit
                                        </a>
                                        <form action="/dashboard/pembayaran/delete_data_pembayaran/{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="inline-block rounded-lg shadow-lg text-white px-4 py-2 bg-red-500 hover:bg-red-700 transition text-xs font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end mt-6 border-t border-white/5 pt-4">
                {{ $payments->links() }}
            </div>

        </div>
    </div>
@endsection
