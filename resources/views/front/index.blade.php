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
      			</div>
    		</div>
    	@else
    			<div class="item">
      			<img src="{{$slider->file_name}}" data-color="lightblue" alt="First Image">
      			<div class="carousel-caption">
        			<h3>{{$slider->title}}</h3>
      			</div>
    		</div>
    	
    	@endif 
  
     @endforeach

    </div>
   
    
    <!-- more slides here -->
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

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


