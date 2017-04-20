@extends('layouts.back-end')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-1">
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
        <td>{{ date('d-m-Y', strtotime($message->created_at)) }}</td>
        <td>
            {!! Form::open(['url' => 'message/'.$message->id,'autocomplete' => 'off']) !!}
            
             <fieldset>
            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-block btn-primary">
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

