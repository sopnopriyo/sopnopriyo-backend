@extends('layouts.back-end')


@section('content')
<div class="container">

  <div class="row col-lg-12 col-md-offset-1">
  	@if (session('message'))
	    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif
    <div>
      <a href="/new-post" class="btn btn-primary" role="button" >New Post</a>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>
              Title 
              <a href="#" name="posts.title" class="order">
                <span class="fa fa-fw "></span>
              </a>
            </th>
            <th>
              Date
              <a href="#" name="posts.created_at" class="order">
                <span class="fa fa-fw "></span>
              </a>
            </th>
            <th>
              Published
              <a href="#" name="posts.active" class="order">
                <span class="fa fa-fw "></span>
              </a>
            </th>            
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr  class="warning">
              <td class="text-primary"><strong>{{ $post->title }}</strong></td>
              <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td> 
              <td>{!! Form::checkbox('active', $post->active, $post->active) !!}</td>
              <td>{!! link_to_route('post.edit', trans('Edit'), [$post->slug], ['class' => 'btn btn-warning btn-block']) !!}</td>
              <td>{!! link_to_route('post.delete', trans('Delete'), [$post->id], ['class' => 'btn btn-danger btn-block']) !!}</td>
             
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {!! $posts->render() !!}
    </div>
  </div>


</div>

@endsection
