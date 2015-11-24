@extends('cmauth::cmauth_master')

@section('page_subtitle','Group Permissions')

@section('content')


	<style>
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
				<th>Grup</th>
				<th>İzinler</th>
			</tr>
		</thead>
		<tbody>
			@foreach($groups as $group)
				<tr>
					<td  class="form-inline">

						<form method="POST" action="/cmauth/groups/{{{$group->id}}}/permissions/connect" accept-charset="UTF-8">
							<input name="_token" type="hidden" value="{{{ csrf_token() }}}">

							<select class="form-control group-select" name="permission">
								@foreach($permissions as $permission)
									<option value="{{{$permission->id}}}">{{{$permission->name}}}</option>
								@endforeach
							</select>

							<input class="btn btn-success" type="submit" value="Ekle">
						</form>

					</td>
					<td>{{ $group->name }}</td>
					<td>
						<ul>
						@foreach($group->permissions as $permission)
							<li>
								<span class="label label-primary">
								{{$permission->name}}
								<a href="/cmauth/groups/{{$group->id}}/permissions/{{$permission->id}}" class="btn btn-danger btn-xs laravel-submit" data-method="delete" data-confirm="{{ $permission->name }} iznini, {{$group->name}} grubundan silmek istediğinizden emin misiniz?">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</a>
								</span>
							</li>
						@endforeach  
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection