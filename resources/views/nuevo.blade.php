@extends('template.main')
@section('title'){{ 'Nueva publicación| ' . \Auth::user()->username }}@endsection
@section('content')
	@include('template.partials.logbar')
	<div class="row-fluid">
		<div class="container">
			<div class="jumbotron">
				<h1 class="text-center">
					Create a new post
				</h1>
			</div>
		</div>
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				{!! Form::open(['url' => 'admin/posts/new', 'autocomplete' => 'off']) !!}
					<fieldset>
						<input type="text" name="title" placeholder="Title of the post" class="form-control">
						<br>
						<textarea name="content" id="editor" cols="30" rows="15" class="form-control" placeholder="content of the post">
						</textarea>
						<br>
						<input type="text" name="tags" class="form-control" placeholder="Tags ( separated by commas )">
						<br>
						<input type="text" name="photo" placeholder="Image link of the post" class="form-control">
						<br>
						<input type="submit" value="Create" class="btn btn-block btn-success">
					</fieldset>
				{!! Form::close() !!}
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<br><br>
	@include('template.partials.footer')
@endsection
@section('js')
	<script>
		$('#editor').trumbowyg();
	</script>
@stop