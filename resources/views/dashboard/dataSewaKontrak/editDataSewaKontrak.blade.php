@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">
        <div class="mb-8 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Form Edit Data Sewa / Kontrak
            </h1>
        </div>

        <div class="lg:col-span-2 bg-slate-800 rounded-2xl p-6 animate-fade-up" style="animation-delay:0.4s">
            <form action="/dashboard/sewa_kontrak/edit_data_sewa_kontrak/{{ $rentals->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-12">
                    <div class="border-b border-white/10 pb-12">
                        <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="tenant_id" class="block text-sm/6 font-medium text-white">Nama Penyewa <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="tenant_id" name="tenant_id"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                        <option value="">-- Pilih Nama Penyewa --</option>
                                        @foreach ($tenants as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('tenant_id', $rentals->id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-400 sm:size-4">
                                        <path
                                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="room_id" class="block text-sm/6 font-medium text-white">Nomor Kamar <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="room_id" name="room_id"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                        <option value="">-- Pilih Nomor Kamar --</option>
                                        @foreach ($room as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('room_id', $rentals->id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->nomor_kamar }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-400 sm:size-4">
                                        <path
                                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="tgl_masuk" class="block text-sm/6 font-medium text-white">Tanggal Masuk <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="tgl_masuk" type="date" name="tgl_masuk"
                                            value="{{ old('tgl_masuk', $rentals->tgl_masuk) }}"
                                            placeholder="masukan tanggal masuk"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="tgl_keluar" class="block text-sm/6 font-medium text-white">Tanggal Keluar <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="tgl_keluar" type="date" name="tgl_keluar"
                                            value="{{ old('tgl_keluar', $rentals->tgl_keluar) }}"
                                            placeholder="masukan tanggal keluar"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="harga_sewa" class="block text-sm/6 font-medium text-white">Harga Sewa
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        Rp. <input id="harga_sewa" type="number" name="harga_sewa"
                                            value="{{ old('harga_sewa', $rentals->harga_sewa) }}"
                                            placeholder="nominal harga sewa"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="deposit" class="block text-sm/6 font-medium text-white">Deposit
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="deposit" type="number" name="deposit"
                                            value="{{ old('deposit', $rentals->deposit) }}" placeholder="masukan deposit"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                        %
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="status" class="block text-sm/6 font-medium text-white">Status <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="status" name="status"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                        <option value="aktif"
                                            {{ old('aktif', $item->aktif) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="selesai"
                                            {{ old('selesai', $item->selesai) == 'selesai' ? 'selected' : '' }}>Selesai
                                        </option>
                                    </select>
                                    <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-400 sm:size-4">
                                        <path
                                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Ubah!</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-3">
            <a href="/dashboard/sewa_kontrak/data_sewa_kontrak"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">Kembali</a>
        </div>
    </div>
@endsection
