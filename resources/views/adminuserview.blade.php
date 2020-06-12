@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="container">
            <form action="{{ route('user.search') }}" method="GET" role="search">
                
            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search User" aria-label="Search" name="q">
                <div class="input-group-append">
                  <button type="submit" class="input-group-text blue" id="basic-text1"><i class="fas fa-search text-white"
                      aria-hidden="true"></i></button>
                </div>
              </div>
            </form>
        </div>
        <div class="card card-cascade ">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header blue-gradient">
                
                <!-- Title -->
                <h2 class="card-header-title mb-3 text-center">Registered Users</h2>
                
            </div>
           
            <!-- Card content -->
            <div class="card-body card-body-cascade text-center table-responsive text-nowrap">

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">is Admin</th>
                            <th scope="col">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users != NULL)
                        @php 
                        $i = 1;
                        $j = 0;
                        @endphp
                        @foreach ($users as $user)
                        
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->isAdmin == 1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td>
                                
                                <a href="/admin-user-view/{{$user->id}}"><button type="button" class="btn btn-info btn-sm"><i class="fas fa-info"></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                {{$users->links()}}

            </div>

        </div>
        <!-- Card -->
    </div>
</div>
<br>
<hr>


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

@foreach ($errors->all() as $error)
<script>
    toastr.error('{{ $error }}');
</script>
@endforeach

@endsection
