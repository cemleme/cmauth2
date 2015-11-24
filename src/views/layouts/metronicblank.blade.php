<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>{{ Config::get('app.title') }}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<meta name="_token" content="{{{ csrf_token() }}}" />

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>

{!! HTML::style('packages/cemleme/auth/metronic/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! HTML::style('packages/cemleme/auth/metronic/plugins/bootstrap/css/bootstrap.min.css') !!}
{!! HTML::style('packages/cemleme/auth/metronic/plugins/uniform/css/uniform.default.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
{!! HTML::style('packages/cemleme/auth/metronic/css/style-metronic.css') !!}
{!! HTML::style('packages/cemleme/auth/metronic/css/style.css') !!}
{!! HTML::style('packages/cemleme/auth/metronic/css/style-responsive.css') !!}
{!! HTML::style('packages/cemleme/auth/metronic/css/plugins.css') !!}
{!! HTML::style('packages/cemleme/auth/metronic/css/themes/light.css') !!}
{!! HTML::style('packages/cemleme/auth/metronic/css/custom.css') !!}
{!! HTML::style('packages/cemleme/auth/spinner.css') !!}

{!! HTML::style('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css') !!}

{!! HTML::style('packages/cemleme/auth/metronic/plugins/bootstrap-datepicker/css/datepicker.css') !!}

<!-- END THEME STYLES -->

<!--[if lt IE 9]>
   {!! HTML::script('packages/cemleme/auth/metronic/plugins/respond.min.js') !!}
   {!! HTML::script('packages/cemleme/auth/metronic/plugins/excanvas.min.js') !!}
   <![endif]-->
{!! HTML::script('packages/cemleme/auth/metronic/plugins/jquery-1.11.2.min.js') !!}
{!! HTML::script('packages/cemleme/auth/metronic/plugins/jquery-migrate-1.2.1.min.js') !!}
{!! HTML::script('packages/cemleme/auth/metronic/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') !!}
{!! HTML::script('packages/cemleme/auth/metronic/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('packages/cemleme/auth/bootbox/bootbox.min.js') !!}

{!! HTML::script('packages/cemleme/auth/datatables/jquery.dataTables.min.js') !!}
{!! HTML::script('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js') !!}

{!! HTML::script('packages/cemleme/auth/metronic/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
{!! HTML::script('packages/cemleme/auth/metronic/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.tr.js') !!}


	<style>
		.brand{

			color:white;
			padding-left:25px;
		}

		.navbar-brand{
			width:auto !important;
		}

		.loader{
			height:100%;
			width:100%;
			position:fixed;
			left:0;
			top:0;
			z-index:100 !important;
			background-color:black;

			filter: alpha(opacity=75); /* internet explorer */
			-khtml-opacity: 0.75;      /* khtml, old safari */
			-moz-opacity: 0.75;       /* mozilla, netscape */
			opacity: 0.75;           /* fx, safari, opera */
		}

		.spinner{
			position:absolute;
			left:40%;
			top:30%;
			z-index:110 !important;
			color:white;
		}

		.menuProjeSelect{
			margin-top: 7px !important;
			margin-right: 5px !important;
		}
	</style>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed">

<!-- SPINNER FOR LOADER -->
<div class="loader">
	<div id="circularG" class="spinner">
		<div id="circularG_1" class="circularG"></div>
		<div id="circularG_2" class="circularG"></div>
		<div id="circularG_3" class="circularG"></div>
		<div id="circularG_4" class="circularG"></div>
		<div id="circularG_5" class="circularG"></div>
		<div id="circularG_6" class="circularG"></div>
		<div id="circularG_7" class="circularG"></div>
		<div id="circularG_8" class="circularG"></div>
	</div> 
</div>


<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="/">
			<span class="brand">{{ Config::get('app.title') }} 
				@if(PermissionChecker::getControllerName())
				/ {{ PermissionChecker::getControllerName() }}
				@endif
			</span>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="/packages/cemleme/auth/metronic/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<li class="menuProjeSelect">
				@include('ProjectsView::partials.sessionDefaultProject')
			</li>
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username">
						 {{ Session::get('username') }}
					</span>
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="/auth/yetkiyenile">
							<i class="fa fa-refresh"></i> Update Permissions
						</a>
					</li>
					<li>
						<a href="/auth/settings">
							<i class="fa fa-lock"></i> Change Password
						</a>
					</li>
					<li>
						<a href="/auth/logout">
							<i class="fa fa-sign-out"></i> Logout
						</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>

				@section('sidebar')
			    @show

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
			    	@if(Session::has('queryDebug'))
			    	  <p class="alert alert-danger">{{ Session::get('queryDebug') }}</p>
			    	@endif

			    	@if(Session::has('message'))
			    	  <p class="alert alert-info">{{ Session::get('message') }}</p>
			    	@endif
			    	      
			    	{!! $content !!}
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 2015 &copy; ESER.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->

{!! HTML::script('packages/cemleme/auth/metronic/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}
{!! HTML::script('packages/cemleme/auth/metronic/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! HTML::script('packages/cemleme/auth/metronic/plugins/jquery.blockui.min.js') !!}
{!! HTML::script('packages/cemleme/auth/metronic/plugins/jquery.cokie.min.js') !!}
{!! HTML::script('packages/cemleme/auth/metronic/plugins/uniform/jquery.uniform.min.js') !!}
<!-- END CORE PLUGINS -->
{!! HTML::script('packages/cemleme/auth/metronic/scripts/core/app.js') !!}

{!! HTML::script('packages/cemleme/auth/scripts/laravel_submit.js') !!}

<script>
    jQuery(document).ready(function() {    
        App.init();

		$('.loader').hide();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>