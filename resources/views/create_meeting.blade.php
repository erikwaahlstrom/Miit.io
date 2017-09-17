@extends('layouts/master')

@section('content')

<div id="content" class="container">
<h2 id="newmeeting">New meeting</h2>

<form id="newmeetingform" method="POST" action="{{ URL::route('meeting.store') }}">

<div class="form-group">
        <img class="edit-name" alt="User" src="img/edit-name.png">
        <input type="text" name="name" class="form-control" placeholder="Name">
  </div>

  <div class="form-group">
        <img class="edit-name" alt="Email" src="img/edit-email.png">
        <input type="text" name="email" class="form-control" placeholder="Email">
    </div>

    <div class="form-group">
        <img class="edit-name" alt="User" src="img/edit-name.png">
        <input type="text" name="title" class="form-control" placeholder="Title">
  </div>

    <div class="form-group" id="description">
  <img class="edit-name" alt="User" src="img/edit-name.png">
  <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
</div>


<a href="#" id="add"><img id="adddates" alt="User" src="img/add-dates.png">Add dates</a>
<div id="timeinput">

</div>

  <div class="form-group" id="emailinvite">
     <img class="edit-name" alt="Email" src="img/edit-email.png">
    <input type="text" name="emailinvite" class="form-control" placeholder="Email/Invite">
  </div>

  <input type="submit" value="New meeting" class="btn btn-success">

 {{--  <a href="{{ URL::route('meetings.create') }}" class="btn btn-success">New meeting</a> --}}

 {{--  <button type="submit" id="button-newmeeting" class="btn btn-success">New meeting</button> --}}

{!! csrf_field() !!}
</form>


</div>

@endsection