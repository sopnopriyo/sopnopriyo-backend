<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<title>@yield('title', 'Welcome !')</title>
	{{-- Librerias CSS --}}
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/curso.css')}}">
	<link rel="stylesheet" href="{{asset('css/trumbowyg.min.css')}}">
</head>
<body id="@yield('id')">
	@yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="{{asset('js/animatescroll.min.js')}}"></script>
<script src="{{asset('js/trumbowyg.min.js')}}"></script>
<script>
	$(window).scroll(function() {
		/* Act on the event */
		if ($(this).scrollTop() > 500) {
			$('#navi').removeClass('hide');
			$('#navi').addClass('navbar-fixed-top');			
		}
		else{
			$('#navi').removeClass('navbar-fixed-top');
			$('#navi').addClass('hide');
		};
	});
</script>
@yield('js')
</body>
</html>