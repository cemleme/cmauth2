@extends('cmauth::layouts.master')

@section('page_header')
	<section class="content-header">
      <h1>
        {{ trans("cmauth::notifications.notification") }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/notifications"><i class="fa fa-home"></i>{{ trans("cmauth::notifications.maintitle") }}</a></li>
      </ol>
    </section>
@endsection


@section('content')

	{!! Form::boxOnlyOpen($notification->subject) !!}

	<p>{{$notification->body}}</p>

	{!! Form::boxOnlyClose() !!}

@endsection