@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">
        <div class="mb-8 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Form Tambah Data Pembayaran
            </h1>
        </div>

        <div class="lg:col-span-2 bg-slate-800 rounded-2xl p-6 animate-fade-up" style="animation-delay:0.4s">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-600 text-white rounded-md">
                    <h3 class="font-bold mb-2">Terjadi kesalahan:</h3>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/dashboard/pembayaran/tambah_data_pembayaran" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-white/10 pb-12">
                        <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="bill_id" class="block text-sm/6 font-medium text-white">Tagihan <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2 grid grid-cols-1">
                                    @if ($bills->count() > 0)
                                        <select id="bill_id" name="bill_id"
                                            class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                            <option value="">-- Pilih Tagihan --</option>
                                            @foreach ($bills as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->rentals->tenants->nama }} - Kamar {{ $item->rentals->room->nomor_kamar }} (Bulan {{ $item->bulan }}/{{ $item->tahun }} - Rp. {{ number_format($item->nominal, 0, ',', '.') }})
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="p-3 bg-yellow-500/20 text-yellow-200 rounded-md text-sm">
                                            Tidak ada tagihan yang perlu dibayar
                                        </div>
                                    @endif
                                    <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-400 sm:size-4">
                                        <path
                                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="nominal_display" class="block text-sm/6 font-medium text-white">Nominal Tagihan <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 py-1.5 pr-3 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500">
                                        <input id="nominal_display" type="text" readonly
                                            placeholder="Nominal akan tampil setelah memilih tagihan"
                                            class="block min-w-0 grow bg-transparent text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="nama_penyewa_display" class="block text-sm/6 font-medium text-white">Nama Penyewa
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 py-1.5 pr-3 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500">
                                        <input id="nama_penyewa_display" type="text" readonly
                                            placeholder="Nama penyewa akan tampil setelah memilih tagihan"
                                            class="block min-w-0 grow bg-transparent text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="nomor_kamar_display" class="block text-sm/6 font-medium text-white">Nomor Kamar
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 py-1.5 pr-3 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500">
                                        <input id="nomor_kamar_display" type="text" readonly
                                            placeholder="Nomor kamar akan tampil setelah memilih tagihan"
                                            class="block min-w-0 grow bg-transparent text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="tgl_bayar" class="block text-sm/6 font-medium text-white">Tanggal Bayar <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="tgl_bayar" type="date" name="tgl_bayar" placeholder="masukan bulan"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="jumlah_bayar" class="block text-sm/6 font-medium text-white">Jumlah Bayar <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="jumlah_bayar" type="number" name="jumlah_bayar"
                                            placeholder="masukan jumlah bayar"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="metode_pembayaran" class="block text-sm/6 font-medium text-white">Metode
                                    Pembayaran <span class="text-red-500">*</span></label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="metode_pembayaran" name="metode_pembayaran"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                        <option value="">-- Pilih Metode Pembayaran --</option>
                                        <option value="cash" selected>Cash</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="qris">QRIS</option>
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
                                <label for="bukti_pembayaran" class="block text-sm/6 font-medium text-white">Foto Bukti
                                    Pembayaran</label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true"
                                            class="mx-auto size-12 text-gray-600">
                                            <path
                                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                                clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm/6 text-gray-400">
                                            <label for="bukti_pembayaran"
                                                class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                                <span class="text-center">Upload foto bukti pembayaran (opsional)</span>
                                                <input id="bukti_pembayaran" type="file" name="bukti_pembayaran"
                                                    class="sr-only" />
                                            </label>
                                        </div>
                                        <p class="text-xs/5 text-gray-400">PNG, JPG, JPEG up to 10MB</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="catatan" class="block text-sm/6 font-medium text-white">Catatan</label>
                                <div class="mt-2">
                                    <textarea id="catatan" name="catatan" rows="3"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
                                </div>
                                <p class="mt-3 text-sm/6 text-gray-400">Isikan catatan pembayaran (opsional).</p>
                            </div>

                        </div>
                    </div>
                    <div class="mt-6 flex items-center gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Tambah!</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-3">
            <a href="/dashboard/pembayaran/data_pembayaran"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">Kembali</a>
        </div>
    </div>

    <script>
        // Data bills dengan informasi rental
        const billsData = @json($bills);

        document.getElementById('bill_id').addEventListener('change', function() {
            const selectedId = this.value;
            const selectedBill = billsData.find(b => b.id == selectedId);

            if (selectedBill) {
                document.getElementById('nominal_display').value = 'Rp. ' + new Intl.NumberFormat('id-ID').format(selectedBill.nominal);
                document.getElementById('nama_penyewa_display').value = selectedBill.rentals.tenants.nama;
                document.getElementById('nomor_kamar_display').value = selectedBill.rentals.room.nomor_kamar;
                document.getElementById('jumlah_bayar').value = selectedBill.nominal;
            } else {
                document.getElementById('nominal_display').value = '';
                document.getElementById('nama_penyewa_display').value = '';
                document.getElementById('nomor_kamar_display').value = '';
                document.getElementById('jumlah_bayar').value = '';
            }
        });
    </script>
@endsection
