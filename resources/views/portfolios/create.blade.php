@extends('layouts.back-end')


@section('content')
<div class="header-section" id="content" tabindex="-1"> 
	<div class="container"> 
		<h1>Add a new Portfolio</h1> 
	</div>
</div>

<div class="container content-container">
	@if (session('message'))
    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<div class="row">
		<div class="col-md-10">
			<form method="post" enctype="multipart/form-data" action="new-portfolio">

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" value="{{ old('name')}}" class="form-control" id="title" name="name">
				</div>
				<div class="form-group">
					<label for="url">URL</label>
					<input type="text" value="{{ old('url')}}" class="form-control" id="url" name="url">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<input type="text"  value="{{ old('description')}}" class="form-control" id="description" name="description">
				</div>
				<div class="form-group">
					<label for="image">Image File</label>
					<input type="file" id="image" name="image"  value="{{ old('image')}}">
				</div>
				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>

</div>

@endsection
