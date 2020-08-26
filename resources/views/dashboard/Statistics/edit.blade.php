
@extends('dashboard.layouts.master')

@section('content')
<div class="col-md-8">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Add feedback</h3>
            </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" action="{{ route('feedback.update',[$feedbacks->id]) }}" method="POST">
@method('PUT')
          @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="head">head</label>
                    <input type="text" name="head" value="{{isset($feedbacks)?$feedbacks->head : ''}}" class="form-control" id="head" placeholder="add head">
                    @if ($errors->has('head'))
                        <div class="alert alert-danger">

                                @foreach ($errors->get('head', ':message') as $error)
                                <i class="fas fa-times"></i>
                                    {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>

                <div class="form-group">
                    <label for="name">question</label>
                    <input type="text" name="question" class="form-control" value="{{isset($feedbacks)?$feedbacks->question : ''}}" id="question" placeholder="add question">
                    @if ($errors->has('question'))
                        <div class="alert alert-danger">

                                @foreach ($errors->get('question', ':message') as $error)
                                <i class="fas fa-times"></i>
                                    {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>

                <div class="form-group">
                    <label for="name">degree</label>
                    <input type="hidden" name="degree" class="form-control" id="degree" value="{{isset($feedbacks)?$feedbacks->degree : ''}}" placeholder="add degree">
                    @if ($errors->has('degree'))
                        <div class="alert alert-danger">

                                @foreach ($errors->get('degree', ':message') as $error)
                                <i class="fas fa-times"></i>
                                    {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>

                <div class="form-group">
                    <input type="checkbox" name="is_active" value="{{isset($feedbacks)?$feedbacks->is_active : ''}}"  data-toggle="toggle">
                    @if ($errors->has('is_active'))
                        <div class="alert alert-danger">

                                @foreach ($errors->get('is_active', ':message') as $error)
                                <i class="fas fa-times"></i>
                                    {{ $error }}
                                @endforeach
                        </div>
                    <br/>
                    @endif
                </div>


                <div class="form-group">
                <label for="feedback_model_id">feedback_model_id</label>
                        <input type="text" name="feedback_model_id" value="{{isset($feedbacks)?$feedbacks->feedback_model_id : ''}}" class="form-control" id="feedback_model_id" placeholder="add feedback_model_id">
                            @if ($errors->has('feedback_model_id'))
                                <div class="alert alert-danger">
                                    @foreach ($errors->get('feedback_model_id', ':message') as $error)
                                    <i class="fas fa-times"></i>
                                    {{ $error }}
                                    @endforeach
                                </div>
                            @endif
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

