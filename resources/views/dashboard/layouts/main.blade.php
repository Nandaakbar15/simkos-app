<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        {{-- Other CSS file --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#6366f1',
                            secondary: '#8b5cf6',
                            dark: '#1e1b4b',
                            darker: '#0f0a2e',
                        }
                    }
                }
            }
        </script>
        <style>
            /* Sidebar collapsed state */
            .sidebar-collapsed {
                transform: translateX(-100%);
            }
        </style>
    </head>

    <body class="bg-darker min-h-screen text-white" x-data="{ sidebarOpen: true }">

        <!-- Sidebar with Alpine.js control -->
        <aside id="sidebar" 
            class="fixed top-0 left-0 h-full w-64 glass z-50 flex flex-col transition-all duration-500"
            :class="{ 'sidebar-collapsed': !sidebarOpen }">
            @include('dashboard.partials.sidebar')
        </aside>

        <!-- Main Content -->
        <main id="mainContent" class="transition-all duration-500" :class="{ 'ml-64': sidebarOpen, 'ml-0': !sidebarOpen }">
            <!-- Header with toggle button -->
            <div x-data="{ sidebarOpen: true }" @toggle-sidebar.window="sidebarOpen = !sidebarOpen">
                @include('dashboard.partials.header')
            </div>

            <!-- Dashboard Content -->
            <div class="p-8">
                {{-- Flash Message --}}
                @include('flash-message')

                @yield('content')
            </div>
        </main>

        <!-- Backdrop for mobile -->
        <div class="fixed inset-0 bg-black/50 md:hidden transition-opacity duration-300 z-40"
            :class="{ 'hidden': sidebarOpen, 'block': !sidebarOpen }"
            @click="sidebarOpen = true"
            x-cloak></div>

        <script src="{{ asset('js/script.js') }}"></script>
    </body>

</html>
