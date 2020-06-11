@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="container">
            <form action="{{ route('vehicle.search') }}" method="GET" role="search">
                
            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search Vehicle" aria-label="Search" name="q">
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
                <h2 class="card-header-title mb-3 text-center">Registered Vehicles</h2>
                
            </div>
           
            <!-- Card content -->
            <div class="card-body card-body-cascade text-center table-responsive text-nowrap">

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Plate</th>
                            <th scope="col">Created At</th>
                            <th scope="col">User</th>
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
                            <td>{{$s->searchable->license_plate}}</td>
                            <td>{{$s->searchable->created_at}}</td>
                            <td>{{$s->searchable->user->name ?? ''}}</td>
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
