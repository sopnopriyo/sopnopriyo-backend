@extends('back.template')

@section('main')

 
    <div class="col-sm-12">
        {!! Form::open(['url' => 'slider', 'method' => 'post','files'=>'true','class' => 'form-horizontal panel']) !!}   
            {!! Form::control('text', 0, 'title', $errors, trans('back/users.name')) !!}
            {!! Form::control('text', 0, 'description', $errors, trans('back/users.email')) !!}
            {!! Form::control('file', 0, 'file_name', $errors, trans('back/users.password')) !!}
            {!! Form::submit(trans('front/form.send')) !!}
        {!! Form::close() !!}

         </div>

@stop