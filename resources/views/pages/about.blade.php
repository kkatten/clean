@extends('layouts.app')
@section('title', $page->title ?? 'О компании')
@section('content')
    <about-page :page='@json($page ?? null)'></about-page>
@endsection
