@extends('back.template')

@section('main')

<h1>Edit {{ $slider->title }}</h1>



    <div class="col-sm-12">
        {!! Form::model($slider, ['route' => ['slider.update', $slider->id],'files'=>'true', 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
            {!! Form::control('text', 0, 'title', $errors, trans('Slider Title')) !!}
            {!! Form::control('text', 0, 'description', $errors, trans('Slider Description')) !!}
            {!! Form::control('file', 0, 'file_name', $errors, trans('Choose a File')) !!}
            {!! Form::submit(trans('Edit')) !!}
        {!! Form::close() !!}
    </div>

@stop