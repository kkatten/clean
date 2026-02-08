@extends('layouts.app')
@section('title', $service->title)
@section('content')
    <h1>{{ $service->title }}</h1>
    @if($service->description)<p>{{ $service->description }}</p>@endif
    @if($service->for_who)<p><strong>Для кого:</strong> {{ $service->for_who }}</p>@endif
    @if($service->what_included)
        <ul>
            @foreach($service->what_included as $item)<li>{{ $item }}</li>@endforeach
        </ul>
    @endif
    @include('partials.lead-form', ['source' => 'service', 'service_id' => $service->id])
@endsection
