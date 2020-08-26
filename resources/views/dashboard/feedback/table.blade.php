
 @extends('dashboard.layouts.master')

 @section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">feedback Controll</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>

                            <th>
                            ID
                            </th>
                            <th>
                                model id
                            </th>
                            <th>
                               head
                            </th>
                            <th>
                            question
                            </th>
                            <th>
                            active
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </thead>
                        <tbody>

                            @foreach($feedbacks as $feedback)

                            <tr>
                            <td>{{$feedback->id}}</td>
                            <td>{{$feedback->feedback_model_id}}</td>
                            <td>{{$feedback->feedbackModel->head}}</td>
                            <td>{{$feedback->question}}</td>
                            <td>{{$feedback->is_active }}</td>
                            <td><a href="{{route('feedback.edit',[$feedback->id])}}"><button type="button" class="btn btn-success">Edit</button></a></td>
                            <form action="{{route('feedback.destroy',[$feedback->id])}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            <td><a href="{{route('feedback.destroy',[$feedback->id])}}"><button type="submit" class="btn btn-danger">Delete</button></a></td>
                            </form>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
