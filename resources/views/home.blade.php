@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            

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
                            <img src="img/user.png" class="rounded-circle" alt="User Avatar">
                        </div>

                        <!-- Content -->
                        <div class="card-body">
                            <!-- Name -->
                            <h4 class="card-title">{{$data->name}}</h4>
                            <p> <a href="/profile" style="color:black"><button type="button" class="btn btn-flat btn-sm winter-neva-gradient"><u>Update Account</u></button></a> </p>
                            <hr>

                            <h3><i style="color:#85bb65" class="fas fa-dollar-sign"></i> Balance:
                                RM{{$data->balance}}</h3>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="/transaction" style="color:black">
                                            <button type="button"
                                                class="btn winter-neva-gradient btn-rounded btn-sm"><strong>Parking History</strong></button>
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
                                                class="btn winter-neva-gradient btn-rounded btn-sm"><strong>Payment History</strong></button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Card -->
                    <br>
                    
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
