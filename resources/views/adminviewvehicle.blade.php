@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card card-cascade ">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header blue-gradient">
                
                <!-- Title -->
                <h2 class="card-header-title mb-3 text-center">{{$vehicle->license_plate}} Info</h2>
                
            </div>
           
            <!-- Card content -->
            <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#info" role="tab" aria-controls="profile-just"
                    aria-selected="true">Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="vehicle-tab-just" data-toggle="tab" href="#history" role="tab" aria-controls="vehicle-just"
                    aria-selected="false">Parking History</a>
                </li>
              </ul>
              <div class="tab-content card pt-5" id="myTabContentJust">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-just">
                    <div class="row inline align-middle">
                        <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <th scope="row"><b>License Plate</b></th>
                                <td>{{$vehicle->license_plate}}</td>
                              </tr>
                              <tr>
                                <th scope="row"><b>Current User</b></th>
                                <td>{{$vehicle->user->name ?? ''}}</td>
                              </tr>
                              <tr>
                                <th scope="row"><b>Created At</b></th>
                                <td>{{$vehicle->created_at}}</td>
                              </tr>
                              <tr>
                                <th scope="row"><b>Update At</b></th>
                                <td>RM {{$vehicle->updated_at}}</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-just">
                    <div class="row inline align-middle">
                        <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">License Plate</th>
                                <th scope="col">Entry Time</th>
                                <th scope="col">Exit Time</th>
                                <th scope="col">Location</th>
                                <th scope="col">Total Fee</th>
                                <th scope="col">User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($logs != NULL)
                            @php 
                            $i = 1;
                            $j = 0;
                            @endphp
                            @foreach ($logs as $log)
                            
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$log->plate->license_plate}}</td>
                                <td>{{$log->entry}}</td>
                                <td>{{$log->exittime}}</td>
                                <td>{{$log->gate}}</td>
                                <td>
                                    RM {{$log->fee}}
                                
                                </td>
                                <td>{{$log->user->name}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$logs->links()}}
                    </div>
                </div>
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
