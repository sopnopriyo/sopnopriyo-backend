<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<title>@yield('title', 'Welcome !')</title>
	{{-- Librerias CSS --}}
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/sopnopriyo.css')}}">
	<link rel="stylesheet" href="{{asset('css/trumbowyg.min.css')}}">
</head>
<body >
		@include('admin.logbar')
	<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
               <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/blog">Blog</a>
                </li>
                <li>
                    <a href="#">Message</a>
                </li>
                
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

          <!-- Page Content -->
        <div id="page-content-wrapper">
             <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

   
   

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

