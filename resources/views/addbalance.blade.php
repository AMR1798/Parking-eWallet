@extends('layouts.app')

@section('content')
<div class="container align-middle" style="height:70vh">
    <div class="row justify-content-center vertical-center my-auto position-relative" style="height:100%">
        <div class="col-md-8 text-center my-auto">
            <h1><i class="fas  fa-car"></i><b> Reload eWallet <b></h1>
            <h5><strong>Reload eWallet funds to your account<strong></h5>
            <form action="/addbalance" method="POST">
                @csrf
                <div class="input-group mb-3 ">
                    <input type="text" name="fund" class="form-control" placeholder="Enter your prefered amount"
                        aria-label="Fund Amount" aria-describedby="submit" style="border-radius: 50px 0 0 50px;min-height:50px;
                                height: auto;">
                    <div class="input-group-append">
                        <button class="btn btn-rounded btn-large blue-gradient m-0 px-3 py-2 z-depth-0 waves-effect"
                            type="submit" id="submit">Proceed</button>
                    </div>

                </div>
            </form>
            <h5 style="color:#00358D">Note: Funds added to your account will not be transferrable to other account</h5>
        </div>
    </div>
    <hr>

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
