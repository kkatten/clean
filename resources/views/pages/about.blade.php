@extends('layouts.app')
@section('title', $page->title ?? 'О компании')
@section('content')
    <h1>{{ $page->title ?? 'О компании' }}</h1>
    @if($page && $page->blocks)
        @foreach($page->blocks as $block)
            @if(is_array($block) && !empty($block['title']))
                <section><h2>{{ $block['title'] }}</h2><p>{{ $block['content'] ?? '' }}</p></section>
            @endif
        @endforeach
    @endif
@endsection
