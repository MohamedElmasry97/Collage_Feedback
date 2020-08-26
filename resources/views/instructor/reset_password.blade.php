@extends('layouts.app')

@section('content')
        <section class="text-center reset_password">
            <div class="container">
                <div class="row">
                    <div class="forget">
                        <div class="section-header text-center">
                            <i class="fa fa-lock fa-3x"></i>
                            <h2 class="section-title">Reset Password</h2>
                            <div class="line">
                                <span></span>
                            </div>
                        </div><!-- ./section-header -->
                        @if ($errors->has('email')|| $errors->has('password'))

                            <div class="alert alert-danger">
                                @foreach ($errors->get('email', ':message','phone',':message') as $error)
                                <i class="fa fa-times"></i>
                                    {{ $error }}
                                @endforeach
                            </div>
                        <br/>
                        @endif

                    <form action="{{route('instructor.reset_password')}}" method="get">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Email..">
                            <br>
                            <input class="form-control" name="phone" type="number" placeholder="phone..">
                        </div>
                        <button class="form-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
