<!DOCTYPE html>
<html lang="en" class="dark">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Title -->
        <title>@section('page_title') Albicant - @show</title>

        <!-- General Favicon -->
        <link rel="icon" type="image/png" sizes="64x64" href="/favicon.png">

        <!-- Smaller Favicons -->
        <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">

        <!-- Android Home screen Favicons -->
        <link rel="icon" type="image/png" sizes="48x48" href="/favicons/favicon-48x48.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/favicons/favicon-192x192.png">

        <!-- iOS Home screen Favicons -->
        <link rel="apple-touch-icon" type="image/png" sizes="167x167" href="/favicons/favicon-152x152.png">
        <link rel="apple-touch-icon" type="image/png" sizes="167x167" href="/favicons/favicon-167x167.png">
        <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="/favicons/favicon-180x180.png">
    </head>
    <body>
        <div class="flex flex-col h-screen">
            <div class="mb-auto">
                <div class="w-full flex flex-col sm:flex-row flex-wrap sm:flex-nowrap py-4 flex-grow dark:bg-gray-900">
                    <!-- fixed-width -->
                    <div class="w-fixed w-full flex-shrink flex-grow-0 px-4 dark:bg-gray-800 dark:text-white">
                        <div class="sticky top-0 p-4 w-full h-full">
                            <div class="flex flex-col justify-center">
                                <a class="btn-primary w-full" href="{{ route('home') }}">Home</a>
                                <a class="btn-primary w-full" href="{{ route('feed') }}">Feed</a>
                            </div>
                        </div>
                    </div>

                    <main role="main" class="w-full flex-grow pt-1 px-3 overflow-auto dark:bg-gray-700 dark:text-white">
                        @yield('page_content')
                    </main>

                    <!-- fixed-width -->
                    <div class="w-fixed w-full flex-shrink flex-grow-0 px-2 dark:bg-gray-800 dark:text-white">
                        <div class="flex sm:flex-col px-2">
                            @yield('page_sidebar')
                        </div>
                    </div>
                </div>
            </div>
            <footer class="dark:bg-gray-800 bg-gray-200 dark:text-white text-black h-10 mt-auto">
                @section('page_footer')
                    <p class="align-middle">Copyright (c) H4ck Software Team 2021-2022</p>
                @show
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @livewireScripts
    </body>
</html>
