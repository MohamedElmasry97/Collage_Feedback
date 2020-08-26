@include('dashboard.layouts.header')
@include('dashboard.layouts.nav')
@include('dashboard.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class = "content-wrapper">
    <!-- Content Header (Page header) -->
    <section class = "content-header">

          <!-- /.col -->
          <div class = "col-md-12">
          <div class = "card">
          <div class = "card-header p-2">
          <ul  class = "nav nav-pills">
          <li  class = "nav-item"><a class = "nav-link active" href = "#activity" data-toggle = "tab">Courses</a></li>
          <li  class = "nav-item"><a class = "nav-link" href        = "#timeline" data-toggle = "tab">Add Course</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class = "card-body">
              <div class = "tab-content">
              <div class = "active tab-pane" id = "activity">
                        <!-- Post -->
                        <div class = "post">
                        <div class = "row">
                        <div class = "col-12">
                        <div class = "card">
                        <div class = "card-header">
                        <h3  class = "card-title">Student Courses</h3>
                                </div>
                                <!-- /.card-header -->
                                <div   class = "card-body">
                                <table id    = "example2" class = "table table-bordered table-hover">
                                    <thead>
                                        <th scope = "col">
                                       Course ID
                                        </th>
                                        <th scope = "col">
                                       Course Name
                                        </th>
                                        <th scope = "col">
                                       Course Code
                                        </th>
                                        <th scope = "col">
                                            Course Type
                                        </th>
                                        <th scope = "col">
                                            Department Name
                                        </th>
                                        <th scope = "col">
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

                                            <form action = "{{route('detachCourse',[$item->id])}}" method = "POST">
                                                {{ csrf_field() }}
                                                {{-- {{ method_field('DELETE') }} --}}
                                                <td><a href  = "{{route('detachCourse',[$item->id])}}"><button type = "submit" class = "btn btn-danger"><div class = "icon">
                                                <i     class = "fa fa-trash"></i>
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
                  <div class = "tab-pane" id = "timeline">
                    <!-- The timeline -->
                    <div class = "">

                        <table class = "table">
                            <thead>
                              <tr>
                                <th scope = "col">Course Name</th>
                                <th scope = "col">Course Code</th>
                                <th scope = "col">Type</th>
                                <th scope = "col">Department Name</th>
                                <th scope = "col">Add Course</th>
                              </tr>
                            </thead>
                            <tbody>
                                <form action = "{{route('addCourse',[$profiles->id])}}" aria-multiline = "true" method = "POST">
                                            {{ csrf_field() }}
                                    @foreach ($co as $course)
                                        <tr>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->symbolic }}</td>
                                            <td>{{ $course->type }}</td>
                                            <td>{{ $course->department->department_name }}</td>
                                            <td>
                                                <div class="icheck-success d-inline">
                                                    <input type = "checkbox" name = "course[]{{$course->id}}" value = "{{ $course->id}}" id="checkboxSuccess{{ $course->id}}">
                                                    <label for="checkboxSuccess{{ $course->id}}"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <td></td>
                                    <td></td>
                                            <td>
                                                <button type  = "submit" class = "btn btn-success btn-submit ">
                                                <div  class = "icon">
                                                <i class = "fas fa-plus-square "> Add courses</i>
                                                    </div>
                                                </button>
                                            </td>
                                </form>
                            </tbody>
                          </table>

                      </div>
                      <!-- /.card -->

                      <!-- SELECT2 EXAMPLE -->

                  </div>
                        <!-- ./wrapper -->

                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->
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
