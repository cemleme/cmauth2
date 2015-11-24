@extends('cmauth::emails.userMailTemplate')

@section('icerikHeader')
	Dear {{$name}},
@stop

@section('icerikUst')
	Your {{ Config::get('app.title') }} password was reset.
	<br/> 
	Your access information is as follows:
	<br/><br/>
	<b>Username:</b> {{$email}}
	<br/>
	<b>Password:</b> {{$password}}
@stop

@section('icerikDugme')
	<a href="{{ url('/') }}" style="color: rgb(255, 255, 255); font-size: 15px; text-decoration: none; line-height: 34px; width: 100%;">
		{{ Config::get('app.title') }}
	</a>
@stop

@section('icerikAlt')
	You can enter the system by clicking the button above or from {{ url('/') }}
	<br/><br/>
	Please change your password and do not share it with anyone.
@stop
