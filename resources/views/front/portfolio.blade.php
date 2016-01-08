@extends('front.template')

@section('main')
<!--services start here-->
<div class="container">
  <br>
  <br>
  <h2>Our Portfolio</h2>
  <h4>Some of our successful achievements</h4>
  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        {!! HTML::image('img/esports.jpg') !!}
        <p><strong>eSports Malaysia</strong></p>
        <p>Yes, We were part of eSports Development Team</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        {!! HTML::image('img/edumalaysiabd.jpg') !!}
        <p><strong>EduMalaysiaBd</strong></p>
        <p>We built Bangladeshi Education Consultancy website and continousoly providing suports</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        {!! HTML::image('img/isc.jpg') !!}
        <p><strong>ISC,University of Malaya</strong></p>
        <p>Developing ISC website to meet the expectation of latest technology</p>
      </div>
    </div>
</div>
</div>
@stop