<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="margin: 0; padding: 0; overflow-x: hidden;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @hasSection('meta_description')
        <meta name="description" content="@yield('meta_description')">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="margin: 0; padding: 0; overflow-x: hidden;">
    @if(session('lead_sent'))
        <div class="fixed top-0 left-0 right-0 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 z-50">
            <p class="font-bold">Заявка отправлена!</p>
        </div>
    @endif
    <div id="app">@yield('content')</div>
</body>
</html>
