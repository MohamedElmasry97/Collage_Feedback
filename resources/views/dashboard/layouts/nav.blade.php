 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('admin.index')}}" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-sign-out-alt"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
