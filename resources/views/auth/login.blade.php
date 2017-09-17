@extends('layouts/master')


@section('content')
<div class="container content">
    <div class="info">
        <h2>Login</h2>
    </div>

    <div class="authform">
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}

            <div>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>

            <div>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
            </div>

            <div>
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div>
                <button class="btn btn-success loginbtn" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection