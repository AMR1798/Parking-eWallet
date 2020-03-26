@extends('layouts.app')

@section('content')
<div class="container align-middle" style="height:70vh">
    <div class="row justify-content-center vertical-center my-auto position-relative" style="height:100%">
        <div class="col-md-8 text-center my-auto">
            <form class="border border-light p-5" action="/bank" method="POST">
                @csrf
                <p class="h4 mb-4 text-center">Contact us</p>
            
            
                <label for="bank">Bank</label>
                <select class="browser-default custom-select mb-4" id="bank" name="bank" required>
                    <option value="" disabled selected hidden>Select Bank</option>
                    <option value="maybank">Maybank</option>
                    <option value="cimb">CIMB</option>
                    <option value="bank rakyat">Bank Rakyat</option>
                </select>
            
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control mb-4" placeholder="Username" name="username">
            
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control mb-4" placeholder="Password" name="password">
                <input type="hidden" value="{{session()->get('fund')}}" name="fund">
            
                <button class="btn btn-info btn-block" type="submit">Send</button>
            </form>
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
}).then(function() {
    // Redirect the user
    window.location.href = "/home";
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
