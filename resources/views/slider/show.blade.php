@extends('back.template')

@section('main')

 
    <h1>Showing {{ $slide->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $slide->description }}</h2>
        {!! HTML::image($slide->file_name, 'a picture',array('width' => '50%', 'height' => '50%')) !!}
    </div>

@stop