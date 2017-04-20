@extends('layouts.front-end')


@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1071898526165813";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">

	@if($post)
		<div>
			{!! $post->body !!}
		</div>	
		<div>
			<h2>Leave a comment</h2>
		</div>
		<div class="fb-comments" data-href="http://sopnopriyo.com/blog/{!! $post->slug !!}" data-numposts="5"></div>
	@else
	404 error
	@endif

</div>
@endsection
