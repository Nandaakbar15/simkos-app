<div class="card-hover bg-gradient-to-br from-emerald-500/20 to-teal-500/10 glass rounded-2xl p-6 transition-all duration-500 animate-fade-up"
    style="animation-delay:0.2s">
    <div class="flex items-start justify-between mb-4">
        <div class="w-12 h-12 bg-emerald-500/20 rounded-2xl flex items-center justify-center">
            <i class="fas fa-shopping-bag text-emerald-400 text-lg"></i>
        </div>
        <span class="bg-green-500/20 text-green-400 text-xs font-semibold px-2.5 py-1 rounded-full">
            <i class="fas fa-arrow-up mr-1"></i>{{ $totalRooms > 0 ? round(($roomsOccupied / $totalRooms) * 100, 1) : 0 }}%
        </span>
    </div>
    <h3 class="text-3xl font-bold mb-1">{{ $roomsOccupied }}</h3>
    <p class="text-white/40 text-sm">Kamar Terisi</p>
</div>
