@extends('cmauth::cmauth_master')

@section('page_subtitle','Users List')

@section('content')


	<a href="/cmauth/users/create" class="btn btn-success pull-right">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create New User
	</a>

	<table class="table table-striped table-condensed table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>LDAP</th>
				<th>Ad</th>
				<th>Email</th>
				<th>Last Activity</th>
				<th>Pwd Changed</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td  class="form-inline">
						@if(!($user->ldap>0 && config('cmauth.ldap')))
							<a href="/cmauth/users/{{$user->id}}/yenisifremail" class="btn btn-info laravel-submit" data-method="put" data-confirm="Are you sure to reset password of {{$user->name}}?">Reset Password</a>
						@endif

						<a href="/cmauth/users/{{$user->id}}/edit" class="btn btn-warning inline">edit</a>
						<a href="/cmauth/users/{{$user->id}}" class="btn btn-danger laravel-submit" data-method="delete" data-confirm="Delete user: {{$user->name}}?">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

						@if($user->ldap>0 && config('cmauth.ldap'))
							<a href="/cmauth/users/{{$user->id}}/ldapwelcomemail" class="btn btn-primary laravel-submit" data-method="put" data-confirm="Send LDAP Welcome E-mail to {{$user->name}}?">LDAP Welcome</a>
						@elseif(!$user->welcomesent)
							<a href="/cmauth/users/{{$user->id}}/welcomemail" class="btn btn-info laravel-submit" data-method="put" data-confirm="Are you sure to send welcome E-mail to {{$user->name}}?">Welcome</a>
						@endif
					</td>
					<td>{{ $user->ldap }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->last_activity_diff_tr }}</td>
					<td>{{ $user->pwdchanged }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>


@endsection