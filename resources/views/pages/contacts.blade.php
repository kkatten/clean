@extends('layouts.app')
@section('title', $page->title ?? 'Контакты')
@section('content')
    <h1>{{ $page->title ?? 'Контакты' }}</h1>
    @if(!empty($contactInfos))
        <ul>
            @foreach($contactInfos as $key => $value)
                @if($value)<li>{{ $key }}: {{ $value }}</li>@endif
            @endforeach
        </ul>
    @endif
    @include('partials.lead-form', ['source' => 'contacts'])
@endsection
