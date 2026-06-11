@extends('dashboard.layouts.main')

@section('content')
    <div class="p-8">

        <div class="mb-6 anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Halaman Data User</h1>
        </div>

        <div class="mb-6">
            <a href="/dashboard/user/view_form_tambah_data_user_owner"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2.5 bg-blue-600 hover:bg-blue-700 font-medium text-sm transition">
                <i class="fas fa-plus mr-2"></i> Tambah Data User Owner
            </a>
        </div>

        <div class="w-full bg-slate-800 rounded-2xl shadow-lg p-6 animate-fade-up" style="animation-delay:0.4s">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-white">Daftar User</h3>
                    <p class="text-white/40 text-sm">Kelola data user</p>
                </div>
            </div>

            <div class="overflow-x-auto backend-scrollbar">
                <table class="w-full min-w-[1100px] text-left border-collapse">
                    <thead>
                        <tr class="text-xs text-white/40 uppercase tracking-wider border-b border-white/5">
                            <th class="pb-4 font-medium pl-2">ID</th>
                            <th class="pb-4 font-medium">Nama User</th>
                            <th class="pb-4 font-medium max-w-[250px]">Email</th>
                            <th class="pb-4 font-medium">Role</th>
                            <th class="pb-4 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach ($users as $item)
                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-4 font-semibold text-sm text-white/50 pl-2">#{{ $item->id }}</td>
                                <td class="py-4 font-semibold text-sm text-white">{{ $item->name }}</td>
                                <td class="py-4 text-sm text-white/60 max-w-[250px] break-words pr-4">{{ $item->email }}
                                </td>
                                <td class="py-4 text-sm text-white/70">{{ $item->role }}</td>
                                <td class="py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/dashboard/user/detail_user/{{ $item->id }}"
                                            class="inline-block rounded-lg shadow-lg text-white px-4 py-2 bg-blue-500 hover:bg-blue-700 transition text-xs font-medium">
                                            Detail
                                        </a>
                                        <form action="/dashboard/user/delete_data_kamar/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="inline-block rounded-lg shadow-lg text-white px-3 py-1.5 bg-red-500 hover:bg-red-700 transition text-xs font-medium">
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
                {{ $users->links() }}
            </div>

        </div>
    </div>
@endsection
