@extends('front.template')

@section('main')
<!--services start here-->
<br>
<hr>
<br>
<div class="services" id="services">
	<div class="container">
		<div class="sevices-main" id="mem-mover">
			<div class="ser-top">
			<h3>Services</h3>
			<span class="ser-line"> </span>
			<p>
				This is Sopnopriyo International. We offer a number of Services to meet the latest online trends of Business.
				We always welcome our customers to express their ideas to 
				us in order to put them in action.
			</p>
			</div>
			<div class="col-md-4 ser-grid">
				{!! HTML::image('img/s1.png') !!}
				<h4>Web Development</h4>
				<span class="ser-gridline"> </span>
				<p>Our online Softwares foucs on quality,performance and extendable.We are very concerned about security, runtime and mobility.
					<div class="ser-btn">
					<a href="#">Read More</a>
				</div>
			</div>
			<div class="col-md-4 ser-grid">
				{!! HTML::image('img/s2.png') !!}
				<h4>Web Design</h4>
				<span class="ser-gridline"> </span>
				<p>It is not worth to have system that does not impress the end users.We use the most suitable technology to make our Software looks better
					and compatitable in multiple devices.
					<div class="ser-btn">
					<a href="#">Read More</a>
				</div>
			</div>
			<div class="col-md-4 ser-grid">
				{!! HTML::image('img/s3.png') !!}
				<h4>Consultancy</h4>
				<span class="ser-gridline"> </span>
				<p>Our expert team are commited to provide the best suitable information to enrich the goal of your Business.
					<div class="ser-btn">
					<a href="#">Read More</a>
				</div>
			</div>
						
		</div>
		 
	</div>
</div>
<!--services end here-->

</div>
@stop