@extends('layouts.app')
@section('title', $page->title ?? 'Главная')
@section('content')
    <h1>{{ $page->title ?? 'Коммерческий клининг в Кирове' }}</h1>
    @if($page && $page->blocks)
        @if(!empty($page->blocks['utp']))
            <section>{{ $page->blocks['utp']['text'] ?? '' }}</section>
        @endif
        @if(!empty($services))
            <section>
                <h2>Основные услуги</h2>
                @foreach($services as $s)
                    <a href="{{ route('services.show', $s->slug) }}">{{ $s->title }}</a>
                @endforeach
            </section>
        @endif
    @endif
    @include('partials.lead-form', ['source' => 'main_form'])
@endsection
