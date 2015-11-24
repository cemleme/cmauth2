@extends('cmauth::cmauth_master')

@section('page_subtitle','User Groups')

@section('content')

	<style>
	.panel-group{
		margin-left:15px;
		width:90%;
	}

	.btn-group{
		margin-bottom:3px;
	}

	.label-grp{
		margin-right:2px;
		font-size:12px;
		margin-top:45px;
	}
	</style>

	<table class="table table-striped table-condensed table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Ad</th>
				<th>Email</th>
				<th>Gruplar / İzinler</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td  class="form-inline">
						<form method="POST" action="/cmauth/users/{{{$user->id}}}/groups/connect" accept-charset="UTF-8">
							<input name="_token" type="hidden" value="{{{ csrf_token() }}}">

							<select class="form-control group-select" name="group">
								@foreach($groups as $group)
									<option value="{{{$group->id}}}">{{{$group->name}}}</option>
								@endforeach
							</select>

							<input class="btn btn-success" type="submit" value="Ekle">
						</form>
					</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td class="container-fluid">
						@foreach($user->groups as $group)
							<div class="row">
								<div class="offset-1 col-sm-4">
									<span class="label label-primary">
										{{$group->name}}
										<a href="/cmauth/users/{{$user->id}}/groups/{{$group->id}}" class="btn btn-danger btn-sm laravel-submit" data-method="delete" data-confirm="{{ $user->name }} kullanıcısını, {{$group->name}} grubundan silmek istediğinizden emin misiniz?">
											<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
										</a>
									</span>
								</div>
								<div class="col-sm-7">
									<ul class="">
										@foreach($group->permissions as $permission)
											<?php 
											//$permissions.='<span class="label label-warning label-grp">'.$permission->name.'</span>'; 
											?>
											<li class="">{{$permission->name }}</li>
										@endforeach
									</ul>  
								</div>
							</div>
						@endforeach
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection