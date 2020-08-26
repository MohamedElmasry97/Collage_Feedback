@extends('dashboard.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Course Control</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h4>Add Course</h4>
          <p>Add Course</p>
        </div>
        <div class="icon">
            <i class="far fa-plus-square"></i>
        </div>
    <a href="{{route('course.create')}}" class="small-box-footer">Add<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
            <h4>Total Courses ={{$count}}</h4>
          <p>Show Courses</p>
        </div>
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
    <a href="{{route('all.course')}}" class="small-box-footer">Show All Course<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h4>upload</h4>

          <p>Add course file</p>
        </div>
        <div class="icon">
            <i class="fas fa-upload"></i>
        </div>
    <a href="{{route('course.excel')}}" class="small-box-footer">Upload Excel Sheet <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->

    </div>
    <!-- ./col -->
  </div>
@endsection
