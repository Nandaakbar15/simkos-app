<!-- Top Bar -->
<header class="sticky top-0 z-40 glass border-b border-white/5 px-8 py-4 flex items-center justify-between"
    x-data="{ sidebarOpen: true }">
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen; $dispatch('toggle-sidebar')"
            class="w-10 h-10 rounded-xl glass flex items-center justify-center hover:bg-white/10 transition">
            <i class="fas fa-bars"></i>
        </button>
        <div>
            @if (auth()->user()->role === 'admin')
                <h1 class="text-xl font-bold">Selamat Datang, Admin 👋</h1>
                <p class="text-sm text-white/40">Ini adalah halaman admin</p>
            @else
                <h1 class="text-xl font-bold">Selamat Datang, {{ $name }}</h1>
                <p class="text-sm text-white/40">Ini adalah halaman untuk user yang rolenya adalah owner</p>
            @endif
        </div>
    </div>

    <div class="flex items-center gap-4">
        <!-- Search -->
        <div class="relative hidden md:block">
            <input type="text" placeholder="Search anything..."
                class="w-80 bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 pl-11 text-sm focus:outline-none focus:border-primary/50 focus:bg-white/10 transition placeholder:text-white/30">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-white/30"></i>
        </div>

        <!-- Quick Actions -->
        <button
            class="md:hidden w-10 h-10 rounded-xl glass flex items-center justify-center hover:bg-white/10 transition">
            <i class="fas fa-search"></i>
        </button>
        <button
            class="relative w-10 h-10 rounded-xl glass flex items-center justify-center hover:bg-white/10 transition">
            <i class="fas fa-bell"></i>
            <span class="notification-dot"></span>
        </button>
        <button class="w-10 h-10 rounded-xl glass flex items-center justify-center hover:bg-white/10 transition">
            <i class="fas fa-envelope"></i>
        </button>
        <button class="w-10 h-10 rounded-xl glass flex items-center justify-center hover:bg-white/10 transition">
            <i class="fas fa-th"></i>
        </button>

        <!-- Theme Toggle -->
        <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" class="sr-only peer">
            <div class="toggle-slider w-14 h-7 bg-white/10 rounded-full peer">
                <div
                    class="toggle-ball w-5 h-5 bg-primary rounded-full absolute top-1 left-1 flex items-center justify-center">
                    <i class="fas fa-sun text-[8px] text-white"></i>
                </div>
            </div>
        </label>

        <!-- User Dropdown with Alpine.js Animation -->
        <div x-data="{ dropdownOpen: false }" class="relative hidden sm:block">
            <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false"
                class="user-pill flex transition-all duration-200">
                <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 mr-1 transition-transform duration-200"
                    :class="{ 'rotate-180': dropdownOpen }"></i>
            </button>

            <!-- Dropdown menu with Animation -->
            <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                class="absolute right-0 mt-2 w-44 bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700 dark:divide-gray-600 z-50">

                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div class="font-medium truncate">{{ $name }}</div>
                </div>

                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-150">
                            <i class="fa-solid fa-user mr-2"></i>Profile
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-150">
                            <i class="fa-solid fa-gear mr-2"></i>Settings
                        </a>
                    </li>
                </ul>

                <div class="py-1">
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white transition-colors duration-150">
                            <i class="fa-solid fa-sign-out-alt mr-2"></i>Sign out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
