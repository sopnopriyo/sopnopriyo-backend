@extends('front.template')

@section('main')
<!--services start here-->

<div class="services" id="services">
	<div class="container">
		<div class="sevices-main" id="mem-mover">
			<div class="ser-top">
			<h3>Services</h3>
			<span class="ser-line"> </span>
			<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,similique sunt in culpa qui officia deserunt mollitia</p>
			</div>
			<div class="col-md-4 ser-grid">
				{!! HTML::image('img/s1.png') !!}
				<h4>Web Development</h4>
				<span class="ser-gridline"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
				<div class="ser-btn">
					<a href="#">Read More</a>
				</div>
			</div>
			<div class="col-md-4 ser-grid">
				{!! HTML::image('img/s2.png') !!}
				<h4>Web Design</h4>
				<span class="ser-gridline"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
				<div class="ser-btn">
					<a href="#">Read More</a>
				</div>
			</div>
			<div class="col-md-4 ser-grid">
				{!! HTML::image('img/s3.png') !!}
				<h4>Consultancy</h4>
				<span class="ser-gridline"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
				<div class="ser-btn">
					<a href="#">Read More</a>
				</div>
			</div>
			<div class="clearfix"> </div>			
		</div>
		<div class="skills">
			<h3>Our Skills</h3>
			<div class="col-md-4 skills-gd">
				<h4>Web Design</h4>
				<span class="skill-line"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
			</div>
			<div class="col-md-4 skills-gd">
				<h4>Web Design</h4>
				<span class="skill-line"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
			</div>
			<div class="col-md-4 skills-gd">
				<h4>Web Design</h4>
				<span class="skill-line"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
			</div>
			<div class="col-md-4 skills-gd">
				<h4>Web Design</h4>
				<span class="skill-line"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
			</div>
			<div class="col-md-4 skills-gd">
				<h4>Web Design</h4>
				<span class="skill-line"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
			</div>
			<div class="col-md-4 skills-gd">
				<h4>Web Design</h4>
				<span class="skill-line"> </span>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
			</div>
		  <div class="clearfix"> </div>
		  <a class="scroll" href="#ser-mover"> <span class="mover"> </span> </a>
		</div>
	</div>
</div>
<!--services end here-->

</div>
@stop