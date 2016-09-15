<!DOCTYPE HTML>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
<link rel="icon" 
      type="image/png" 
      href="{{ URL::asset('images/logo.png') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Custom Theme files -->
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }>
</script>
<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
</script>
<meta name="keywords" content="Sopnorpiyo, Shahin Alam, Md Shahin Alam" />
<!--Google Fonts-->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
</script>
<!-- //end-smoth-scrolling -->  
<!---pop-up-box---->
                    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
                    <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
                    <!---//pop-up-box---->
                     <script>
                        $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });
                                                                                        
                        });
                </script>
</head>
<body>
<!--header start here-->
<div class="header">
   <div class="container">
        <div class="header-top">    
            <div class="search">        
                          <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i> </i></a>
                    </div>
                     <div id="small-dialog" class="mfp-hide">
                        <div class="search-top">
                            <div class="login">
                                <input type="submit" value="">
                                <input type="text" value="Search Here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">     
                            </div>
                            
                        </div>              
                    </div>
             <div class="top-navg">
                       <span class="menu"> <img src="images/icon.png" alt=""/></span>
                <nav class="cl-effect-1">   
                    <ul class="res">
                        <li><a class="scroll active" href="#home">Home</a></li> 
                        <li><a class="scroll" href="#about">About</a></li> 
                        <li><a class="scroll" href="#contact">Contact</a></li> 
                         @if (Auth::guest())
                          <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                          <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </li>
                          @endif
                     </ul>
                 </nav>

                    <!-- script-for-menu -->
                         <script>
                           $( "span.menu" ).click(function() {
                             $( "ul.res" ).slideToggle( 300, function() {
                             // Animation complete.
                              });
                             });
                        </script>
                <!-- /script-for-menu -->
           </div>
                        
                <div class="clearfix"> </div>
              </div>
              <div class="banner">
                 <h1>Welcome to Sopnopriyo Zone</h1>
                  <p>Thanks ! This is one of the best place to know more about me. keep exploring here ! </p>
              </div>
      </div>
</div>
<!--header end here-->
<!--weare start here-->
<div class="weare" id="about">
            <div class="container">
                <div class="weare-main">
                    <h2>Who I Am</h2>
                    <img src="images/circles.png" alt="">
                    <p>I born in Bangladesh, and currently studying and working in Malaysia. Pursuing a bachelor degree in Computer Science majoring in Software Engineering in University of Malaya, Malaysia.Apart from that I am also working as a Cloud Application Developer in Hilti.</p>
                </div>
                <div class="weare-bottom">
                    <div class="col-md-6 weare-left">
                        <img src="images/a.jpg" class='img-responsive' alt=""/>
                    </div>
                    <div class="col-md-6 weare-right">
                      <h3>My Professional Skills</h3>
                        <div class="poling">
                                    <div class="poll">
                                        <div class="poll_desc">Backend Web Development</div>
                                        <div class="skills">
                                            <div style="width:90%"> </div>
                                            </div>
                                </div>
                                <div class="poll">
                                        <div class="poll_desc">Front End Web Development</div>
                                        <div class="skills">
                                            <div style="width:75%"> </div>
                                            </div>
                                </div>
                            <div class="poll">
                              <div class="poll_desc">Android Application Development</div>
                              <div class="skills">
                                <div style="width:60%"> </div>
                             
                           </div>
<div class="poll">
                                        <div class="poll_desc">Testing</div>
                                        <div class="skills">
                                            <div style="width:75%"> </div>
                                            </div>
                                </div>

                      </div>
                </div>
           </div>
     </div>
</div>
<!--weare end here-->
<!--about strat here-->
<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-6 ab-left">
                <h4>Work and Life balance </h4>
                <p>There is no doubt, I am a devoted programmer and I spent a lot of time on solving complex problems using different technologies but that's not the end of story. Friends and family is always great prority for me. It simply does not make sense to me to be successful which can not be shared with your love ones. To me , success and sharing both are important. Some of my hobbies include playing badminton, listening music, swimming, cycling and of course travelling. </p>
            </div>
            <div class="col-md-6 ab-right">
                <img src="images/friends.jpg" alt="" class="img-responsive">
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--about end here-->


<!--contact start here-->
<div class="contact" id="contact">
    <div class="container">
        <div class="contact-main">
               <div class="contact-top">
                   <h3>Contact Me</h3>
                   <img src="images/circles.png" alt="">
               </div>
               @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="flash-message">
              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
              @endforeach
            </div>
               <div class="contact-bottom">
               {!! Form::open(['url' => '/contact']) !!}
                      {{ csrf_field() }}

                   <input type="text" name="name"  class="name" placeholder="Name">
                   <input type="text" name="email" placeholder="Email">
                   <textarea  name="message" placeholder="Message"></textarea>
                   <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
               </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--contact end here-->

<!--copyrights start here-->
    <div class="copy-rights">
    <div class="container">
        <div class="copy-right-main">
            <ul>
                <li><a href="https://www.facebook.com/sopnopriyoo"><span class="fa"> </span></a></li>
                <li><a href="https://twitter.com/sopnopriyo"><span class="tw"> </span></a></li>
                <li><a href="https://github.com/sopnopriyo"><span class="g"> </span></a></li>
                <li><a href="https://my.linkedin.com/in/shahin-alam-98933194"><span class="in"> </span></a></li>
                
            </ul>
            <div class="clearfix"> </div>
        </div>
        <script type="text/javascript">
                                        $(document).ready(function() {
                                            /*
                                            var defaults = {
                                                containerID: 'toTop', // fading element id
                                                containerHoverID: 'toTopHover', // fading element hover id
                                                scrollSpeed: 1200,
                                                easingType: 'linear' 
                                            };
                                            */
                                            
                                            $().UItoTop({ easingType: 'easeOutQuart' });
                                            
                                        });
                                    </script>
                        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

    </div>
</div>


<br><br> <br>
<center>
 <p>© 2016 , Developed by Shahin </a></p>
</center> 

<!--copyright end here-->
      
</body>
</html>     