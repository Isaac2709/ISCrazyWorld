@extends('layouts.layout_post')

@section('tittle_page')
    {{ $post->titulo }}
@stop

@section('tittle_post')
    {{ $post->titulo }}
@stop

@section('container')
    {{ $post->body }}
@stop