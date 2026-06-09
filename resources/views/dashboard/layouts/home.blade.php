@extends('dashboard.layouts.main')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 anim-fade-up"
        style="animation-delay: 0.05s;">
        <div>
            <h1 class="font-display text-3xl font-bold text-white tracking-tight">Dashboard Juragan Kosts</h1>
            <p class="text-slate-400 text-sm mt-1">Aplikasi mengelola kos-kosan</p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @include('dashboard.partials.cards')

        @include('dashboard.partials.cards2')

        @include('dashboard.partials.cards3')

        @include('dashboard.partials.cards4')
    </div>
@endsection
