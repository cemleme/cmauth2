@extends('cmauth::layouts.master_login')

@section('content')
  
  <p class="login-box-msg">Sign in to start your session</p>
  
  {!! Form::open(array('url'=>'/auth/login', 'class'=>'login-form')) !!}
    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Email" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Password" name="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox" name="remember"> Remember Me
          </label>
        </div>
      </div><!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div><!-- /.col -->
    </div>
  </form>

  <a href="/auth/resetrequest">I forgot my password</a><br>

@endsection