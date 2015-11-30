@extends('back.template')

@section('head')

<style type="text/css">
  
  .badge {
    padding: 1px 8px 1px;
    background-color: #aaa !important;
  }

</style>

@stop

@section('main')
  
  

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('slider') }}">Homepage Slider</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('slider') }}">View All Sliders</a></li>
        <li><a href="{{ URL::to('slider/create') }}">Create a Slider</a>
    </ul>
</nav>

<h1>All the Sliders</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ trans('id') }}</th>
                    <th>{{ trans('title') }}</th>
                    <th>{{ trans('description') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                  @foreach($sliders as $key => $value)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
            
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <td>{!! link_to_route('slider.show', trans('back/users.see'), [$value->id], ['class' => 'btn btn-success btn-block btn']) !!}</td>
                <td>{!! link_to_route('slider.edit', trans('back/users.edit'), [$value->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['slider.destroy', $value->id]]) !!}
                  {!! Form::destroy(trans('Destroy'), trans('Do you really want to destroy this Slide?')) !!}
                {!! Form::close() !!}</td>
            </td>
        </tr>
    @endforeach

      </tbody>
        </table>
    </div>

@stop