<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Miit.io</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') }}">
	<link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Comfortaa:400,300,700') }}" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
<div id="wrapper">
	<nav id="startpagenavbar" class="navbar navbar-inverse" role="navigation">
        <div id="header" class="container">
            <div class="navbar-header">
                <a class="logo navbar-brand" href="{{ url('/') }}"><img class="logoicon" alt="logo" src="img/logoicon.png">Miit.io</a>
            </div>
          
            <ul class="nav navbar-nav">
				<li>
                @if(Auth::check())
                	<a href="{{ url('create') }}">New meeting</a>
                @else
                    <a href="{{ url('auth/register') }}">Register</a>
                @endif
                </li>
                <li>
                {{-- Kollar om användaren är inloggad --}}
                @if(Auth::check()) 
                    <a href="{{ url('auth/logout') }}">Logout</a>
                @else 
                	<a href="{{ url('auth/login') }}">Login</a>
                @endif    
                </li>
            </ul>
        </div>

		<div id="startpageheaderinfo">
        	<p>Schedule meetings with minimal effort.</p>

        	<div id="startpagebtns">		
				<input onclick="window.location = '{{ url('create') }}'" class="btn btn-danger" type="button" value="Create new meeting">
				<input onclick="window.location = '{{ url('auth/register') }}'" class="btn btn-success registerbtn" type="button" value="Register">
			</div>

			<a href="#howitworks" class="startpagequestionlink">
				<div class="circle">?</div>
			</a>
			<p class="learnmore">Learn more</p>
        </div>
		
{{-- 		<div id="startpagelogo">
        	<a class="logo" href="{{ url('/') }}"><img class="logoicon" alt="logo" src="img/logoicon.png"><br>Miit.io</a>
        </div> --}}
    </nav>
		@yield('content')
		
		<div class="container content">
			<div id="howitworks" class="howitworks">
				<h3>How it works</h3>
				<p>Miit.io is very simple to use.</p>
				<p>With only a few steps you can schedule a meeting with your colleague</p>
			</div>

			<div id="howitworksicons">				
				<div class="howitworkstext">
				<div class="howitworkscircle circle1"></div>
					<h5>1. Create new meeting</h5>
					<p>Start by creating a new meeting and fill in all the information about the meeting.</p>
				</div>

				<div class="howitworkstext">
				<div class="howitworkscircle circle2"></div>
					<h5>2. Invite your colleague</h5>
					<p>Invite your colleague or friend to the meeting. They can then choose one of the dates you set that fits their schedule.</p>
				</div>

				<div class="howitworkstext">
				<div class="howitworkscircle circle3"></div>
					<h5>3. Your meeting is set!</h5>
					<p>When your colleague has chosen a date you will receive a notification an your meeting will be set.</p>
				</div>
			</div>

			<div class="howitworks">
				<h3>How it looks</h3>
				<p>Miit.io has a beautiful and simple UI.</p>
				<p>It's also responsive which means you can use it on any device.</p>
			</div>

			<div id="responsivescreens"></div>

		</div>

		<div id="footer" class="container">
	
			<ul>
				<li><a href="#"> &copy; Miit.io</a></li>
			</ul>
		
	</div>
</div>

</body>
</html>