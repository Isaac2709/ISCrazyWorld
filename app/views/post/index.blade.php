@extends('layouts.layout_post')

@section('title_page')
    {{ $post->title }}
@stop

@section('title_post')
    {{ $post->title }}
@stop

@section('date_post')
	<?php
		$fecha = new DateTime($post->date);
	?>
	{{ $fecha->format('M d, Y') }} at {{ $fecha->format('h:i A') }}
@stop

@section('author_post')
	{{ $post->admin->username }}
@stop

@section('container')
    {{ $post->body }}
@stop