
@include('dashboard.layouts.header')
@include('dashboard.layouts.nav')
@include('dashboard.layouts.sidebar')
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
          @if (Session::has('addCourse'))
          <div class="alert alert-default-primary">
{{ Session::get('addCourse') }}
          </div>
          @endif
            @yield('content')
      </div>
    </section>
  </div>
  @include('dashboard.layouts.footer')
