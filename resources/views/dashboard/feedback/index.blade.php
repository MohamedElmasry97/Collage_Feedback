@extends('dashboard.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">feedback Control</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h4>Add feedback</h4>
          <p>Add feedback</p>
        </div>
        <div class="icon">
            <i class="far fa-plus-square"></i>
        </div>
    <a href="{{ route('feedback.create') }}" class="small-box-footer">Add<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
            <h5>Show Feedback</h5>
          <p>questions bank</p>
        </div>
        <div class="icon">
            <i class="far fa-question-circle"></i>
        </div>
    <a href="{{ route('feedback.all') }}" class="small-box-footer">Show All Feedbacks<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h4>upload file</h4>

          <p>Add into question bank</p>
        </div>
        <div class="icon">
            <i class="fas fa-upload"></i>
        </div>
    <a href="{{ route('feedback.excel') }}" class="small-box-footer">Upload Excel Sheet <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->

    </div>
    <!-- ./col -->
  </div>
@endsection
