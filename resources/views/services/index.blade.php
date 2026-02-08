@extends('layouts.app')
@section('title', 'Услуги')
@section('content')
    <h1>Услуги</h1>
    <ul>
        @foreach($services as $service)
            <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
        @endforeach
    </ul>
@endsection
