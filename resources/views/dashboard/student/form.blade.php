
@extends('dashboard.layouts.master')

@section('content')

<div class="col-md-8">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Add Student</h3>
            </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" action="{{ route('student.store') }}" method="POST">
          @csrf
          @method('POST')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            @foreach ($errors->get('name', ':message') as $error)
                            <i class="fas fa-times"></i>
                                    {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            @foreach ($errors->get('email', ':message') as $error)
                            <i class="fas fa-times"></i>
                                   {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            @foreach ($errors->get('password', ':message') as $error)
                            <i class="fas fa-times"></i>
                                    {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Student Phone</label>
                    <input type="number" name="phone" class="form-control" id="phone" placeholder="Student Phone">
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger">
                            @foreach ($errors->get('phone', ':message') as $error)
                            <i class="fas fa-times"></i>
                                {{$error}}
                            @endforeach
                        </div><br/>
                    @endif
                </div>
                <div class="form-group">
                    @if ($errors->has('department_name'))

                          @foreach ($errors->get('department_name', ':message') as $error)
                          <i class="fas fa-times"></i>
                          {{$error}}
                        @endforeach
                      </div>
                    {{-- <div class="alert alert-danger">
                        @foreach ($errors->get('department_name', ':message') as $error)
                            {{$error}}
                        @endforeach
                    </div><br/> --}}
                @endif

                <div class="form-group">
                    <input type="radio" value="General"  name="department_name">
                    <label for="General">General</label>
                </div>
                <div class="form-group">
                    <input type="radio" value="IS"  name="department_name">
                    <label for="IS">IS</label>
                </div>
                <div class="form-group">
                    <input type="radio" value="CS"name="department_name">
                    <label for="CS">CS</label>
                </div>
            </div>
        </div>
            <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      </form>
    <!-- /.card -->
    <!-- Form Element sizes -->
</div>

@endsection
