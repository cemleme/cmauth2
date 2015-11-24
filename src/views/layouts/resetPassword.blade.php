@extends('cmauth::layouts.master_login')

@section('content')

  <p class="login-box-msg">Please enter your registered e-mail to reset your password</p>

  {!! Form::open(array( 'url' => '/password/reset', 'class'=>'forget-form')) !!}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Email" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="New Password" name="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="row">
      <div class="col-xs-8">
      </div><!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
      </div><!-- /.col -->
    </div>

  {!! Form::close() !!}

@endsection