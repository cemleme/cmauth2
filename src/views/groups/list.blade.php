@extends('cmauth::cmauth_master')

@section('page_subtitle','Groups')

@section('content')

	<a href="/cmauth/groups/create" class="btn btn-success pull-right">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create New Group
	</a>

	<table class="table table-striped table-condensed table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Ad</th>
				<th>Açıklama</th>
			</tr>
		</thead>
		<tbody>
			@foreach($groups as $group)
				<tr>
					<td  class="form-inline">
						<a href="/cmauth/groups/{{ $group->id}}/edit" class="btn btn-warning inline">edit</a>
						<a href="/cmauth/groups/{{$group->id}}" class="btn btn-danger laravel-submit" data-method="delete" data-confirm="{{$group->name}} grubunu silmek istediğinizden emin misiniz?">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					</td>
					<td>{{ $group->name }}</td>
					<td>{{ $group->description }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection