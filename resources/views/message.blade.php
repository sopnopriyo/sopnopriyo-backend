@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <ul class="nav nav-pills nav-stacked">
        <li ><a href="/dashboard">Dashboard</a></li>
        <li class="active"><a href="/message">Message</a></li>
     </ul><br>
      
    </div>

    <div class="col-sm-9">
      <h4><small>Recent Messages</small></h4>
      <hr>
      
       <div class="flash-message">
              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
              @endforeach
            </div>
    <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($messages as $message)
      <tr class="success">
        <td>{{ $message->name }}</td>
        <td>{{ $message->email }}</td>
        <td>{{ $message->message }}</td>
        <td>{{ $message->created_at }}</td>
        <td>
            {!! Form::open(['url' => 'message/'.$message->id,'autocomplete' => 'off']) !!}
            
             <fieldset>
            <input type="submit" value="Edit" class="btn btn-block btn-primary">
          </fieldset>
        {!! Form::close() !!}
        </td>
       </tr>
    @endforeach
    
    </tbody>
  </table>
          

    {{ $messages->links() }}

    </div>
  </div>
</div>


@endsection

