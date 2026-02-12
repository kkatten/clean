@extends('layouts.app')
@section('title', $service->title)
@if($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif
@section('content')
    <service-page 
        :service='@json($service)'
    ></service-page>
@endsection
