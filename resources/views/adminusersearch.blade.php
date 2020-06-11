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
                            <th scope="col">Vehicles</th>
                            <th scope="col">is Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($results != NULL)
                        @php 
                        $i = 1;
                        $j = 0;
                        @endphp
                        @foreach ($results as $s)
                        
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$s->searchable->name}}</td>
                            <td>{{$s->searchable->email}}</td>
                            <td>
                                @foreach ($s->searchable->plates as $plate)
                                    {{$plate->license_plate}}
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                @if ($s->searchable->isAdmin == 1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
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
<br>
<hr>




@endsection
