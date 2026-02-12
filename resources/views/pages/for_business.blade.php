@extends('layouts.app')
@section('title', $page->title ?? 'Для бизнеса')
@section('content')
    <for-business-page 
        :page='@json($page ?? null)'
    ></for-business-page>
@endsection
