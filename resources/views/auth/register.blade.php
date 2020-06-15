@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Material form register -->
            <div class="card formcolor">

                <h5 class="card-header white-text text-center py-4">
                    <strong>{{ __('Register') }}</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0 fo">

                    <!-- Form -->
                    <form class="text-center formcolor" method="POST" action="{{ route('register') }}">
                        @csrf
                        <br>
                        <!-- Name -->
                        <div class="md-form mt-0">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="color: white">
                            <label for="name" style="color:white">Full Name</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- E-mail -->
                        <div class="md-form mt-0">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" style="color: white">
                            <label for="email" style="color:white">{{ __('E-Mail Address') }}</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="md-form mt-0">
                            <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}" required style="color: white">
                            <label for="phone" style="color:white">{{ __('Phone Number') }}</label>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- NRIC -->
                        <div class="md-form mt-0">
                            <input type="text" id="nric" class="form-control @error('nric') is-invalid @enderror"
                                name="nric" value="{{ old('nric') }}" required style="color: white" maxlength="12">
                            <label for="nric" style="color:white">{{ __('IC Number') }}</label>

                            @error('nric')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" aria-describedby="materialRegisterFormPasswordHelpBlock" style="color: white">
                            <label for="password" style="color:white">{{ __('Password') }}</label>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small id="materialRegisterFormPasswordHelpBlock" class="form-text  mb-4">
                                At least 8 characters
                            </small>
                        </div>

                        <!-- Confirm Password -->
                        <div class="md-form">
                            <input type="password" id="password-confirm" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                aria-describedby="materialRegisterFormPasswordHelpBlock" style="color: white">
                            <label for="password-confirm" style="color:white">{{ __('Confirm Password') }}</label>

                        </div>


                        <!-- Sign up button -->
                        <button class="btn btn-light  btn-block my-4 waves-effect z-depth-0"
                            type="submit">{{ __('Register') }}</button>

                        <!-- Social register -->


                        <hr>

                        <!-- Terms of service -->
                        <p>By clicking
                            <em>Register</em> you agree to our
                            <a href="" target="_blank" style="color:black"><u>terms of service</u></a>

                    </form>
                    <!-- Form -->

                    <hr>

                    <!-- Register -->
                    <div class="text-center">
                        <p>Already have an account?
                            <a href="/login">
                                <button type="button" class="btn btn-light btn-rounded blue-gradient">Login</button>
                            </a>
                        </p>
                    </div>

                </div>

            </div>
            <!-- Material form register -->
        </div>
    </div>
</div>
@endsection
