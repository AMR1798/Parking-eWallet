@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Card -->
                    <div class="card testimonial-card">

                        <!-- Background color -->
                        <div class="card-up blue lighten-1"></div>

                        <!-- Avatar -->
                        <div class="avatar mx-auto white">
                            <img src="img/batman.png" class="rounded-circle" alt="User Avatar">
                        </div>

                        <!-- Content -->
                        <div class="card-body">
                            <!-- Name -->
                            <h4 class="card-title">{{$data->name}}</h4>
                            <p> <button type="button" class="btn btn-flat btn-sm"><u>Edit Info</u></button> </p>
                            <hr>

                            <h3><i style="color:#85bb65" class="fas fa-dollar-sign"></i> Balance:
                                RM{{$data->balance}}</h3>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm">
                                        <button type="button" class="btn winter-neva-gradient btn-rounded btn-sm"><strong>View
                                                Transaction</strong></button>
                                    </div>
                                    <div class="col-sm">
                                        <button type="button" class="btn winter-neva-gradient btn-rounded btn-sm"><strong>Add Balance</strong></button>
                                    </div>
                                    <div class="col-sm">
                                        <a href="/addvehicle" style="color:black">
                                        <button type="button" class="btn winter-neva-gradient btn-rounded btn-sm"><strong>Add Vehicle</strong></button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Card -->
                    <br>
                    <!-- Vehicle Lists -->
                    <div class="text-center">
                        <h3> Vehicles </h3>
                        @foreach ($data->plates as $plate)
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-body">
                                <h5><i class="fas fa-car-alt"></i> {{$plate->license_plate}} </h5>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
