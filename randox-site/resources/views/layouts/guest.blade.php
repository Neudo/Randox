<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex  sm:pt-0 bg-white">
            <div class="px-6 py-4 bg-white flex flex-col justify-center overflow-hidden w-full md:w-[40%] ">
                <div class="inline-block mx-auto my-6" >
                    <a class="inline-block" href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
                {{ $slot }}
            </div>
            <div class="hidden md:block  w-[60%] h-[96vh] mt-[2vh] mr-[2vh] bg-blue-800 rounded-xl ">
                <div class="big-card p-9">
                    <div class="big-card-header text-white ">
                        <h3 class="text-4xl">Une façon <span class="text-yellow-500">simple</span> de gérer <br> votre application</h3>
                        <p class="italic" >Connectez vous pour accéder au dashboard</p>
                    </div>
                    <div class="mt-8 w-[85%] m-auto big-card-body">
                        <img class="rounded" src="/hero-home.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
