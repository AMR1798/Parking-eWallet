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
                                        <a href="/transaction" style="color:black">
                                            <button type="button"
                                                class="btn winter-neva-gradient btn-rounded btn-sm"><strong>View
                                                    Transaction</strong></button>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="/addbalance" style="color:black">
                                            <button type="button"
                                                class="btn winter-neva-gradient btn-rounded btn-sm"><strong>Add
                                                    Balance</strong></button>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="/addvehicle" style="color:black">
                                            <button type="button"
                                                class="btn winter-neva-gradient btn-rounded btn-sm"><strong>Add
                                                    Vehicle</strong></button>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="/paymentlogs" style="color:black">
                                            <button type="button"
                                                class="btn winter-neva-gradient btn-rounded btn-sm"><strong>View Payment</strong></button>
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
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modalConfirmDelete{{$plate->id}}">Delete</button>
                            </div>
                        </div>
                        <!--Modal: modalConfirmDelete-->
                        <div class="modal fade" id="modalConfirmDelete{{$plate->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm modal-notify modal-danger"
                                role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <p class="heading">Are you sure?</p>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <i class="fas fa-times fa-4x animated rotateIn"></i>
                                        <p><strong>This will remove {{$plate->license_plate}} from your
                                                account.</strong></p>

                                        <p>The license plate will still need to be binded into an account with
                                            sufficient eWallet balance to exit parking</p>

                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <a href="/remove/{{$plate->id}}" class="btn  btn-outline-danger">Yes</a>
                                        <a type="button" class="btn  btn-danger waves-effect"
                                            data-dismiss="modal">No</a>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!--Modal: modalConfirmDelete-->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session()->get('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: '{{session()->get('success')}}',
        icon: 'success',
        confirmButtonText: 'OK'
    })

</script>
@elseif (session()->get('error'))
<script>
    Swal.fire({
        title: 'Error',
        text: '{{session()->get('error')}}',
        icon: 'error',
        confirmButtonText: 'OK'
    })

</script>
@endif
@endsection
