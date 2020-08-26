
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
         <form role="form" action="{{ route('feedback.store') }}" method="POST">

          @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="name">question</label>
                    <input type="text" name="question" class="form-control" id="question" placeholder="add question">
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

                    <input type="hidden" name="degree" class="form-control" id="degree" value="1" placeholder="add degree">
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
                    <label for="name">active</label>
                    <input type="checkbox" name="is_active" value="1" data-toggle="toggle">
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
                <select class="form-control" name="feedback_model_id" id="feedback_model_id">
                    <option id="error" name="error" value=""></option>
                @foreach ($models as $model)
                <option value="{{ $model->id }}">{{$model->head}}</option>

                @endforeach


                </select>
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

