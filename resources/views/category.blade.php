@extends('template.main')
@section('content')
	<div class="row-fluid">
		<div class="container">
			@foreach($cat as $c)
				<a href="#" class="btn btn-primary">{{$c}}</a><br>
			@endforeach
		</div>
	</div>
@stop