<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('cmauth.appfulltitle') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href={{ asset("favicon.ico") }}>

    <!-- CSRF TOKEN -->
    <meta name="_token" content="{{{ csrf_token() }}}" />

    <!-- Bootstrap 3.3.5 -->
    <link href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- iCheck -->
    <link href="{{ asset("/admin-lte/plugins/iCheck/square/blue.css")}}" rel="stylesheet" type="text/css" />


    <!-- Date Picker -->
    <link href="{{ asset("/packages/bootstrap-datepicker/css/datepicker.css")}}" rel="stylesheet" type="text/css" />
    
    <!-- Loader Spinner -->
    <link href="{{ asset("/packages/spinner.css")}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

    .content-wrapper{
      min-height:200px !important;
    }

    </style>


  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

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


    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">{{ config('cmauth.apptitlemini') }}</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>{{ config('cmauth.apptitle') }}</b>{{ config('cmauth.apptitlesub') }}</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              @include('cmauth::layouts.notification_header')

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <p>
                      {{ Auth::user()->name }} - {{ Auth::user()->email }}
                      <small>{{ trans("cmauth::gui.membersince") }} {{ Auth::user()->created_at }}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/auth/password" class="btn btn-default btn-flat">{{ trans("cmauth::gui.changepwd") }}</a>
                    </div>
                    <div class="pull-right">
                      <a href="/auth/logout" class="btn btn-default btn-flat">{{ trans("cmauth::gui.logout") }}</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>


      <!-- Sidebar -->
      @include(config('cmauth.sidebar'))


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        @yield('page_header')

        @if(Session::has('message'))
          <div class="alert alert-info">
              <span>{{ Session::get('message') }}</span>
          </div>
        @endif

        @if(Session::has('status'))
          <div class="alert alert-info">
              <span>{{ Session::get('status') }}</span>
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger">
              <span>{{$errors->first()}}</span>
          </div>
        @endif


        @if($modal_notifications->count())
          @include('cmauth::layouts.notification_modal')
        @endif

        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <!-- Footer -->
      @include(config('cmauth.footer'))


    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->


    <!-- jQuery 2.1.4 -->
    <script src="{{ asset ("/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

    <!-- Laravel Submit JS -->
     <script src="{{ asset ("/laravel_submit.js") }}" type="text/javascript"></script>

    <script src="{{ asset ("/packages/bootstrap-datepicker/js/bootstrap-datepicker.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/packages/bootstrap-datepicker/js/locales/bootstrap-datepicker.tr.js") }}" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
     <script>
        $(document).ready(function() {
          var options={
            html : true, 
            placement:"auto",
            trigger:"hover"
            
          }
          $('.apop').popover(options);

          $( ".date-picker" ).datepicker({
              weekStart:1,
              todayHighlight:true,
              language:"tr",
              format:"dd-mm-yyyy",
              forceParse:false
          });

          $('.loader').hide();

          $('#notificationsModal').modal();

          $('#notificationModalKapa').click(function(){
              $.ajax({
                url: '/cmauth/notifications/modal',
                type:'POST',
                data: {'_token' : $('meta[name="_token"]').attr('content')},
                success: function(data){
                }
              });
          });
        });
      </script>

      @yield('scripts-last')
  </body>
</html>
