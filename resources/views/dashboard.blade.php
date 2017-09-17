@extends('layouts.master')
@section('content')

<div id="content" class="container">

<img class="usericon" alt="user" src="img/usericon.png">


<h2 id="dashboard">User information</h2>

@if(Session::has('message'))
	<div class="alert alert-success">
		{{Session::get('message')}}
	</div>
@endif


<form id="dashboardform" method="POST" action="{{ URL::route('user.update', $user->id) }}">


	<input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

  	<div class="form-group">
  			<img class="edit-name" alt="User" src="img/edit-name.png">
    		<input type="name" name="name" class="form-control" id="dashboardform" value="{{$user->name}}">
 	</div>

	  <div class="form-group">
	  		<img class="edit-name" alt="Email" src="img/edit-email.png">
	    	<input type="email" name="email" class="form-control" id="dashboardform" value="{{$user->email}}">
	  </div>

	  <div class="form-group">	
	  		<img class="edit-name" alt="Password" src="img/edit-password.png">
	    	<input type="password" name="password" class="form-control" id="dashboardform" placeholder="Password">
	  </div>
 		
  		<button type="submit" class="btn btn-success">Save</button>
  	

</form>

	<h2 id="dashboard-meetings">My meetings</h2>

@if($meeting->count())

<hr class="hr">
<div class="meetingstable">
@foreach($meeting as $meeting)
	{{ $meeting->title }}
<img class="statusimg" src="img/{{ $meeting->status }}.png">
	<br>
	<br>


@endforeach

</div>


@endif
</div>
@stop

@endsection