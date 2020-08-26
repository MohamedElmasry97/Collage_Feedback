@include('dashboard.layouts.header')
@include('dashboard.layouts.nav')
@include('dashboard.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Courses</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Add Course</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                      <div class="row">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Instructor Courses</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <th scope="col">
                                       Course ID
                                        </th>
                                        <th scope="col">
                                       Course Name
                                        </th>
                                        <th scope="col">
                                       Course Symbolic
                                        </th>
                                        <th scope="col">
                                            Course Type
                                        </th>
                                        <th scope="col">
                                            Department Name
                                        </th>
                                        <th scope="col">
                                           Delete Course
                                        </th>
                                    </thead>
                                    <tbody>

 @foreach ($courses as $item)

 <tr>

     <td>{{$item->id}}</td>
     <td>{{$item->name}}</td>
     <td>{{$item->symbolic}}</td>
     <td>{{$item->type}}</td>
     <td>{{$item->Department->department_name}}</td>

     <form action="{{route('instructor.detachCourse',[$item->id])}}" method="POST">
        {{ csrf_field() }}
        <td><a href="{{route('instructor.detachCourse',[$item->id])}}"><button type="submit" class="btn btn-danger"><div class="icon">
            <i class="fa fa-trash"></i>
        </div></button></a></td>
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

                    </div>
                    <!-- /.post -->
                  </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="">

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Course Name</th>
                                <th scope="col">Symbolic</th>
                                <th scope="col">Type</th>
                                <th scope="col">Department Name</th>
                                <th scope="col">Add Course</th>
                              </tr>
                            </thead>
                            <tbody>



                                @foreach ($co as $course)

                                <tr>

                                    <td>{{ $course->name }}</td>
                                  <td>{{ $course->symbolic }}</td>
                                  <td>{{ $course->type }}</td>
                                  <td>{{ $course->Department->department_name }}</td>

                                  <form action="{{route('instructor.addCourse',[$profiles->id,$course->id  ])}}" method="POST">
                                    {{ csrf_field() }}

                            <td><button type="submit" class="btn btn-success"><div class="icon">
                                <i class="fas fa-plus-square"></i>
                              </div></button></td>
                            </form>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div>
                      <!-- /.card -->
                      <!-- SELECT2 EXAMPLE -->
                  </div>
                        <!-- ./wrapper -->
                  {{-- </div> --}}
                </div>
            </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('dashboard.layouts.footer')
