@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-4">
        <div class="card text-white purple-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-dollar-sign"></i></h1>
                <h5 class="card-title">Total Fee Today</h5>
                <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk
                    of the panel's content.</p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card text-white blue-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-expand-alt"></i></h1>
                <h5 class="card-title">Total Fee This Week</h5>
                <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk
                    of the panel's content.</p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card text-white sunny-morning-gradient mb-3" style="max-width: 20rem;">
            <div class="card-body text-left">
                <h1><i class="fas fa-street-view"></i></h1>
                <h5 class="card-title">Parking Visitor This Week</h5>
                <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk
                    of the panel's content.</p>
            </div>
        </div>
    </div>
</div>
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

                    label: "Total Parking Visitor",

                    data: [0, 65, 45, 65, 35, 65, 0],

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
