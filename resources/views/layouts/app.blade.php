<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('/') }}">

    <title>Logger App</title>
    @stack('scripts')
    @vite([ 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div id="app" class="h-full max-h-screen max-w-full">
        @include('layouts.partials.header')

        <main class="">
            @yield('content')
        </main>


        @include('layouts.partials.footer')
    </div>
</body>
</html>
