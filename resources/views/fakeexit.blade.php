@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                Hello. This page is to simulate exit of vehicle from the parking. Not intended for actual use.

                <form action="/fakeexit" method="POST" class="border border-light p-5">
                    @csrf
                    <p class="h4 mb-4 text-center">Exit Simulator</p>
                
                
                    <label for="defaultSelect">Entry Log</label>
                    <select id="defaultSelect" class="browser-default custom-select mb-4" name="id">
                        <option value="" disabled="" selected>Choose option</option>
                        @foreach ($logs as $log)
                            <option value="{{$log->id}}">{{$log->plate_id}} , {{$log->entry}} , {{$log->plate->license_plate}}</option>
                        @endforeach
                        
                    </select>
                
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
