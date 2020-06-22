@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-cascade ">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header blue-gradient">

                    <!-- Title -->
                    <h2 class="card-header-title mb-3 text-center">Transaction History</h2>

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
                                
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>


                </div>

            </div>
            <!-- Card -->
        </div>
    </div>
</div>
@endsection
