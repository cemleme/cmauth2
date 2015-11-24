@extends('cmauth::cmauth_master')

@section('page_subtitle','Permissions List')

@section('content')

	<a href="/cmauth/permissions/create" class="btn btn-success pull-right">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create New Permission
	</a>

	<table class="table table-striped table-condensed table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			@foreach($permissions as $permission)
				<tr>
					<td  class="form-inline">
						<a href="/cmauth/permissions/{{ $permission->id}}/edit" class="btn btn-warning inline">edit</a>
						<a href="/cmauth/permissions/{{$permission->id}}" class="btn btn-danger laravel-submit" data-method="delete" data-confirm="{{$permission->name}} iznini silmek istediğinizden emin misiniz?">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					</td>
					<td>{{ $permission->name }}</td>
					<td>{{ $permission->description }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection