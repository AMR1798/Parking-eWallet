@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-cascade ">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header blue-gradient">
                <div class="text-right">
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal"
                        data-target="#modalFilter">Filters</a>
                </div>
                <!-- Title -->
                <h2 class="card-header-title mb-3 text-center">Parking Logs</h2>
                
            </div>
            <div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Filter</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <input type="text" id="orangeForm-name" class="form-control validate" name="plate">
                                <label data-error="wrong" data-success="right" for="orangeForm-name">License Plate</label>
                            </div>
                            <hr>
                            <h3> Filter date </h3>
                            <div class="md-form mb-5">
                                <div class="md-form">
                                    <input type="text" id="date-picker-example" class="form-control datepicker" value="">
                                    <label for="date-picker-example">Date</label>
                                  </div> 
                            </div>

                            <div class="md-form mb-4">
                                <select class="browser-default custom-select mb-4" id="select" name="entry-exit">
                                    <option value="entry">Entry</option>
                                    <option value="exit">Exit</option>
                                </select>
                            </div>
                        <hr>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-deep-orange">Sign up</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card content -->
            <div class="card-body card-body-cascade text-center table-responsive text-nowrap">

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">License Plate</th>
                            <th scope="col">Entry Time</th>
                            <th scope="col">Exit Time</th>
                            <th scope="col">Location</th>
                            <th scope="col">Total Fee</th>
                            <th scope="col">Plate</th>
                            <th scope="col">Current Owner</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($logs != NULL)
                        @php
                        $i = 1;
                        $j = 0;
                        @endphp
                        @foreach ($logs as $log)

                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$log->plate->license_plate}}</td>
                            <td>{{$log->entry}}</td>
                            <td>{{$log->exittime}}</td>
                            <td>{{$log->gate}}</td>
                            <td> RM {{$log->fee}} </td>
                            <td>{{$log->plate->license_plate}}</td>
                            <td>{{$log->plate->user['name']}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                {{$logs->links()}}

            </div>

        </div>
        <!-- Card -->
    </div>
</div>
<br>
<hr>


<script>
    // Data Picker Initialization
$('.datepicker').pickadate();
</script>

@endsection
