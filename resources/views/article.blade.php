@extends('template.main')
@section('title'){{$post->title .' | Sopnopriyo'}}@endsection
@section('content')
	@include('template.partials.navbar')
	<div class="row-fluid" style="background-image: url('{{$post->photo}}'); min-height: 50vh; background-size: cover; background-position: center; background-attachment: fixed">
		<div class="blur">
			<div id="artitle" class="croisant">
				{{$post->title}}
			</div>
		</div>
	</div>
	<div class="row-fluid"> 
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-md-8" align="center">
			<br>
				<?php 
					$tags = explode(',', $post->tags);
				 ?>
				 @foreach($tags as $t)
					<a href="../tag/{{$t}}" class="tl"><label class="label label-success">#{{$t}}</label></a>
				 @endforeach
				<br>
				<hr>
				<div align="justify">
					{!! $post->content !!}
				</div>
				<hr>
				<div class="fb-comments" data-href="http://localhost/www/blog/public/articulos/{{$post->slug}}" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
				<a href="{{route('home')}}" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Go Back</a>
				<br>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<br>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
	@include('template.partials.footer')
@stop