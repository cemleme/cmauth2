
	@if(Session::has('pwdchanged') && Session::get('pwdchanged')==0 && Auth::user()->ldap==0 && !config('cmauth.ldap'))
		<div class="col-sm-4">
			<div class="dashboard-stat yellow">
				<div class="visual">
					<i class="fa fa-key"></i>
				</div>
				<div class="details">
					<div class="number">
					</div>
					<div class="desc">
						 Change<br/>Password
					</div>
				</div>
				<a class="more" href="/auth/settings">
					 Click Here <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	@endif


    @can('AppsUsersEdit')

	    <div class="col-lg-3 col-xs-5">
	      <!-- small box -->
	      <div class="small-box bg-purple">
	        <div class="inner">
	          <h3>User<br/>Management</h3>
	        </div>
	        <div class="icon">
	          <i class="fa fa-users"></i>
	        </div>
	        <a href="/cmauth" class="small-box-footer">
	          Tıklayınız <i class="fa fa-arrow-circle-right"></i>
	        </a>
	      </div>
	    </div><!-- ./col -->

    @endcan

    @can('ViewLog')
    
	    <div class="col-lg-3 col-xs-5">
	      <!-- small box -->
	      <div class="small-box bg-yellow">
	        <div class="inner">
	          <h3>View<br/>Logs</h3>
	        </div>
	        <div class="icon">
	          <i class="fa fa-users"></i>
	        </div>
	        <a href="/logs" class="small-box-footer">
	          Tıklayınız <i class="fa fa-arrow-circle-right"></i>
	        </a>
	      </div>
	    </div><!-- ./col -->

    @endcan

    @can('AppsUsersEdit')

		<div class="col-sm-4">
			@foreach($lastactivities as $user)
				<p>
					<span class="label label-info">{{ $user->name }} </span>
					<span class="label label-danger">{{$user->last_activity_diff_tr}}</span>
				</p>
			@endforeach
		</div>

	@endcan