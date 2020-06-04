@extends('layouts.dash')

@section('content')

<div class="row my-auto">
    <div class="col-sm-6" align="center">
        <div class="card h-100 text-white purple-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-dollar-sign"></i></h1>
                <h5 class="card-title">Total Payment Today</h5>
            <h3 class="card-title">RM {{$todaycount}}</h3>
            </div>
        </div>
    </div>
    <div class="col-sm-6 center" align="center">
        <div class="card h-100 text-white blue-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-expand-alt"></i></h1>
                <h5 class="card-title">Total Payment This Month</h5>
                <h3 class="card-title">RM {{$months[$currentmonth]['countpayment']}} </h3>
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

                    label: "Total Payment Top Up",

                    data: [
                        {{$months['January']['countpayment']}},
                        {{$months['February']['countpayment']}},
                        {{$months['March']['countpayment']}},
                        {{$months['April']['countpayment']}},
                        {{$months['May']['countpayment']}},
                        {{$months['June']['countpayment']}},
                        {{$months['July']['countpayment']}},
                        {{$months['August']['countpayment']}},
                        {{$months['September']['countpayment']}},
                        {{$months['October']['countpayment']}},
                        {{$months['November']['countpayment']}},
                        {{$months['December']['countpayment']}}

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

</script>

@endsection

