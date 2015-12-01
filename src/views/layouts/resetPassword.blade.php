@extends('cmauth::layouts.master_login')

@section('content')

  <p class="login-box-msg">{{ trans("cmauth::gui.resetpwdheader") }}</p>

  {!! Form::open(array( 'url' => '/password/reset', 'class'=>'forget-form')) !!}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="{{ trans("cmauth::gui.email") }}" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="{{ trans("cmauth::gui.newpwd") }}" name="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="{{ trans("cmauth::gui.confirmpwd") }}" name="password_confirmation">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="row">
      <div class="col-xs-8">
      </div><!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans("cmauth::gui.reset") }}</button>
      </div><!-- /.col -->
    </div>

  {!! Form::close() !!}

@endsection