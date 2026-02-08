<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen p-6">
    <nav class="mb-6 flex gap-4">
        <a href="{{ route('home') }}">Главная</a>
        <a href="{{ route('services.index') }}">Услуги</a>
        <a href="{{ route('about') }}">О компании</a>
        <a href="{{ route('for_business') }}">Для бизнеса</a>
        <a href="{{ route('contacts') }}">Контакты</a>
    </nav>
    @if(session('lead_sent'))
        <p class="text-green-600 mb-4">Заявка отправлена.</p>
    @endif
    <main>@yield('content')</main>
</body>
</html>
