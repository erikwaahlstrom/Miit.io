<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Miit.io</title>

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') }}">


	<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquery-ui-timepicker-addon.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquery-ui-timepicker-addon.min.css') }}">

	<link rel="stylesheet" href="{{ URL::asset('http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquery.datetimepicker.css') }}">


	<link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Comfortaa:400,300,700') }}" rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
<div id="wrapper">
	<nav id="navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div id="header" class="container">
            <div class="navbar-header">
                <a class="logo navbar-brand" href="{{ url('/') }}"><img class="logoicon" alt="logo" src="../img/logoicon.png">Miit.io</a>
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
                @if(Auth::check())
                    <a href="{{ url('dashboard') }}">Dashboard</a>
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
    </nav>

		@yield('content')


		<div id="footer" class="container">

			<ul>
				<li><a href="#"> &copy; Miit.io</a></li>
			</ul>

	</div>
</div>

<script src="{{ URL::asset('http://code.jquery.com/jquery-1.8.2.js') }}"></script>

<script src="{{ URL::asset('http://code.jquery.com/ui/1.9.0/jquery-ui.js') }}"></script>

<script src="{{ URL::asset('jquery-ui-timepicker-addon.js') }}"></script>
<script src="{{ URL::asset('jquery-ui-timepicker-addon.min.js') }}"></script>
<script src="{{ URL::asset('jquery-ui-sliderAccess.js') }}"></script>
<script type="text/javascript">
$(function() {

	$("a#add").click(function(){
        $(options).fadeIn("slow").appendTo("#timeinput");
        i++;
        return false;
    });

    //fadeout selected item and remove
    $('.remove').live('click', function() {
        $(this).parent().fadeOut(300, function(){
            $(this).empty();
            return false;
        });
    });

    var options = '<p><input type="text" class="datetimepicker" placeholder=" Add dates" name="dates[]" value="" size="10" />	<br><a href="#" class="remove">Remove</a></p>';

    $('.datetimepicker').live('click', function() {
        $(this).datetimepicker('destroy').datetimepicker({changeMonth: true,changeYear: true,format: "d-m-Y H:i",
        	yearRange: "1900:+10",showOn:'focus'}).focus();
    });

});
</script>

<script src="{{ URL::asset('build/jquery.datetimepicker.full.min.js') }}"></script>

<script type="text/javascript">
$(function() {
jQuery('#datetimepicker').datetimepicker({
format:'d-m-Y H:i'
});

$(document).ready(function(){

    $("#btn2").click(function(){
        $("#timeinput").append("<input id='datetimepicker' type='text' class='form-control' placeholder='Add dates'>");
    });
});

});

</script>

</body>

</html>