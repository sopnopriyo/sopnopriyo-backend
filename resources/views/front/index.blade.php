@extends('front.template')

@section('main')
	
<div id="mycarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
    <li data-target="#mycarousel" data-slide-to="1"></li>
    <li data-target="#mycarousel" data-slide-to="2"></li>
    <li data-target="#mycarousel" data-slide-to="3"></li>
    <li data-target="#mycarousel" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
   

       @foreach($sliders as $key =>$slider)
    	
    	@if($key===1)
    		<div class="item active">
      			<img src="{{$slider->file_name}}" data-color="lightblue" alt="First Image">
      			<div class="carousel-caption">
        			<h3>{{$slider->title}}</h3>
              <h3>{{$slider->description}}</h3>
      			</div>
    		</div>
    	@else
    			<div class="item">
      			<img src="{{$slider->file_name}}" data-color="lightblue" alt="First Image">
      			<div class="carousel-caption">
        			<h1>{{$slider->title}}</h1>
              <h3>{{$slider->description}}</h3>
      			</div>
    		</div>
    	
    	@endif 
  
     @endforeach

    </div>
   
    
    <!-- more slides here -->
  </div>

  <!-- Controls -->

  <!--
  <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

  -->
</div>

 <!-- Services Section -->
    <section id="services">
        <div class="container">
            <br>
            <div class="row text-center">

                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
                    </span>
                    <p class="service-heading">Admin Panel</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <p class="service-heading">Responsive Web Design</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-file-image-o fa-stack-1x fa-inverse"></i>
                    </span>
                    <p class="service-heading">Logo & Banner Design</p>
                    </div>
                
                
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                    <p class="service-heading">Mobile Apps Development</p>
                    </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <p class="service-heading">Software Maintenance</p>
                     </div>
                
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                    </span>
                    <p class="service-heading">Consulting</p>
                    </div>
                
            </div>

          </div>
    </section>


<script>
$('.carousel').carousel({
  interval: 6000,
  pause: "false"
});


var $item = $('.carousel .item');
var $wHeight = $(window).height();

$item.height($wHeight); 
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});
</script>


@stop


