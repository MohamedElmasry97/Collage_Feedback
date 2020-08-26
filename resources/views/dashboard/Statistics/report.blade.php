
@extends('dashboard.layouts.master')
@section('content')

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Course  Detail</h3>


        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> students enrolled </span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $count }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total feedbacks </span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $fill_count }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Student not feedback</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $count - $fill_count }} <span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <div class="post">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 200px; max-height: 250px; max-width: 90%;"></canvas>
                          </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
 @endsection



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
      labels  :  {!! json_encode($chart->values()) !!} ,
      datasets: [
        {
          label               : 'This Year',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
        //   دي القيم اللي المفروض هغيرها و احط القيم بتاعت المواد
          data                :{!! json_encode($mean->values()) !!}
        },
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
