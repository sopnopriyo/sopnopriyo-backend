<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ trans('front/site.title') }}</title>
		<meta name="description" content="">	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		@yield('head')

		{!! HTML::style('css/main_front.css') !!}

		<!--[if (lt IE 9) & (!IEMobile)]>
			{!! HTML::script('js/vendor/respond.min.js') !!}
		<![endif]-->
		<!--[if lt IE 9]>
			{!! HTML::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') !!}
			{!! HTML::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') !!}
		<![endif]-->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
		{!! HTML::style('http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic') !!}
		<script type="text/javascript" language="javascript">
			function wait()
			{ 
			    if(document.getElementById)
			    {
			        document.getElementById('waitpage').style.visibility='hidden';
			    }
			    else
			    {
			    if(document.layers)
			    {
			        document.waitpage.visibility = 'hidden';
			    }
			    else
			    {
			        document.all.waitpage.style.visibility = 'hidden';
			    }
			    }
			}
		</script>
	</head>

  <body onLoad="wait();">
  	<div id="waitpage" > 
<table width="100%" height="100%">
    <tr>
        <td><img src="{!! '/img/loader.gif '!!}"/> </td>
                
    </tr>
</table>
</div>

	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<header role="banner">

		
		<div id="flags" class="text-center"></div>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
            <button type="button" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">Sopnopriyo</a>
        </div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav list-hover-slide pull-right">
						<li {!! classActivePath('/') !!}>
							{!! link_to('/', trans('front/site.home')) !!}
						</li>
						<li {!! classActivePath('solutions') !!}>
							{!! link_to('services', trans('Services')) !!}
						</li>
						<li {!! classActivePath('portfolio') !!}>
							{!! link_to('portfolio', trans('Portfolio')) !!}
						</li>
						<li {!! classActiveSegment(1, ['articles', 'blog']) !!}>
							{!! link_to('articles', trans('front/site.blog')) !!}
						</li>
						<li {!! classActivePath('About Us') !!}>
							{!! link_to('about-us', trans('About Us')) !!}
						</li>
						
						@if(session('statut') == 'visitor' || session('statut') == 'user')
							<li {!! classActivePath('contact/create') !!}>
								{!! link_to('contact/create', trans('Contact Us')) !!}
							</li>
						@endif
						@if(Request::is('auth/register'))
							<li class="active">
								{!! link_to('auth/register', trans('front/site.register')) !!}
							</li>
						@elseif(Request::is('password/email'))
							<li class="active">
								{!! link_to('password/email', trans('front/site.forget-password')) !!}
							</li>

						@else
							@if(session('statut') == 'visitor')
								<li {!! classActivePath('auth/login') !!}>
									{!! link_to('auth/login', trans('Member Area')) !!}
								</li>
							@else
								@if(session('statut') == 'admin')
									<li>
										{!! link_to_route('admin', trans('front/site.administration')) !!}
									</li>
								@elseif(session('statut') == 'redac') 
									<li>
										{!! link_to('blog', trans('front/site.redaction')) !!}
									</li>
								@endif
								<li>
									{!! link_to('auth/logout', trans('front/site.logout')) !!}
								</li>
							@endif

						@endif
						<!-- hiding language for a while
						<li class="imgflag">

							<a href="{!! url('language') !!}"><img width="32" height="32" alt="en" src="{!! asset('img/' . (session('locale') == 'fr' ? 'english' : 'french') . '-flag.png') !!}"></a>
						</li>
						-->
					</ul>
				</div>
			</div>
		</nav>


		@yield('header')	
	</header>

	<main role="main" >
		@if(session()->has('ok'))
			@include('partials/error', ['type' => 'success', 'message' => session('ok')])
		@endif	
		@if(isset($info))
			@include('partials/error', ['type' => 'info', 'message' => $info])
		@endif
		@yield('main')
	</main>

	

	<footer role="contentinfo">
		 @yield('footer')
	
	<div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Find us at</h3>
                    <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright © Sopnopriyo. All right reserved. </p>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>

	
	{!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
	{!! HTML::script('js/plugins.js') !!}
	{!! HTML::script('js/main.js') !!}

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>

	@yield('scripts')

  </body>
</html>