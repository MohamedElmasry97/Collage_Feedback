
 @extends('dashboard.layouts.master')

 @section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Course Controll</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>

                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Course Code
                            </th>
                            <th>
                               Department
                            </th>
                            <th>
                                type
                            </th>
                            <th>
                                Instructor
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </thead>
                        <tbody>

                            @foreach($courses as $course)
                                @foreach($course->instructors as $instructor)
                            <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->symbolic}}</td>
                            <td>{{$course->Department->department_name}}</td>
                            <td>{{$course->type}}</td>
                            <td>{{$instructor->name}}</td>
                            <td>
                                <a href="{{route('course.edit',[$course->id])}}">
                                    <button type="button" class="btn btn-success"><i class="far fa-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <form action="{{route('course.destroy',[$course->id])}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            <td>
                                <a href="{{route('course.destroy',[$course->id])}}">
                                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                    </button>
                                </a>
                            </td>
                            </form>
                            </tr>
                                @endforeach
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
