@extends('layouts.front-end')


@section('content')
<div class="container">

  <div class="row col-lg-12 col-md-offset-1">

  <div class="page-header">
    <h1>The following projects I have worked on . . .</h1>      
  </div>
    @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
    
    <br>
    
       <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
           
            <div class="row">
                @foreach ($portfolios as $portfolio) 
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            
                        </div>
                        <img src="..{{ strtolower($portfolio->image) }}" class="img-responsive" alt="No Image" height="400" width="450">
                    </a>
                    <div class="portfolio-caption">
                        <h4><a href="{{ $portfolio->url }}">{{ $portfolio->name }}</a></h4>
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
