
@extends('dashboard.layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Instructor</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h4>Add Instructor</h4>

          <p>Add manually</p>
        </div>
        <div class="icon">
            <i class="fas fa-user-plus"></i>
        </div>
    <a href="{{route('instructor.create')}}" class="small-box-footer">Add Instructor<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h4>Instructor Info </h4>

          <p>Edit Delete </p>
        </div>
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
    <a href="{{route('all.instructor')}}" class="small-box-footer">Show Instructor<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h4>Add by file</h4>

          <p>Upload Excel Sheet</p>
        </div>
        <div class="icon">
            <i class="fas fa-upload"></i>
        </div>
    <a href="{{route('instructor.excel')}}" class="small-box-footer">Upload excel sheet <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
    </div>
    <!-- ./col -->
  </div>
@endsection
