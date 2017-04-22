@extends('layouts.back-end')


@section('content')
<div class="container">

  <div class="row col-lg-12 col-md-offset-1">
  	@if (session('message'))
	    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif
    <div>
      <a href="/new-portfolio" class="btn btn-primary" role="button" >New Portfolio</a>
    </div>
    <br>
    
       <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
           
            <div class="row">
                @foreach ($portfolios as $portfolio) 
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{ strtolower($portfolio->image) }}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4><a href="portfolio/edit/{{ $portfolio->id }}">{{ $portfolio->name }}</a></h4>
                        <p class="text-muted">{{ $portfolio->description }}</p>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>



  </div>


</div>

@endsection
