@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card card-cascade ">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header blue-gradient">
                
                <!-- Title -->
                <h2 class="card-header-title mb-3 text-center">{{$user->name}}'s Info</h2>
                
            </div>
           
            <!-- Card content -->
            <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile" role="tab" aria-controls="home-just"
                    aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="vehicle-tab-just" data-toggle="tab" href="#vehicle" role="tab" aria-controls="profile-just"
                    aria-selected="false">Vehicle List</a>
                </li>
              </ul>
              <div class="tab-content card pt-5" id="myTabContentJust">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab-just">
                    <div class="row inline align-middle">
                        <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <th scope="row"><b>Email</b></th>
                                <td>{{$user->email}}</td>
                              </tr>
                              <tr>
                                <th scope="row"><b>Balance</b></th>
                                <td>RM {{$user->balance}}</td>
                              </tr>
                              <tr>
                                <th scope="row"><b>Register Date</b></th>
                                <td>{{$user->created_at}}</td>
                              </tr>
                             
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="profile-tab-just">
                  <!-- Vehicle Lists -->
                  <div class="text-center">
                    @foreach ($user->plates as $plate)
                    <div class="card" style="margin-bottom: 5px">
                        <div class="card-body">
                            <h5><i class="fas fa-car-alt"></i> {{$plate->license_plate}}
                            </h5>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#modalConfirmDelete{{$plate->id}}">Delete</button>
                        </div>
                    </div>
                    <!--Modal: modalConfirmDelete-->
                    <div class="modal fade" id="modalConfirmDelete{{$plate->id}}" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm modal-notify modal-danger"
                            role="document">
                            <!--Content-->
                            <div class="modal-content text-center">
                                <!--Header-->
                                <div class="modal-header d-flex justify-content-center">
                                    <p class="heading">Are you sure?</p>
                                </div>

                                <!--Body-->
                                <div class="modal-body">

                                    <i class="fas fa-times fa-4x animated rotateIn"></i>
                                    <p><strong>This will remove {{$plate->license_plate}}
                                            from {{$user->name}}'s  account.</strong></p>

                                    

                                </div>

                                <!--Footer-->
                                <div class="modal-footer flex-center">
                                    <a href="/admin-remove-plate/{{$plate->id}}"
                                        class="btn  btn-outline-danger">Yes</a>
                                    <a type="button" class="btn  btn-danger waves-effect"
                                        data-dismiss="modal">No</a>
                                </div>
                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                    <!--Modal: modalConfirmDelete-->
                    @endforeach

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
