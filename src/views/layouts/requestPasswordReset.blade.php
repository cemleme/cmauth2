@extends('cmauth::layouts.master_login')

@section('content')

  <p class="login-box-msg">Please enter your registered e-mail to reset your password</p>


  {!! Form::open(array( 'url' => '/password/email', 'class'=>'forget-form')) !!}

    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Email" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="row">
      <div class="col-xs-8">
        <a href="/auth/login" class="btn btn-default">
          <span class="glyphicon glyphicon-chevron-left"></span>
          Back 
        </a>
      </div><!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Request</button>
      </div><!-- /.col -->
    </div>

  {!! Form::close() !!}

@endsection