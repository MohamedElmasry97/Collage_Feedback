@extends('dashboard.layouts.master')
 @section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Student doesn't submit feedback</h3>
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
                                Email
                            </th>
                            <th>
                                Profile
                            </th>

                        </thead>
                        <tbody>

                            @foreach($students as $student)

                            <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td><a href="{{route('student.show',[ $student->id])}}"><button type="button" class="btn btn-success"><div class="icon">
                                <i class="fas fa-eye"></i>
                            </div></button></a></td>

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
