@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-cascade ">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header blue-gradient">
                
                <!-- Title -->
                <div class="d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <h2 class="card-header-title mb-3 text-center">Payment Logs </h2>
                    </div>
                    <div class="p-2 bd-highlight"><button type="button" class="btn btn-primary align-right"
                            data-toggle="modal" data-target="#filterModal">
                            Filter
                        </button></div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id=filterModal tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                    <div class="modal-dialog modal-dialog-centered" role="document">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Filter Logs</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class="border border-light p-5" action="{{ route('payment.filter') }}" method="GET"
                                    role="search">

                                    <p class="h4 mb-4 text-center" style="color:black">Filter Payment Logs</p>


                                    <label for="select">Log Status</label>
                                    <select class="browser-default custom-select mb-4" id="select" name="bank">
                                        <option value="" disabled="" selected="">Choose your option</option>
                                        <option value="" selected>All</option>
                                        <option value="Maybank">Maybank</option>
                                        <option value="CIMB">CIMB</option>
                                    </select>
                                    
                                    <input type="text" class="form-control" placeholder="User" name="user">
                                    <br>
                                    <button class="btn btn-info btn-block" type="submit">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">


                            </div>
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
                            <th scope="col">Time</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Bank</th>
                            <th scope="col">User</th>
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
                            <td>{{$log->created_at}}</td>
                            <td>RM {{$log->fee}}</td>
                            <td>{{$log->bankname}}</td>
                            <td>{{$log->user->name}}</td>
                            
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
