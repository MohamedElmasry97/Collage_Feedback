
 @extends('dashboard.layouts.master')

 @section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Statistics Controll</h3>
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
                               Department
                            </th>
                            <th>
                                type
                            </th>
                            <th>
                                Rate
                            </th>
                            <th>
                                Course Statistics
                            </th>
                        </thead>
                        <tbody>
                            @foreach($records as $s)
                            <tr>
                            <td>{{$s->course->id}}</td>
                            <td>{{$s->course->name}}</td>
                            <td>{{ $s->course->Department->department_name }}</td>
                            <td>{{$s->course->type}}</td>
                            <td>{{ $s->mean }}</td>
                            <td>
                                <a href="{{route('statistic.show',[ $s->course->id])}}">
                                    <button type="button" class="btn btn-success">
                                        <div class="icon">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                    </button>
                                </a>
                                <a href="{{route('statistics.missFeedback',[ $s->course->id])}}">
                                    <button type="button" class="btn btn-danger">
                                        <div class="icon">
                                            <i class="fas fa-clipboard-list"></i>
                                        </div>
                                    </button>
                                </a>
                            </td>
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
