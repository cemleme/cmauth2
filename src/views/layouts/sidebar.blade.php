<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header"></li>

      <li>
        <a href="/">
          <i class="fa fa-home"></i>
        </a>
      </li>

      @can('CmauthAdmin')
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>CMAUTH</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="/cmauth/usersapp">User Groups</a></li>
            <li><a href="/cmauth/usersapp/groups">Group Permissions</a></li>
            <li><a href="/cmauth/users">Users List</a></li>
            <li><a href="/cmauth/users/create">New User</a></li>
            <li><a href="/cmauth/groups">Groups List</a></li>
            <li><a href="/cmauth/groups/create">New Group</a></li>
            <li><a href="/cmauth/permissions">Permissions List</a></li>
            <li><a href="/cmauth/permissions/create">New Permission</a></li>
          </ul>
        </li>
      @endcan


    </ul><!-- /.sidebar-menu -->

  </section>
  <!-- /.sidebar -->
</aside>
