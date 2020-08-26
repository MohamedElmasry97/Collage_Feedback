@extends('layouts.app')

@section('content')

<div class="bor"></div>
    <!-- contact -->
     <section class="sections contact">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title">Login</h2>
                    <div class="line">
                        <span></span>
                    </div>

                </div><!-- ./section-header -->

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        @if ($errors->has('email')|| $errors->has('password'))

                            <div class="alert alert-danger">
                                @foreach ($errors->get('email', ':message','password',':message') as $error)
                                <i class="fa fa-times"></i>
                                    {{ $error }}
                                @endforeach
                            </div>
                        <br/>
                        @endif
                        <form method="POST" action="{{route('instructor.login')}}">
                            @csrf
                            <div class="form-group">
                                <input id="email" class="form-control inpu " type="email" placeholder="Email.." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control inpu" placeholder="Password.." name="password" required autocomplete="current-password">


                            </div>
                            <button class="form-btn">Login</button>
                        <a href="{{route('instructor.forget_password')}}" class="reset">reset your password</a>

                        </form>
                    </div>
                </div>

            </div>
        </section>
@endsection


