@extends('cmauth::emails.userMailTemplate')

@section('icerikHeader')
	{!! trans('cmauth::emails.pwdresettitle') !!}
@stop

@section('icerikUst')
	{!! trans('cmauth::emails.pwdresetheader', ['minutes' => Config::get('auth.reminder.expire', 60)]) !!}
@stop

@section('icerikDugme')
	<a href="{{ url('password/reset/'.$token) }}" style="color: rgb(255, 255, 255); font-size: 15px; text-decoration: none; line-height: 34px; width: 100%;">{!! trans('cmauth::emails.resetpassword') !!}</a>
@stop

@section('icerikAlt')
	{!! trans('cmauth::emails.pwdresetfooter', ['url' => URL::to('password/reset', array($token))]) !!}
@stop
