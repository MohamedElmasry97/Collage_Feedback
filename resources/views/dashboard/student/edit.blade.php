
@extends('dashboard.layouts.master')

@section('content')

<div class="col-md-8">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Student Information</h3>
            </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" action="{{ route('student.update',[$students->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" value="{{isset($students)?$students->name : ''}}" class="form-control" id="name" placeholder="Enter Name">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">

                                @foreach ($errors->get('name', ':message') as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" value="{{isset($students)?$students->email : ''}}" class="form-control" id="email" placeholder="Enter email">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                                @foreach ($errors->get('email', ':message') as $error)
                                   {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Student Phone</label>
                    <input type="number" name="phone" value="{{isset($students)?$students->phone : ''}}" class="form-control" id="phone" placeholder="Student Phone">
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger">
                            @foreach ($errors->get('phone', ':message') as $error)
                                {{$error}}
                            @endforeach
                        </div><br/>
                    @endif
                </div>
                <div class="form-group">
                    @if ($errors->has('department_name'))
                        <div class="alert alert-danger">
                            @foreach ($errors->get('department_name', ':message') as $error)
                                {{$error}}
                            @endforeach
                        </div><br/>
                    @endif

                        <div class="form-group">
                            <input type="radio"  value="General"  {{ ($students->department_name=="General") ? "checked" : '' }}  name="department_name">
                            <label for="General">General</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" value="IS" {{ ($students->department_name=="IS") ? "checked" : '' }} name="department_name">
                            <label for="IS">IS</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" value="CS"  {{ ($students->department_name=="CS") ? "checked" : '' }}  name="department_name">
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

