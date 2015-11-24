@extends('cmauth::cmauth_master')

@section('page_subtitle','Create Group')

@section('content')

    <form method="POST" action="/cmauth/groups" accept-charset="UTF-8" class="form-signup">
        <input name="_token" type="hidden" value="{{{ csrf_token() }}}">
        <h2 class="form-signup-heading">Create New Group</h2>
     
        <div class="row">
            <div class="col-md-4">         
                <input class="form-control" placeholder="Group Name" name="name" type="text">
                <input class="form-control" placeholder="Description" name="description" type="text">
                <br/>
                <input class="btn btn-large btn-primary btn-block" type="submit" value="Create">
            </div>
        </div>
    </form>

@endsection