@extends('admin.template')
@section('title'){{ 'New Post| ' . \Auth::user()->username }}@endsection
@section('content')
		

		<div class="col-md-12">
				{!! Form::open(['url' => 'admin/posts/new', 'autocomplete' => 'off']) !!}
					<fieldset>
						<input type="text" name="title" placeholder="Title of the post" class="form-control">
						<br>
						<textarea name="content" id="editor" cols="12" rows="7" class="form-control" placeholder="content of the post">
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
		
	
	<br><br>
	
@endsection
@section('js')
	<script>
		$('#editor').trumbowyg();
	</script>
@stop