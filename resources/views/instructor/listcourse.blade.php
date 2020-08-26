@extends('layouts.app')

@section('content')




      <section class="list-box sections text-center">
            <div class="container">
                 <div class="section-header">
                    <h2 class="section-title"> Course List</h2>
                    <div class="line">
                        <span></span>
                    </div>
                </div><!-- ./section-header -->

      <div class="box-body sections">
                    <div class="table-responsive rad">
                        <table id="list-course">
                         <thead>
                            <tr >
                                <th>#</th>
                                <th class="text-center">NAME</th>
                                <th class="text-center">Feedback</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$record->name}}</td>
                                    <td>
                                    <a href="{{route('instructor.report', [$record->id])}}" class="btn btn-success btn-xs">
                                            <i class="fa fa-align-justify"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                        </table>
                    <div>

      </div>
      <!-- /.box-body -->
      </div>
    </section>
    <!-- /.box -->
@endsection


