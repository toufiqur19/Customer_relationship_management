<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        {{-- datatable --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/toastify.min.css') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Scripts -->
        
        <script src="{{ asset('js/axios.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/toastify-js.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/toastify_msg.js') }}"></script>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-300">
            @include('layouts.navigation')
            <!-- Page Heading -->
            
            
            <!-- Page Content -->
            <main class="lg:flex">
                @include('layouts.sidebar')
                <div class="lg:ml-56 mt-[4rem] lg:mt-[5rem] py-5 px-7 w-[100%] lg:w-[75%] space-y-5">
                    @isset($header)
                    <header class="bg-white shadow rounded-md">
                        <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                    @endisset
                    {{ $slot }}
                </div>
            </main>
        </div>
        
        @yield('script')

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('js/chart.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
