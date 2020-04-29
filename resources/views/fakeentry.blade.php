@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                Hello. This page is to simulate entry of vehicle into the parking. Not intended for actual use.

                <form action="/fakeentry" method="POST" class="border border-light p-5">
                    @csrf
                    <p class="h4 mb-4 text-center">Entry Simulator</p>
                
                
                    <label for="defaultSelect">Enter License Plate</label>
                    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="License Plate" name="plate">
                
                    <button class="btn btn-info btn-block" type="submit">Send</button>
                </form>
                
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
