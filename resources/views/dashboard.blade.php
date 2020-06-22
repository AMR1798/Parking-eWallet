@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-sm-3">
        <div class="card h-100 text-white purple-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-dollar-sign"></i></h1>
                <h5 class="card-title">Total Fee Of The Day</h5>
                <h3 class="card-title">RM {{$todayfee}}</h3>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card h-100 text-white blue-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-expand-alt"></i></h1>
                <h5 class="card-title">Total Fee Of The Month</h5>
                <h3 class="card-title">RM {{$months[$currentmonth]['totalfee']}}</h3>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card h-100 text-white sunny-morning-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-street-view"></i></h1>
                <h5 class="card-title">Total Visitors Of The Day</h5>
                <h3 class="card-title">{{$todaycount}}</h3>
                
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card h-100 text-white sunny-morning-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-street-view"></i></h1>
                <h5 class="card-title">Total Visitors Of The Month</h5>
                <h3 class="card-title">{{$months[$currentmonth]['countvisitor']}}</h3>
                
            </div>
        </div>
    </div>
</div>
<br>
<hr>
<div class="row">
    <!-- Grid container -->
    <div class="container">

        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-12">
                <canvas id="lineChart"></canvas>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
    <!-- Grid container -->
</div>
<hr>
<div class="row">
    <!-- Grid container -->
    <div class="container">

        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-12">
                <canvas id="lineChart2"></canvas>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
    <!-- Grid container -->
</div>

<script>
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var gradientFill = ctxL.createLinearGradient(0, 0, 0, 290);
    gradientFill.addColorStop(0, "rgba(0, 153, 255, 1)");
    gradientFill.addColorStop(1, "rgba(0, 153, 255, 0.1)");
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
            datasets: [
                {
                    label: "Total Parking Visitor",
                    data: [
                        {{$months['January']['countvisitor']}},
                        {{$months['February']['countvisitor']}},
                        {{$months['March']['countvisitor']}},
                        {{$months['April']['countvisitor']}},
                        {{$months['May']['countvisitor']}},
                        {{$months['June']['countvisitor']}},
                        {{$months['July']['countvisitor']}},
                        {{$months['August']['countvisitor']}},
                        {{$months['September']['countvisitor']}},
                        {{$months['October']['countvisitor']}},
                        {{$months['November']['countvisitor']}},
                        {{$months['December']['countvisitor']}}
                    ],
                    backgroundColor: gradientFill,

                    borderColor: [
                        '#3366ff',
                    ],
                    borderWidth: 2,
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgba(173, 53, 186, 0.1)",
                }
            ]
        },
        options: {
            responsive: true
        }

    });
    var ctxL = document.getElementById("lineChart2").getContext('2d');
    var gradientFill = ctxL.createLinearGradient(0, 0, 0, 290);
    gradientFill.addColorStop(0, "rgba(238, 9, 121, 1)");
    gradientFill.addColorStop(1, "rgba(255, 106, 0, 0.1)");
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
            datasets: [
                {
                    label: "Total Fee (RM)",
                    data: [
                        {{$months['January']['totalfee']}},
                        {{$months['February']['totalfee']}},
                        {{$months['March']['totalfee']}},
                        {{$months['April']['totalfee']}},
                        {{$months['May']['totalfee']}},
                        {{$months['June']['totalfee']}},
                        {{$months['July']['totalfee']}},
                        {{$months['August']['totalfee']}},
                        {{$months['September']['totalfee']}},
                        {{$months['October']['totalfee']}},
                        {{$months['November']['totalfee']}},
                        {{$months['December']['totalfee']}}
                    ],
                    backgroundColor: gradientFill,
                    borderColor: [
                        '#ff6a00',
                    ],
                    borderWidth: 2,
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgba(173, 53, 186, 0.1)",
                }
            ]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection
