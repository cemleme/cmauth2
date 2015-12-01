@extends('cmauth::layouts.master_login')

@section('content')

  <p class="login-box-msg">{{ trans("cmauth::gui.resetrequestheader") }}</p>


  {!! Form::open(array( 'url' => '/password/email', 'class'=>'forget-form')) !!}

    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="{{ trans("cmauth::gui.email") }}" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="row">
      <div class="col-xs-8">
        <a href="/auth/login" class="btn btn-default">
          <span class="glyphicon glyphicon-chevron-left"></span>
          {{ trans("cmauth::gui.back") }}
        </a>
      </div><!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans("cmauth::gui.request") }}</button>
      </div><!-- /.col -->
    </div>

  {!! Form::close() !!}

@endsection