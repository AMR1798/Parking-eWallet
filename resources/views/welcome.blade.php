@extends('layouts.welcome')

@section('content')
<div id="fullpage">
    <div class="section section-main">
        <div class="container position-relative">
            <div class="row">
                <div class="align-self-center text-center col-sm-4"><img class="animated zoomInDown" style="max-height:45%;max-width:70%" src="/img/car.svg">
                </div>
                <div class="align-self-center text-center col-sm-1"></div>
                <div class="align-self-center text-center col-sm-7">
                    <h1 style="color:white"><strong>Search Your Car</strong></h1>
                    <form action="/search" method="POST" role="search">
                        @csrf
                        <div class="input-group mb-3 ">
                            <input type="text" name="plate" class="form-control" placeholder="Vehicle License Plate"
                                aria-label="Vehicle License Plate" aria-describedby="submit" style="border-radius: 50px 0 0 50px;min-height:50px;
                                height: auto;">
                            <div class="input-group-append">
                                <button
                                    class="btn btn-rounded btn-large blue-gradient m-0 px-3 py-2 z-depth-0 waves-effect"
                                    type="submit" id="submit">Search</button>
                            </div>
                        </div>
                        </form>
                      <br>
                      <strong style="color:white">Having a problem?</strong>  <a href="/problem"><button class="btn btn-rounded btn-light"> <strong>Click Here</strong> </button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="slide">
            <div class="container position-relative">
                <div class="row">
                    <div class="align-self-center text-center col-sm-12">
                        <div class="container">
                        <p style="font-size:1.3em"> Parkey is an innovative application that recognizes license plate upon vehicle entry and exit of your facility in seconds. As a fully integrated license plate recognition application and parking system, it provides faster and easier way for user to access parking information and  make payment. </p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="align-self-center text-center col-sm-12">
                        How does it work? >
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="container position-relative">
                <div class="row">
                    <div class="align-self-center text-center col-sm-12">
                        <h3> License plate recognition camera module will scan your vehicle license plate </h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="align-self-center text-center col-sm-12">
                        <img style="width:50%;height:auto" src="/img/parkey1.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="container position-relative">
                <div class="row">
                    <div class="align-self-center text-center col-sm-12">
                        <h3> It will send the recognized license plate to the database </h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="align-self-center text-center col-sm-12">
                        <img style="width:50%;height:auto" src="/img/parkey2.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="container position-relative">
                <div class="row">
                    <div class="align-self-center text-center col-sm-12">
                        <h3> You are able to check your parking information through parkey website </h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="align-self-center text-center col-sm-12">
                        <img style="width:50%;height:auto" src="/img/parkey3.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        new fullpage('#fullpage', {
            //options here
            autoScrolling: true,

        });

    </script>
    @endsection
