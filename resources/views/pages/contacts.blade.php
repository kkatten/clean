@extends('layouts.app')
@section('title', $page->title ?? 'Контакты')
@section('content')
    <contacts-page 
        :page='@json($page ?? null)' 
        :contact-infos='@json($contactInfos ?? [])'
    ></contacts-page>
@endsection
