@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="/dashboard">Dashboard</a></li>
        <li><a href="/message">Message</a></li>
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <h4><small>Dashboard</small></h4>
      <hr>
      <h2>Total number of messages : <mark>{{$contacts}}</mark></h2>
      
      

    </div>
  </div>
</div>


@endsection

