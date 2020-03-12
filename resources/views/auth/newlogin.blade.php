@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Material form login -->
            <div class="card formcolor">

                <h5 class="card-header  white-text text-center py-4">
                    <strong>{{ __('Login') }}</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="md-form">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label style="color:white" for="email">E-mail</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            <label style="color:white" for="password">Password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <!-- Sign in button -->
                        <button class="btn  btn-light  btn-block my-4 waves-effect z-depth-0"
                            type="submit">LOGIN</button>

                        <!-- Register -->
                        <p>Not a member?
                            <button type="button" class="btn btn-light btn-rounded blue-gradient">Register</button>
                        </p>



                    </form>
                    <!-- Form -->

                </div>

            </div>
            <!-- Material form login -->
        </div>
    </div>
</div>
@endsection
