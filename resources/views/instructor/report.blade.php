
@extends('layouts.app')
@section('content')

    <!-- Main content -->
    <div class="sections">
        <div class="container-fluid">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
            <div class="  panel panel-primary">
            <div class="panel-heading" style="font-size: 20px">Statistical Number</div>
            <div class=" panel-body">
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="font-size: 20px">Students enrolled</div>
                        <div class="panel-body">
                            <p style="font-size: 20px">total students = {{ $count }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="font-size: 20px">Students sent feedbacks</div>
                        <div class="panel-body">
                            <p style="font-size: 20px">sent feedbacks = {{ $fill_count }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading" style="font-size: 20px">Students didn't sent feedbacks</div>
                        <div class="panel-body">
                            <p style="font-size: 20px">students missed = {{ $count - $fill_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading" style="font-size: 20px; color: #193b63">graph for pionts was submitted</div>
                    <div class="panel-body">
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 250px; height: 200px"></canvas>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
        </div>
    </div>
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
          label               : 'best to worest',
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
