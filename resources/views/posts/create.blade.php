@extends('layouts.back-end')


@section('content')

<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
	tinymce.init({
		selector : "textarea",
		plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
		toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
	}); 
</script>
<div class="container">
	<div class="row">
    	<div class="col-md-12 col-md-offset-1">
    		@if($errors->any())
			    @foreach($errors->getMessages() as $this_error)
			        <p style="color: red;">{{$this_error[0]}}</p>
			    @endforeach
			@endif 
			<form action="/new-post" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name = "title"class="form-control" />
				</div>
				<div class="form-group">
					<textarea name='body'class="form-control">{{ old('body') }}</textarea>
				</div>
				<div class="form-group">
					<label for="publish">Publish:</label>
					  <select class="form-control" id="publish" name="active">
					    <option value="1">Yes</option>
					    <option value="0">No</option>
					  </select>
				</div>
				<input type="submit" name='publish' class="btn btn-success" value = "Submit"/>
			</form>
		</div>
	</div>
</div>
@endsection
