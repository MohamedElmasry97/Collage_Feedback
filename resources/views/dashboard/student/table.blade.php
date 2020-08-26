@extends('dashboard.layouts.master')
 @section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Student Controll</h3>
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
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </thead>
                        <tbody>

                            @foreach($students as $student)

                            <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td><a href="{{route('student.show',[ $student->id])}}"><button type="button" class="btn btn-success"><div class="icon">
                                <i class="fas fa-user-cog"></i>
                            </div></button></a></td>
                            <td><a href="{{route('student.edit',[$student->id])}}"><button type="button" class="btn btn-success"><div class="icon">
                                <i class="fa fa-user-edit"></i>
                              </div></button></a></td>
                            <form action="{{route('student.destroy',[$student->id])}}" method="POST">
                           @csrf
                       @method('delete')
                            <td><a href="{{route('student.destroy',[$student->id])}}"><button type="submit" class="btn btn-danger"><div class="icon">
                                <i class="fa fa-user-times"></i>
                              </div></button></a></td>
                            </form>
                            </tr>
                            @endforeach

                        </tbody>

                </table>
                </div>
                <!-- /.card-body -->
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">  Showing 1 to {{ $students->count() }} </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            {{ $students->links() }}

                    </div>
                  </div>
                </div>
            </div>
            <!-- /.card -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
