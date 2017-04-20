@extends('layouts.front-end')

@section('content')

<div class="header">
   <div class="container">
        <div class="header-top">    
          
                        
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
                    <p>I born in a very small distirct called Meherpur in Bangladesh, and currently studying in Malaysia. Pursuing a bachelor degree in Computer Science majoring in Software Engineering in University of Malaya, Malaysia.</p>
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
                <li><a href="https://www.facebook.com/sopnopriyoo"><i class="fa fa-facebook" style="font-size:34px;color:#3b5998"></i></a></li>
                <li><a href="https://twitter.com/sopnopriyo"><i class="fa fa-twitter" style="font-size:34px;color:#00aced"></i></a></li>
                <li><a href="https://github.com/sopnopriyo"><i class="fa fa-github" style="font-size:34px;color:black"></i></a></li>
                <li><a href="https://my.linkedin.com/in/shahin-alam-98933194"><i class="fa fa-linkedin" style="font-size:34px;color:#0077B5"></i></a></li>
                <li><a href="https://stackoverflow.com/users/4778904/shahin-alam"><i class="fa fa-stack-overflow" style="font-size:34px;color:#fff"></i></a></li>

                
            </ul>
            <div class="clearfix"> </div>
        </div>
    
                        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

    </div>
</div>


<br><br> <br>
<center>
 <p> 2017 , Developed by Shahin </a></p>
</center> 

@endsection
