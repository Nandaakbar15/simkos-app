<div class="card-hover bg-gradient-to-br from-rose-500/20 to-pink-500/10 glass rounded-2xl p-6 transition-all duration-500 animate-fade-up"
    style="animation-delay:0.4s">
    <div class="flex items-start justify-between mb-4">
        <div class="w-12 h-12 bg-rose-500/20 rounded-2xl flex items-center justify-center">
            <i class="fas fa-users text-rose-400 text-lg"></i>
        </div>
        <span class="@if ($revenuePercentage >= 0) bg-green-500/20 text-green-400 @else bg-red-500/20 text-red-400 @endif text-xs font-semibold px-2.5 py-1 rounded-full">
            <i class="fas fa-arrow-@if ($revenuePercentage >= 0) up @else down @endif mr-1"></i>{{ abs(number_format($revenuePercentage, 1)) }}%
        </span>
    </div>
    <h3 class="text-3xl font-bold mb-1">Rp. {{ number_format($monthlyRevenue, 0, ',', '.') }}</h3>
    <p class="text-white/40 text-sm">Pendapatan bulan ini</p>
</div>
