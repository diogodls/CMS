@extends('adminlte::page')

@section('title', 'Editar Página')

@section('content_header')

@endsection

@section('content')

    <div><h1>{{$page->title}}</h1></div>

    <p>{!! $page->body !!}</p>

@endsection
