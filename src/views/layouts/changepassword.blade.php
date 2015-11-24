@extends('cmauth::cmauth_master')

@section('page_subtitle','Change Password')

@section('content')

	<form method="POST" action="/auth/changepassword" accept-charset="UTF-8" class="form-signup">
		<input name="_token" type="hidden" value="{{{ csrf_token() }}}">

		<p>
			<h2 class="form-signup-heading">Change Password</h2>
			Your password must be at least 6 characters
		</p>
		
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<input class="form-control" placeholder="Current Password" name="current_password" type="password" value="">
				</div>
				<div class="form-group">
					<input class="form-control" placeholder="New Password" name="password" type="password" value="">
				</div>
				<div class="form-group">
					<input class="form-control" placeholder="Confirm New Password" name="password_confirmation" type="password" value="">
				</div>
				<div class="form-group">
					<input class="btn btn-success btn-block" type="submit" value="Change Password">
				</div>
			</div>
		</div>

	</form>

@endsection