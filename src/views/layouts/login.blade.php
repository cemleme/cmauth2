@extends('cmauth::layouts.master_login')

@section('content')
  
  <p class="login-box-msg">{{ trans("cmauth::gui.loginheader") }}</p>
  
  {!! Form::open(array('url'=>'/auth/login', 'class'=>'login-form')) !!}
    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="{{ trans("cmauth::gui.email") }}" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="{{ trans("cmauth::gui.password") }}" name="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox" name="remember"> {{ trans("cmauth::gui.rememberme") }}
          </label>
        </div>
      </div><!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans("cmauth::gui.login") }}</button>
      </div><!-- /.col -->
    </div>
  </form>

  <a href="/auth/resetrequest">{{ trans("cmauth::gui.forgotpwd") }}</a><br>

@endsection