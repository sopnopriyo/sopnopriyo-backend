@extends('layouts.back-end')


@section('content')

<div class="container">
	<div class="row">
    	<div class="col-md-12 col-md-offset-1">
	
			<form method="post" action='{{ url("/portfolio/update") }}' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{ $portfolio->id }}{{ old('id') }}">
				<div class="form-group">

				</div>
				<div class="form-group">
					<input required="required" placeholder="Enter title here" type="text" name = "name" class="form-control" value="@if(!old('name')){{$portfolio->name}}@endif{{ old('name') }}"/>
				</div>
				<div class="form-group">
					<input required="required" placeholder="Enter URL here" type="text" name = "url" class="form-control" value="@if(!old('url')){{$portfolio->url}}@endif{{ old('url') }}"/>
				</div>
				<div class="form-group">
					<input required="required" placeholder="Enter description here" type="text" name = "description" class="form-control" value="@if(!old('description')){{$portfolio->description}}@endif{{ old('description') }}"/>
				</div>
				<div class="form-group">
					<img src="{{strtolower($portfolio->image)}}" class="image" alt="No Image" height="200" width="200">
					<label for="image">Change Image</label>
					<input type="file" id="image" name="image">
				</div>
				
				<input type="submit" name='update' class="btn btn-success" value = "Update"/>
				
				<a href="{{  url('portfolio/delete/'.$portfolio->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a>
			</form>
		</div>
	</div>
</div>
@endsection
