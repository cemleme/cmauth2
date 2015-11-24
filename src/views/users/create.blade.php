@extends('cmauth::cmauth_master')

@section('page_subtitle','Create User')

@section('content')

	<form method="POST" action="/cmauth/users" accept-charset="UTF-8" class="form-horizontal form-bordered">
		<input name="_token" type="hidden" value="{{{ csrf_token() }}}">
	    <h2 class="form-signup-heading">Create New User</h2>
	 
		<div class="row">
			<div class="col-md-4">
				<input class="form-control" placeholder="Name" name="name" type="text">
				<input class="form-control" placeholder="Email Address" name="email" type="text">
				
				<label for="ldap" class="control-label">Authentication System</label>
				
				<select name="ldap" class="form-control">
					<option value="0" selected>Cmauth</option>
					<option value="1">LDAP</option>
				</select>
				<br/>
	            <input class="btn btn-large btn-primary btn-block" type="submit" value="Create">
			</div>
		</div>
	</form>

@endsection