@extends('cmauth::emails.userMailTemplate')

@section('icerikHeader')
	Password reset request
@stop

@section('icerikUst')

	Please click the button below to reset your password.
	<br/> 
	Please disregard this e-mail if you have not asked for password reset.
	<br/>
	
	This form will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
@stop

@section('icerikDugme')
	<a href="{{ url('password/reset/'.$token) }}" style="color: rgb(255, 255, 255); font-size: 15px; text-decoration: none; line-height: 34px; width: 100%;">Reset Password</a>
@stop

@section('icerikAlt')
	If the button is not working, you can also copy the link below and paste it on your browser.
	<br/>
	{{ URL::to('password/reset', array($token)) }}
@stop
