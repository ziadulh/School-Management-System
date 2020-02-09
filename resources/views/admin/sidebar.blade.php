<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->

  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{   asset('dist/img/user2-160x160.jpg')   }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth()->user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Admission</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admission/create"><i class="fa fa-circle-o"></i>Admission Form</a></li>
          <li><a href="/admission"><i class="fa fa-circle-o"></i>List</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Teacher</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/teacher/create"><i class="fa fa-circle-o"></i>Information Form</a></li>
          <li><a href="/teacher"><i class="fa fa-circle-o"></i>Teachers List</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/management/create"><i class="fa fa-circle-o"></i>Information Form</a></li>
          <li><a href="/management"><i class="fa fa-circle-o"></i>Management List</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Student</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/student"><i class="fa fa-circle-o"></i>Student List</a></li>
          <li><a href="/management"><i class="fa fa-circle-o"></i>Management List</a></li>
        </ul>
      </li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
