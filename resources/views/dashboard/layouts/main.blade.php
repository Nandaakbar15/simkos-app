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
    </head>

    <body class="bg-darker min-h-screen text-white">

        @include('dashboard.partials.sidebar')

        <!-- Main Content -->
        <main id="mainContent" class="ml-64 transition-all duration-500 min-h-screen">
            @include('dashboard.partials.header')

            <!-- Dashboard Content -->
            <div class="p-8">
                {{-- Flash Message --}}
                @include('flash-message')

                @yield('content')
            </div>
        </main>

        <script src="{{ asset('js/script.js') }}"></script>
    </body>

</html>
