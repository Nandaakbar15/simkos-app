@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">
        <div class="mb-8 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Form Tambah Data Penyewa</h1>
        </div>

        <div class="lg:col-span-2 bg-slate-800 rounded-2xl p-6 animate-fade-up" style="animation-delay:0.4s">
            <form action="/dashboard/penyewa/tambah_data_penyewa" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-white/10 pb-12">
                        <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="nama" class="block text-sm/6 font-medium text-white">Nama <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="nama" type="text" name="nama" placeholder="masukan nama"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="nik" class="block text-sm/6 font-medium text-white">NIK
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="nik" type="text" name="nik" placeholder="masukan nik"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="no_hp" class="block text-sm/6 font-medium text-white">Nomor HP
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="no_hp" type="text" name="no_hp" placeholder="masukan nomor hp"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="alamat" class="block text-sm/6 font-medium text-white">Alamat
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="alamat" type="text" name="alamat" placeholder="masukan alamat"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="pekerjaan" class="block text-sm/6 font-medium text-white">Pekerjaan
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="pekerjaan" type="text" name="pekerjaan"
                                            placeholder="masukan pekerjaan"
                                            class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="gambar" class="block text-sm/6 font-medium text-white">KTP
                                    <span class="text-red-500">*</span></label>
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
                                            <label for="foto_ktp"
                                                class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                                <span class="text-center">Upload foto ktp</span>
                                                <input id="foto_ktp" type="file" name="foto_ktp" class="sr-only" />
                                            </label>
                                        </div>
                                        <p class="text-xs/5 text-gray-400">PNG, JPG, JPEG up to 10MB</p>
                                    </div>
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
            <a href="/dashboard/kamar/data_kamar"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">Kembali</a>
        </div>
    </div>
@endsection
