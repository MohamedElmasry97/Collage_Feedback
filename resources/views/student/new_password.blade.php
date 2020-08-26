@extends('layouts.app')

@section('content')

        <section class="text-center new_password">
            <div class="container">
                <div class="row">
                    <div class="new">
                        <div class="section-header text-center">
                            <i class="fa fa-lock fa-3x"></i>
                            <h2 class="section-title">New Password</h2>
                            <div class="line">
                                <span></span>
                            </div>
                        </div><!-- ./section-header -->
                        @if ($errors->has('email')|| $errors->has('password') || $errors->has('pin_code'))

                            <div class="alert alert-danger">
                                @foreach ($errors->get('email', ':message','password',':message','pin_code',':message') as $error)
                                <i class="fa fa-times"></i>
                                    {{ $error }}
                                @endforeach
                            </div>
                        <br/>
                        @endif
                        <form action="{{route('student.update_password')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" placeholder="Your email...">
                                <input class="form-control" name="password" type="Password" placeholder="New Password">
                                <br>
                                <input class="form-control" name="pin_code" type="text" placeholder="pin code...">
                            </div>
                            <button class="form-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection
