@extends('cmauth::emails.userMailTemplate')

@section('icerikHeader')
	Dear {{$name}},
@stop

@section('icerikUst')
	You are registered to {{ Config::get('app.title') }}.
	<br/> 
	You can access the system with your <b>username as {{$email}}</b>, using your e-mail password.
@stop

@section('icerikDugme')
	<a href="{{ url('/') }}" style="color: rgb(255, 255, 255); font-size: 15px; text-decoration: none; line-height: 34px; width: 100%;">
		{{ Config::get('app.title') }}
	</a>
@stop

@section('icerikAlt')
	You can enter the system by clicking the button above or from {{ url('/') }}
	<br/><br/>
	Please do not share your password with anyone.
@stop
