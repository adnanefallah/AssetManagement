<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', __('app.app_name')) }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">

<div class="flex h-screen">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Main --}}
    <div class="flex flex-col flex-1">

        {{-- Navigation --}}
        @include('layouts.navigation')

        {{-- Header --}}
        @isset($header)
        <div class="bg-white border-b px-8 py-5">
            {{ $header }}
        </div>
        @endisset

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto p-8">
            {{ $slot }}
        </main>

    </div>

</div>

</body>
</html>
