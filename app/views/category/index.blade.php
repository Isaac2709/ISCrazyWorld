@extends('layouts.layout')

@section('title_page')
	{{ $category->name }}
@stop

@section('header')
	<h1 class="page-header">
	    ISCrazyWorld
	    <small>{{ $category->name }}</small>
	</h1>
@stop

@section('container')
	@foreach($posts as $post)
		<!-- Blog Post -->
        <h2>
            <a href="#">{{ $post->title }}</a>
        </h2>
        <p>
        <?php
       		$fecha = new DateTime($post->date);
	    ?>
        <span class="glyphicon glyphicon-time"></span> Posted on {{ $fecha->format('M d, Y') }} at {{ $fecha->format('h:i A') }}
            by <a href="index.php">{{ $post->admin->username }}</a>
        </p>

        <!-- Posted on August 28, 2013 at 10:00 PM -->
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>
        	{{
        		$body = substr(strip_tags($post->body), 0, 200);
	            if(strlen($post->body) > 200){
	                $body = $body.'...';
	            }
            }}
        </p>
        <a class="btn btn-primary" href=" {{ 'post/'.$post->id }} ">Seguir leyendo <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
	@endforeach
@stop

@section('pagination')
    <!-- Pager -->
    <!-- <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul> -->
    {{ $posts->links() }}
@stop