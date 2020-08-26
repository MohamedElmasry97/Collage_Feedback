@extends('dashboard.layouts.master')
 @section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Instructor Controller</h3>
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
                            {{-- <th>
                                Courses
                            </th> --}}
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

                            @foreach($inst as $insts)
                            {{-- @foreach($insts->courses as $course) --}}

                            <tr>
                            <td>{{$insts->id}}</td>
                            <td>{{$insts->name}}</td>
                            <td>{{$insts->email}}</td>
                            {{-- <td>{{$course->name}}</td> --}}
                            <td><a href="{{route('instructor.show',[ $insts->id])}}"><button type="button" class="btn btn-success"><div class="icon">
                                <i class="fas fa-user-cog"></i>
                            </div></button></a></td>
                            <td><a href="{{route('instructor.edit',[$insts->id])}}"><button type="button" class="btn btn-success">
                                        <i class="fa fa-user-edit"></i>
                                    </button>
                                </a></td>
                            <form action="{{route('instructor.destroy',[$insts->id])}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            <td><a href="{{route('instructor.destroy',[$insts->id])}}"><button type="submit" class="btn btn-danger">
                                <i class="fa fa-user-times"></i>
                            </button></a></td>
                            </form>
                            </tr>
                            {{-- @endforeach --}}
                            @endforeach

                        </tbody>

                </table>
                </div>
                <!-- /.card-body -->
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{ $inst->count() }} </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                             {{ $inst->links() }}

                    </div>
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
