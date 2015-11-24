@extends('cmauth::cmauth_master')

@section('page_subtitle','Edit User')

@section('content')

	<form method="POST" action="/cmauth/users/{{$user->id}}" accept-charset="UTF-8" class="form-horizontal">
		<input name="_method" type="hidden" value="PATCH">
		<input name="_token" type="hidden" value="{{{ csrf_token() }}}">

		<div class="form-group">
			<label for="name" class="control-label col-md-1">User Name</label>
			<div class="col-md-4">
				<input class="form-control" name="name" type="text" value="{{$user->name}}" id="name">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="control-label col-md-1">E-mail</label>
			<div class="col-md-4">
				<input class="form-control" name="email" type="text" value="{{$user->email}}" id="email">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="control-label col-md-1">Authentication System</label>
			<div class="col-md-4">
				<select name="ldap" class="form-control">
					<option value="0" {{($user->ldap) ? '' : 'selected'}}>Cmauth</option>
					<option value="1" {{($user->ldap) ? 'selected' : ''}}>LDAP</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<input class="btn btn-success btn-block" type="submit" value="Update">
			</div>
		</div>
	</form>

@endsection