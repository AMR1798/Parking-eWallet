@extends('layouts.welcome')

@section('content')
<div id="fullpage">
    <div class="section section-main">
        <div class="container position-relative">
            <div class="row">
                <div class="align-self-center text-center col-sm-4"><img style="max-height:45%;max-width:70%" src="/img/car.svg">
                </div>
                <div class="align-self-center text-center col-sm-1"></div>
                <div class="align-self-center text-center col-sm-7">
                    <h1>Search Your Car</h1>
                    <form action="/search" method="POST" role="search">
                        @csrf
                        <div class="input-group">
                        <input class="form-control" placeholder="Search . . ." name="plate" id="ed-srch-term" type="text">
                        <div class="input-group-btn">
                        <button type="submit" id="searchbtn">
                            <i class="fas fa-search"></i></button>
                        </div>
                        </div>
                        </form>
                      <br>
                      <strong>Having a problem?</strong>  <a href="/problem"><button class="btn btn-rounded btn-light"> <strong>Click Here</strong> </button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container position-relative">
            <div class="row">
                <div class="align-self-center text-center col-sm-6">
                    <h2> Parkey is a parking system that combines the use of license plate recognition and eWallet to eliminate the need of physical ticket and cash </h2>
                </div>
                <div class="align-self-center text-center col-sm-6">
                    How does it work? >
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
