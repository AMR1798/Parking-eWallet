@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container emp-profile">

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="profile-img text-center">
                                    <img style="max-width:10em" src="img/user.png" alt="" />

                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="profile-head text-center">
                                    <h3>
                                        {{Auth::user()->name}}
                                    </h3>
                                    <hr>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Vehicles</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="tab-content profile-tab">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="row inline align-middle">
                                            <div class="col-md-3 my-auto">
                                                <p class="m-0"><b>Email</b></p>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-sm my-auto">
                                                        <p class="m-0">{{Auth::user()->email}}</p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal" data-target="#updateEmail">
                                                            Update Email
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="updateEmail" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">

                                                            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">


                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Update Email
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="border border-light p-5"
                                                                            action="/emailupdate" method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <input type="email"
                                                                                id="defaultSaveFormFirstName"
                                                                                class="form-control"
                                                                                placeholder="{{Auth::user()->email}}"
                                                                                name="email">
                                                                            <br>
                                                                            <button class="btn btn-info btn-block"
                                                                                type="submit">Save Changes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row inline align-middle">
                                            <div class="col-md-3 my-auto">
                                                <p class="m-0"><b>Phone</b></p>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-sm my-auto">
                                                        <p class="m-0">{{Auth::user()->phone}}</p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal" data-target="#updatePhone">
                                                            Update Phone
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="updatePhone" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">

                                                            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">


                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Update Phone
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="border border-light p-5"
                                                                            action="/phoneupdate" method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <input type="string"
                                                                                id="defaultSaveFormFirstName"
                                                                                class="form-control"
                                                                                placeholder="{{Auth::user()->phone}}"
                                                                                name="phone" maxlength="11">
                                                                            <br>
                                                                            <button class="btn btn-info btn-block"
                                                                                type="submit">Save Changes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row inline align-middle">
                                            <div class="col-md-3 my-auto">
                                                <p class="m-0"><b>IC Number</b></p>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-sm ">
                                                        <p class="m-0">{{Auth::user()->nric}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row inline align-middle">
                                            <div class="col-md-3 my-auto">
                                                <p class="m-0"><b>Password</b></p>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal" data-target="#updatePassword">
                                                            Update Password
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="updatePassword" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">

                                                            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">


                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Update Password
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST"
                                                                            action="{{ route('change.password') }}">
                                                                            @csrf

                                                                            @foreach ($errors->all() as $error)
                                                                            <p class="text-danger">{{ $error }}</p>
                                                                            @endforeach

                                                                            <div class="form-group row">
                                                                                <label for="password"
                                                                                    class="col-md-4 col-form-label text-md-right">Current
                                                                                    Password</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="password" type="password"
                                                                                        class="form-control"
                                                                                        name="current_password"
                                                                                        autocomplete="current-password">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="password"
                                                                                    class="col-md-4 col-form-label text-md-right">New
                                                                                    Password</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="new_password"
                                                                                        type="password"
                                                                                        class="form-control"
                                                                                        name="new_password"
                                                                                        autocomplete="current-password">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="password"
                                                                                    class="col-md-4 col-form-label text-md-right">New
                                                                                    Confirm Password</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="new_confirm_password"
                                                                                        type="password"
                                                                                        class="form-control"
                                                                                        name="new_confirm_password"
                                                                                        autocomplete="current-password">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row mb-0">
                                                                                <div class="col-md-8 offset-md-4">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">
                                                                                        Update Password
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <!-- Vehicle Lists -->
                                        <div class="text-center">
                                            @foreach ($data->plates as $plate)
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
                                                                    from your
                                                                    account.</strong></p>

                                                            <p>The license plate will still need to be binded into
                                                                an account with
                                                                sufficient eWallet balance to exit parking</p>

                                                        </div>

                                                        <!--Footer-->
                                                        <div class="modal-footer flex-center">
                                                            <a href="/remove/{{$plate->id}}"
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
                        </div>

                    </div>

                </div>
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

@foreach ($errors->all() as $error)
<script>
    toastr.error('{{ $error }}');
</script>
@endforeach


@endsection
