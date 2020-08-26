<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- IE compatibility meta -->
    <meta http-equiv="X-UA-Compatible" content="IE = edge"/>
    <!-- first mobile meta -->

    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Feedback') }}</title>

    <link rel="icon" href="{{ asset('mainUI/img/home/feedback.jpg') }}">
    <link rel="stylesheet" href="{{ asset('mainUI/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mainUI/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mainUI/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mainUI/css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('mainUI/css/default-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('mainUI/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mainUI/css/all.css') }}">
</head>
<body>

    <header>
        <!-- start navbar -->
        <nav class="navbar  navbar-inverse navbar-fixed-top">
        <div class="container">
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#our-agriculture" aria-expanded="false">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
        <a class="navbar-brand" href="/">O6U<span>Feedback</span></a>
       </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse" id="our-agriculture">
         <ul class="nav navbar-nav navbar-right">
           <li><a href="/" data-scroll="home">home <span class="sr-only">(current)</span></a></li>
            @if ( !auth('student')->user() && !auth('instructor')->user())
                <li class="list">
                    <a class="nav-link" href="{{route('student.form')}}">Student</a>
                </li>
                <li class="list">
                    <a class="nav-link" href="{{route('instructor.form')}}">Instructor</a>
                </li>

            @elseif(auth('student')->user() && !auth('instructor')->user())
                <!-- dropdown ser -->
                <li class="dropdown">
                    <a href="#" data-scroll="services" class="dropdown-toggle ser" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{  auth('student')->user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="{{route('student.logout')}}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{route('student.logout')}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>

            @elseif(auth('instructor')->user() && !auth('student')->user())
                <!-- dropdown ser -->
                <li class="dropdown">
                    <a href="#" data-scroll="services" class="dropdown-toggle ser" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{  auth('instructor')->user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="{{route('instructor.logout')}}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{route('instructor.logout')}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>
            @endif
         </ul>
       </div><!-- /.navbar-collapse -->
     </div><!-- /.container-fluid -->
   </nav>
        <!-- end navbar -->
    </header>


    @yield('content')




 <!-- start scroll top -->
 <div class="scroll-top">
    <i class="fa fa-arrow-up icon" aria-hidden="true"></i>
 </div>
<!-- end scroll-top-->
    <!-- section loader -->
    <section class="loading-overlay">
        <div class="spinner"></div>
    </section>
    <!-- ./section loader -->
<script src="{{ asset('/mainUI/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/mainUI/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/mainUI/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('/mainUI/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/asset/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/mainUI/js/script.js') }}"></script>
<script>
    $(document).ready(function(){
    $('nav .nav li').click(function() {
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
    });
});
</script>
@stack('scripts')

</body>
</html>
