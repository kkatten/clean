@extends('layouts.app')
@section('title', $page->title ?? 'Для бизнеса')
@section('content')
    <h1>{{ $page->title ?? 'Для бизнеса' }}</h1>
    @if($page && $page->blocks)
        @if(!empty($page->blocks['intro']['content']))
            <p>{{ $page->blocks['intro']['content'] }}</p>
        @endif
        @if(!empty($page->blocks['cta']['text']))
            <a href="{{ route('contacts') }}">{{ $page->blocks['cta']['text'] }}</a>
        @endif
    @endif
@endsection
