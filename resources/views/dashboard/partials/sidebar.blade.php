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
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white transition-colors"
                data-href="/dashboard/home">
                <i class="fas fa-home sidebar-icon text-primary w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text font-medium transition-all duration-300">Dashboard</span>
            </a>

            {{-- MENU KHUSUS ADMIN --}}
            @if (auth()->user()->role === 'admin')
                <a href="/dashboard/user/data_user"
                    class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white transition-colors"
                    data-href="/dashboard/user">
                    <i class="fas fa-chart-pie sidebar-icon w-5 text-center transition-all duration-300"></i>
                    <span class="sidebar-text transition-all duration-300">Data User</span>
                </a>
                <a href="/dashboard/kosts/data_kosts"
                    class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white transition-colors"
                    data-href="/dashboard/kosts">
                    <i class="fas fa-shopping-cart sidebar-icon w-5 text-center transition-all duration-300"></i>
                    <span class="sidebar-text transition-all duration-300">Data Kost</span>
                </a>
            @endif
            <a href="/dashboard/kamar/data_kamar"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white transition-colors"
                data-href="/dashboard/kamar">
                <i class="fas fa-box sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data Kamar</span>
            </a>
            <a href="/dashboard/penyewa/data_penyewa"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white transition-colors"
                data-href="/dashboard/penyewa">
                <i class="fas fa-users sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data Penyewa</span>
            </a>
            <a href="/dashboard/sewa_kontrak/data_sewa_kontrak"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white transition-colors"
                data-href="/dashboard/sewa_kontrak">
                <i class="fas fa-users sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data Sewa / Kontrak</span>
            </a>
            <a href="/dashboard/tagihan/data_tagihan"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white transition-colors"
                data-href="/dashboard/tagihan">
                <i class="fas fa-receipt sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data Tagihan</span>
            </a>
            <a href="/dashboard/pembayaran/data_pembayaran"
                class="nav-link sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-white/60 hover:bg-white/5 hover:text-white transition-colors"
                data-href="/dashboard/pembayaran">
                <i class="fas fa-credit-card sidebar-icon w-5 text-center transition-all duration-300"></i>
                <span class="sidebar-text transition-all duration-300">Data Pembayaran</span>
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

<script>
    // Highlight active sidebar item based on current URL
    function setActiveSidebarItem() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');
        
        // Remove active state from all links first
        navLinks.forEach(link => {
            link.classList.remove('bg-primary/20', 'text-white');
            link.classList.add('text-white/60');
            const icon = link.querySelector('.sidebar-icon');
            if (icon) icon.classList.remove('text-primary');
        });
        
        // Find and highlight the matching link
        navLinks.forEach(link => {
            const href = link.getAttribute('data-href');
            
            // Check if current path contains or matches the data-href
            // This handles both exact matches and nested paths
            if (currentPath.startsWith(href) || currentPath.includes(href + '/')) {
                link.classList.remove('text-white/60');
                link.classList.add('bg-primary/20', 'text-white');
                const icon = link.querySelector('.sidebar-icon');
                if (icon) icon.classList.add('text-primary');
            }
        });
    }
    
    // Set active item on page load
    window.addEventListener('load', setActiveSidebarItem);
    
    // Also set it immediately in case page is already loaded
    document.addEventListener('DOMContentLoaded', setActiveSidebarItem);
    setActiveSidebarItem();
</script>
