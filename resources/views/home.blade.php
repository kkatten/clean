@extends('layouts.app')
@section('title', $page->title ?? 'Главная')
@section('content')
    <home-page 
        :page='@json($page ?? null)' 
        :services='@json($services ?? [])'
    ></home-page>
@endsection
