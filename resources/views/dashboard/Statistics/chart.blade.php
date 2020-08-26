@extends('dashboard.layouts.master')
@section('content')
     <div class="container-fluid">

        <div class="col-md-12">
              <!-- BAR CHART -->
              <div class="card card-success">
                  <div class="card-header">
                <h3 class="card-title">Select</h3>
            </div>
              <div class="card-body">
                  <form method="get" action="{{route('chartLine')}}">
                <div class="row">
                    <div class="col-md-6">
                      <!-- select -->
                              <select name="year" class="form-control">
                                  @foreach ($list as $item)
                                  <option  value="{{$item}}">{{$item}}</option>
                                  @endforeach

                                </select>
                                <div class="col-md-6 card-footer">
                                <input type="submit" class="btn btn-primary"></button>
                            </div>
                        </div>

                        <div class="col-md-3">
                      <!-- checkbox -->
                      <div class="form-group">
                          <div class="custom-control custom-radio">
                          <input class="custom-control-input"  type="radio" name="course_year" id="customRadio1" value="1">
                          <label for="customRadio1" class="custom-control-label">first year</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input"  type="radio" name="course_year" id="customRadio2" value="2">
                            <label for="customRadio2" class="custom-control-label">second year</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input"  type="radio" name="course_year" id="customRadio3" value="3">
                            <label for="customRadio3" class="custom-control-label">third year</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio4" value="4" name="course_year">
                          <label for="customRadio4" class="custom-control-label">fourth year</label>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                        <!-- radio -->
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio5" name="course_term" value="1">
                                <label for="customRadio5" class="custom-control-label">first term</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio6" name="course_term" value="2" >
                          <label for="customRadio6" class="custom-control-label">second term</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio7" value="" name="course_term">
                          <label for="customRadio7" class="custom-control-label">both</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


        <div class="row">
            {{-- {{ dd($chart )}} --}}
          <!-- /.col (LEFT) -->
          <div class="col-md-12">
              <!-- BAR CHART -->
              <div class="card card-success">
                  <div class="card-header">
                <h3 class="card-title">All Course Statitics</h3>
            </div>
              <div class="card-body">
                  <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 200px; max-height: 250px; max-width: 90%;">
                    <strong>AI</strong>
                    </canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
                 <!-- /.col -->
                 <div class="col-md-12">
                     <div class="card card-primary ">
                         <!-- first card--->
                         <div class="card-header" style="background-color: #5f7c9a">
                            <h3 class="card-title">All Course Statitics</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
          <div class="col-md-3 col-sm-12 ">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">best course</span>
                <span class="info-box-number">{{$var->keys()->first()}}</span>
                <div class="progress">
                    <div class="progress-bar " style="width:{{($var->values()->first()/4)*100}}%"></div>
                  </div>
                <span class="progress-description">
                    {{($var->values()->first()/4)*100}}% rate approval
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-12 ">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="far fa-thumbs-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">worest course</span>
                <span class="info-box-number">{{$var->keys()->last()}}</span>
                <div class="progress">
                    <div class="progress-bar " style="width:{{($var->values()->last()/4)*100}}%"></div>
                  </div>
                <span class="progress-description">
                    {{($var->values()->last()/4)*100}}% rate approval
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            </div>
                        </div>
            <!-- ./first card--->



        </div>
          <!-- /.col -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      @endsection

<!-- jQuery -->


@push('scripts')


<script>
    $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    //  Get context with jQuery - using jQuery's .get() method.

     var barChartCanvas = $('#barChart').get(0).getContext('2d')

    var barChartData = {
      labels  :  {!! json_encode($chart) !!} ,
      datasets: [
        {
          label               : {!! $year !!},
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
        //   دي القيم اللي المفروض هغيرها و احط القيم بتاعت المواد
          data                :{!! json_encode($mean) !!}
        }
      ]
    }
    //-------------
    //- BAR CHART -
    //-------------


    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scaleShowVerticalLines  : true,
      datasetFill             : false,
      scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        min: 0,
                        max: 5
                    }
                  }]
               }
    }


    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
        options: barChartOptions
    });

  });

</script>


@endpush
