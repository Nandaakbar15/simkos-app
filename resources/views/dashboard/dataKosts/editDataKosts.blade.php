@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">
        <div class="mb-8 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Form Edit Data Kosts</h1>
        </div>

        <div class="lg:col-span-2 bg-slate-800 rounded-2xl p-6 animate-fade-up" style="animation-delay:0.4s">
            <form action="/dashboard/kosts/edit_data_kosts/{{ $kosts->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-12">
                    <div class="border-b border-white/10 pb-12">
                        <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="nama_kosts" class="block text-sm/6 font-medium text-white">Nama Kosts <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="nama_kosts" type="text" name="nama_kosts"
                                            placeholder="masukan nama kost"
                                            value="{{ old('nama_kosts', $kosts->nama_kosts) }}"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="alamat" class="block text-sm/6 font-medium text-white">Alamat Kosts <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="alamat" type="text" name="alamat"
                                            placeholder="masukan alamat kosts" value="{{ old('alamat', $kosts->alamat) }}"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="jumlah_kamar" class="block text-sm/6 font-medium text-white">Jumlah
                                    Kamar <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="jumlah_kamar" type="number" name="jumlah_kamar"
                                            placeholder="masukan jumlah kamar kosts"
                                            value="{{ old('jumlah_kamar', $kosts->jumlah_kamar) }}"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Ubah!</button>
                </div>
            </form>
        </div>
        <div class="mt-3">
            <a href="/dashboard/kosts/data_kosts"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">Kembali</a>
        </div>
    </div>
@endsection
