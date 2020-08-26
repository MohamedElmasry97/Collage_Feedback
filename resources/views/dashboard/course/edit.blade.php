
@extends('dashboard.layouts.master')

@section('content')

<div class="col-md-8">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Add Course</h3>
            </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" action="{{ route('course.update',[$courses->id]) }}" method="POST">
          @csrf
          @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Course Name</label>
                <input type="text" name="name" value="{{isset($courses)?$courses->name : ''}}" class="form-control" id="name" placeholder="Enter Name">
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
                    <label for="text">Course symbolic</label>
                    <input type="text" name="symbolic" value="{{isset($courses)?$courses->symbolic : ''}}" class="form-control" id="symbolic" placeholder="Enter symbolic">
                    @if ($errors->has('symbolic'))
                        <div class="alert alert-danger">
                                @foreach ($errors->get('symbolic', ':message') as $error)
                                <i class="fas fa-times"></i>
                                   {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>

<div class="form-group">
  <label for="department_id">Department Name</label>
  <select class="form-control" name="department_id" id="department_id">
    {{-- <option  value=""></option> --}}
  @foreach ($departs as $depart)
  <option value="{{$depart->id}}" {{ ($courses->Department->id == $depart->id)? 'selected':'' }} >{{$depart->department_name}}</option>

  @endforeach

  </select>
</div>

<div class="form-group">
    <label for="instructor_id">instructor</label>
    <select class="form-control" name="instructor_id" id="instructor_id">
        @foreach ($instructors as $instructor)
        <option value="{{ $instructor->id }}"   {{ ($courses->instructors[0]->id == $instructor->id)? 'selected':'' }}>{{$instructor->name}}</option>

        @endforeach


        </select>
</div>

<div class="form-group">
  <label for="type">Course Type</label>
  <select class="form-control" name="type" >
    <option value="practical" {{ ($courses->type == "practical")? 'selected':'' }}>Course practical</option>
    <option value="theoretical" {{ ($courses->type == "theoretical")? 'selected':'' }}>Course theoretical</option>
    <option value="hybrid" {{ ($courses->type == "hybrid")? 'selected':'' }}>Course hybrid</option>
  </select>
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

