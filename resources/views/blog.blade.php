@extends('admin.template')
@section('title'){{ 'Hello | ' . Auth::user()->username }}@endsection
@section('content')


	
			@if(\Session::has('alert'))
				<div class="alert alert-dismissible alert-success">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>{{Session::get('alert')}}</strong>
				</div>
			@endif
			<div class="row col-lg-12">
    <div class="pull-left link"> <a href="{{route('nuevo')}}"><i class="fa fa-plus"></i> Create a new post</a>	</div>
    <br>
  </div>

			<table class="table table-striped table-hover table-bordered">
				<thead>
					<th>Titles</th>
					<th>Author</th>
					<th>Date</th>
					<th class="foo">Action</th>
				</thead>
				<tbody>
					@foreach($posts as $x)
						<tr>
							<td>{{$x->title}}</td>
							<td>{{$x->slug}}</td>
							<td>{{$x->created_at}}</td>
							<td>
								<div class="btn-group-justified">
									<a href="posts/{{$x->id}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
									<a href="posts/{{$x->id}}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>						
					@endforeach
				</tbody>
			</table>
@stop