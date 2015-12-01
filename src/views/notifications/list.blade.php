@extends('cmauth::cmauth_master')

@section('page_subtitle','Notifications')

@section('content')

	{!! Form::boxOnlyOpen("Duyurular") !!}

	<a href="/cmauth/notifications/create" class="btn btn-success pull-right">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create New Notification
	</a>

	<select name="grup" id="selectGrup">
		@foreach($groups as $group)
			<option value="{{$group->id}}">{{$group->name}}</option>
		@endforeach
	</select>

	<select name="user" id="selectUser">
		@foreach($users as $user)
			<option value="{{$user->id}}">{{$user->name}}</option>
		@endforeach
	</select>

	<table class="table table-striped table-condensed table-bordered table-responsive">
		<thead>
			<tr>
				<th></th>
				<th>Showmodal</th>
				<th>Subject</th>
				<th>Body</th>
				<th>Assign</th>
				<th>Users</th>
			</tr>
		</thead>
		<tbody>
			@foreach($notifications as $notification)
				<tr>
					<td  class="form-inline">
						<a href="/cmauth/notifications/{{ $notification->id}}/edit" class="btn btn-warning btn-sm">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="/cmauth/notifications/{{$notification->id}}" class="btn btn-danger btn-sm laravel-submit" data-method="delete" data-confirm="Delete {{$notification->subject}} notification?">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					</td>
					<td>{{ $notification->showmodal }}</td>
					<td>{{ $notification->subject }}</td>
					<td style="width:300px">{{ $notification->body }}</td>
					<td>
						<button class="btn btn-success btn-sm assignGroup" data-nid="{{$notification->id}}"><i class="fa fa-trash-o"></i> Assign to Group</button>
						<button class="btn btn-info btn-sm assignUser" data-nid="{{$notification->id}}"><i class="fa fa-trash-o"></i> Assign to User</button>

						<a href="/cmauth/notifications/{{$notification->id}}/assign/all" class="btn btn-sm btn-primary laravel-submit" data-method="put" data-confirm="Assign to all?"><i class="fa fa-trash-o"></i> Assign to All</a>
						<a href="/cmauth/notifications/{{$notification->id}}/remove/all" class="btn btn-sm btn-danger laravel-submit" data-method="put" data-confirm="Assign to all?"><i class="fa fa-trash-o"></i> Remove from All</a>
					</td>
					<td>
						<ul>
							@foreach($notification->users as $user)
								<li>
									<button class="btn btn-danger btn-sm removeUser" data-nid="{{$notification->id}}" data-uid="{{$user->id}}"><i class="fa fa-trash-o"></i></button>
									{{$user->name}} 
									@if(!$user->pivot->read_at)
										<span class="badge">unread</badge>
									@endif
								</li>
							@endforeach
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{!! Form::boxOnlyClose() !!}

@endsection

@section('scripts-last')

<script>

$(document).ready(function() {


	$('.assignGroup').click(function(){

		var data = {
			'_token' : $('meta[name="_token"]').attr('content'),
			'_method' : 'PUT',
			'id' : $(this).attr("data-nid"),
			'gid': $('#selectGrup').val()
		};

		$.ajax({
			url: '/cmauth/notifications/assign/group',
			type:'POST',
			data: data,
			success: function(data){
				location.reload();
			}
		});
	});

	$('.assignUser').click(function(){

		var data = {
			'_token' : $('meta[name="_token"]').attr('content'),
			'_method' : 'PUT',
			'id' : $(this).attr("data-nid"),
			'uid': $('#selectUser').val()
		};

		$.ajax({
			url: '/cmauth/notifications/assign/user',
			type:'POST',
			data: data,
			success: function(data){
				location.reload();
			}
		});
	});

	$('.removeUser').click(function(){

		var parent = $(this).parent();

		var data = {
			'_token' : $('meta[name="_token"]').attr('content'),
			'_method' : 'DELETE',
			'id' : $(this).attr("data-nid"),
			'uid': $(this).attr("data-uid")
		};

		$.ajax({
			url: '/cmauth/notifications/remove/user',
			type:'POST',
			data: data,
			success: function(data){
				console.log("deleted");
				parent.remove();
			}
		});
	});
});

</script>

@endsection