 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="{{ route('admin.index') }}" class="d-block">{{ Auth('admin')->user()->name }}</a>

    </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class=""> --}}
                {{-- <li class="{{ (request()->segment(2) == 'Student') ? 'nav-item active' : '' }}"> --}}
                    <li class="nav-item ">

                    <a href="{{route('student.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student</p>
                </a>
              </li>
              {{-- <li class="nav-item"> --}}

                {{-- @if($request->is('admin/Instructor')) --}}

                <li class="nav-item active">
              <a href="{{route('instructor.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Instructor</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('course.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('feedback.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Feedback</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="{{route('statistic.index')}}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Statistics</p>
                  </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
@push('scripts')
<script>
    /** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function() {
    return this.href == url;
}).addClass('active');

// for treeview
$('ul.nav-treeview a').filter(function() {
    return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>
@endpush
