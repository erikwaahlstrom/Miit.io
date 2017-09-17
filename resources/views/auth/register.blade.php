@extends('layouts/master')


@section('content')
<div class="container content">
    <div class="info">
        <h2>Register</h2>
    </div>

    <div class="authform">
        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
            </div>

            <div>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>

            <div>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>

            <div>
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
            </div>

            <div>
                <button class="btn btn-success" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection