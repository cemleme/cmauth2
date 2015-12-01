@extends('cmauth::cmauth_master')

@section('content')

    {!! Form::boxOpenModel($notification,
                            ['method' => 'PATCH', 'action'=> ['\Cemleme\Cmauth\controllers\NotificationsController@update', $notification->id]],
                             "<b>".$notification->subject."</b> ", "warning") !!}

   		{!! Form::boxText("Subject", "subject") !!}
    	{!! Form::boxTextarea("Body", "body") !!}
    	{!! Form::boxCheck("Show Modal", "showmodal") !!}
    {!! Form::boxClose("Update") !!}


@endsection

