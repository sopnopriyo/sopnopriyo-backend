@extends('template.main')
@section('title'){{'Sopnopriyo'}}@endsection
@section('content')
	@include('template.partials.main-nav')
	@if(isset($_GET['page']))
		<div class="row-fluid">
			<div class="jumbotron">
				<h1 class="text-center">Blog <br>
				<small>See all the blog post</small></h1>
			</div>
		</div>
	@else
		<header>
			<div class="blur">
				<div class="croisant" id="title">
					Sopnopriyo
				</div>
				<div id="subtitle" class="croisant">
					Welcome to Shahin's place.
				</div>
				<div align="center">
					<a onclick="$('#posts').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});" class="btn btn-web btn-lg">Read My Blog</a>
				</div>
			</div>
		</header>
	@endif
	
	<section id="posts">
		<div class="row-fluid">
			<div class="container">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					@foreach($posts as $p)
						<h3 class="text-center">{{$p->title}}</h3>
						<div align="center">
							<img src="{{$p->photo}}" title="{{$p->title}}" class="img-responsive img-thumbnail">
						</div>
						<br>
						<div align="center">
							<h5 class="text-info">Topics related to the article::</h5>
							<?php 
								$tags = explode(',', $p->tags);
							 ?>
							 @foreach($tags as $t)
								<a href="tag/{{$t}}"><label class="label label-primary" class="tl">#{{$t}}</label></a>
							 @endforeach				
						</div>
						<br>
						<div align="center">
							<a href='article/{{$p->slug}}'class="btn btn-info">Read More:</a>
						</div> 					
						<hr>
					@endforeach
				</div>
				<div class="col-md-2"></div>				
			</div>
			<div class="container" align="center">
				<?php echo $posts->render() ?>
			</div>
		</div>
	</section>
	@include('template.partials.footer')
@stop