@extends('layouts.front-end')


@section('content')
<div class="container">

  <div class="row col-lg-12 col-md-offset-1">
  	@if (session('message'))
	    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif
   
  </div>

  @if ( !$posts->count() )
  There is no post till now. Login and write a new post now!!!
  @else
  <div class="">
    @foreach( $posts as $post )
    <div class="list-group">
      <div class="list-group-item">
        <h3><a href="{{ url('/blog/'.$post->slug) }}">{{ $post->title }}</a>
         
        </h3>
        <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <b>{{ $post->author->name }}</b></p>
        
      </div>
      <div class="list-group-item">
        <article>
          {!! str_limit($post->body, $limit =600, $end = '....... <a href='.url("/blog/".$post->slug).'>Read More</a>') !!}
        </article>
      </div>
    </div>
    @endforeach
    {!! $posts->render() !!}
  </div>
  @endif


</div>

@endsection
