@extends('cmauth::cmauth_master')

@section('content')


{!! Form::boxOpen(['route'=>'cmauth.notifications.store'], "Create Notification") !!}
    {!! Form::boxText("Subject", "subject") !!}
    {!! Form::boxTextarea("Body", "body") !!}
    {!! Form::boxCheck("Show Modal", "showmodal") !!}
{!! Form::boxClose("Save") !!}


@endsection

