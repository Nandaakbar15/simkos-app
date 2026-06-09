<!-- Sidebar -->
<aside id="sidebar" class="fixed top-0 left-0 h-full w-64 glass z-50 flex flex-col transition-all duration-500">
    <!-- Logo -->
    <div class="p-6 flex items-center gap-3">
        <div
            class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center glow">
            <i class="fas fa-shapes text-lg"></i>
        </div>
        <span class="logo-text font-bold gradient-text transition-all duration-300">Juragan Kos App</span>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 mt-4">
        <div class="space-y-1">
            <a href="/dashboard/home"
                class="nav-link active sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/20 text-white">
                <i class="fas fa-home sidebar-icon text-primary w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text font-medium transition-all duration-300">Dashboard</span>
            </a>
            <a href="/dashboard/user/data_user"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white">
                <i class="fas fa-chart-pie sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data User</span>
            </a>
            <a href="/dashboard/kosts/data_kosts"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white">
                <i class="fas fa-shopping-cart sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data Kost</span>
            </a>
            <a href="/dashboard/kamar/data_kamar"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white">
                <i class="fas fa-box sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data Kamar</span>
            </a>
            <a href="/dashboard/penyewa/data_penyewa"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white">
                <i class="fas fa-users sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data Penyewa</span>
            </a>
        </div>
    </nav>

    <!-- User Profile -->
    <div class="p-4 m-4 glass rounded-2xl">
        <div class="flex items-center gap-3">
            <img src="https://i.pravatar.cc/40?img=33" class="w-10 h-10 rounded-xl object-cover ring-2 ring-primary/50">
            <div class="sidebar-text transition-all duration-300">
                <p class="text-sm font-semibold">{{ $name }}</p>
                <p class="text-xs text-white/40">Admin</p>
            </div>
        </div>
    </div>
</aside>
