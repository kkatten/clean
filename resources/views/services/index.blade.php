@extends('layouts.app')
@section('title', 'Услуги')
@section('content')
    <services-page 
        :services='@json($services ?? [])'
    ></services-page>
@endsection
