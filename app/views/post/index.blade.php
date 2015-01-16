@extends('layouts.layout_post')

@section('title_page')
    {{ $post->titulo }}
@stop

@section('title_post')
    {{ $post->titulo }}
@stop

@section('container')
    {{ $post->body }}
@stop