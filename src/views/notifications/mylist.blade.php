@extends('cmauth::layouts.master')

@section('content')

	{!! Form::boxOnlyOpen(trans("cmauth::notifications.maintitle")) !!}

	<table class="table table-striped table-condensed table-bordered table-responsive">
		<thead>
			<tr>
				<th></th>
				<th>{{ trans("cmauth::notifications.date") }}</th>
				<th>{{ trans("cmauth::notifications.subject") }}</th>
				<th>{{ trans("cmauth::notifications.body") }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($notifications as $notification)
				<tr>
					<td  class="form-inline">
						<a href="/notifications/{{ $notification->id}}" class="btn btn-info btn-sm">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</a>
					</td>
					<td>{{ $notification->created_at->format('d-m-Y') }}
						@if(!$notification->pivot->read_at)
							<small class="label pull-right bg-green">yeni</small>
						@endif
					</td>
					<td>{{ $notification->subject }}</td>
					<td>{{ $notification->body }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{!! Form::boxOnlyClose() !!}

@endsection

