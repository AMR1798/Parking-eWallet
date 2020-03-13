@extends('layouts.app')

@section('content')
<div class="container align-middle" style="height:70vh">
    <div class="row justify-content-center vertical-center my-auto position-relative" style="height:100%">
        <div class="col-md-8 text-center my-auto">
            <h1><i class="fas  fa-car"></i><b> Add Vehicle<b></h1>
            <h5><strong>Add vehicle to your account<strong></h5>
            <form action="/addvehicle" method="POST">
                @csrf
                <div class="input-group mb-3 ">
                    <input type="text" name="plate" class="form-control" placeholder="License Plate"
                        aria-label="Vehicle License Plate" aria-describedby="submit" style="border-radius: 50px 0 0 50px;min-height:50px;
                                height: auto;">
                    <div class="input-group-append">
                        <button class="btn btn-rounded btn-large blue-gradient m-0 px-3 py-2 z-depth-0 waves-effect"
                            type="submit" id="submit">Add Vehicle</button>
                    </div>

                </div>
            </form>
            <h5 style="color:#00358D">Note: make sure your enter your vehicle license plate correctly without space</h5>
        </div>
    </div>
    <hr>

</div>
@if (!empty($success))
<script>
    Swal.fire({
  title: 'Success!',
  text: '{{$success}}',
  icon: 'success',
  confirmButtonText: 'OK'
})
</script>
@elseif (!empty($error))
<script>
    Swal.fire({
  title: 'Error',
  text: '{{$error}}',
  icon: 'error',
  confirmButtonText: 'OK'
})
</script>
@endif
@endsection
