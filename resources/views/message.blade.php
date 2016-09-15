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
      
    <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($messages as $message)
      <tr class="success">
        <td>{{ $message->name }}</td>
        <td>{{ $message->email }}</td>
        <td>{{ $message->message }}</td>
        <td>{{ $message->created_at }}</td>
      </tr>
    @endforeach
    
    </tbody>
  </table>
          

    {{ $messages->links() }}

    </div>
  </div>
</div>


@endsection

