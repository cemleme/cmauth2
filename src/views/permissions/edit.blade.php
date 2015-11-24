@extends('cmauth::cmauth_master')

@section('page_subtitle','Edit Permission')

@section('content')

	<form method="POST" action="/cmauth/permissions/{{$permission->id}}" accept-charset="UTF-8" class="form-horizontal">
		<input name="_method" type="hidden" value="PATCH">
		<input name="_token" type="hidden" value="{{{ csrf_token() }}}">

		<div class="form-group">
			<label for="name" class="control-label col-md-1">Permission Name</label>
			<div class="col-md-4">
				<input class="form-control" name="name" type="text" value="{{$permission->name}}" id="name">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="control-label col-md-1">Description</label>
			<div class="col-md-4">
				<input class="form-control" name="description" type="text" value="{{$permission->description}}" id="description">
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<input class="btn btn-success btn-block" type="submit" value="Update">
			</div>
		</div>
	</form>

@endsection