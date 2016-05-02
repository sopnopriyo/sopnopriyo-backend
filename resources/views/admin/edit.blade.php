@extends('admin.template')
@section('title'){{ 'Hello | ' . Auth::user()->username }}@endsection
@section('content')
			
			<div class="col-md-12">
				{!! Form::open(['url' => 'admin/posts/'.$post->id.'/refresh', 'autocomplete' => 'off']) !!}
					<fieldset>
						<input type="text" name="title" value="{{$post->title}}" class="form-control">
						<br>
						<textarea name="content" id="editor" cols="15" rows="10" class="form-control">
							{{$post->content}}
						</textarea>
						<br>
						<input type="text" name="tags" value="{{$post->tags}}" class="form-control">
						<br>
						<input type="text" name="photo" value="{{$post->photo}}" class="form-control">
						<br>
						<input type="submit" value="Edit" class="btn btn-block btn-primary">
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