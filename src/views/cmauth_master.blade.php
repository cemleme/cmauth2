@extends('cmauth::layouts.master')

@section('page_header')
	<section class="content-header">
      <h1>
        CMAUTH
        <small>@yield('page_subtitle')</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/cmauth"><i class="fa fa-dashboard"></i>CMAUTH</a></li>
        <li class="active">@yield('page_subtitle')</li>
      </ol>
    </section>
@endsection