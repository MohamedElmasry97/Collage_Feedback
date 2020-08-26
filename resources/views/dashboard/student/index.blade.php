
@extends('dashboard.layouts.master')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Student</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h4>Add Student</h4>

          <p>Add Student</p>
        </div>
        <div class="icon">
            <i class="fas fa-user-plus"></i>
        </div>
    <a href="{{route('student.create')}}" class="small-box-footer">Add<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
        <h5>Total Students ={{$count}}</h5>

          <p>Show Student</p>
        </div>
        <div class="icon">
            <i class="fa fa-clipboard-check"></i>
        </div>
    <a href="{{route('all.student')}}" class="small-box-footer">Show All Student<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h4>upload excel</h4>

          <p>add student by file</p>
        </div>
        <div class="icon">
            <i class="fas fa-upload"></i>
        </div>
    <a href="{{route('student.excel')}}" class="small-box-footer">Upload Excel Sheet <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
    </div>
    <!-- ./col -->
  </div>
@endsection
