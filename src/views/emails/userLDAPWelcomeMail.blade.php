@extends('cmauth::emails.userMailTemplate')

@section('icerikHeader')
	{{ trans('cmauth::emails.dear') }} {{$name}},
@stop

@section('icerikUst')
	{!! trans('cmauth::emails.ldapheader', ['email' => $email]) !!}
@stop

@section('icerikDugme')
	<a href="{{ url('/') }}" style="color: rgb(255, 255, 255); font-size: 15px; text-decoration: none; line-height: 34px; width: 100%;">
		{{ Config::get('cmauth.apptitle') }}
	</a>
@stop

@section('icerikAlt')
	{!! trans('cmauth::emails.ldapfooter', ['url' => url('/')]) !!}
@stop
