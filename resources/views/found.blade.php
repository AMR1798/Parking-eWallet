@extends('layouts.app')

@section('content')


<div class="container align-middle" style="height:70vh">
    <div class="row justify-content-center vertical-center my-auto position-relative" style="height:100%">
        <div class="col-md-8 text-center my-auto">
            <div class="container position-relative">
                <div class="row">
                    <div class="align-self-center text-center col-sm-4 "><img
                            style="max-height:45%;max-width:100%;margin-bottom:5px" src="/img/car2.svg">
                    </div>
                    <div class="align-self-center text-center col-sm-1"></div>
                    <div class="align-self-center text-center col-sm-7  rounded mb-0 ">
                        <h1 class="robotofont"><strong>{{$plateid->license_plate}}</strong></h1>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-body">
                                Entry Time: {{$entry}}
                            </div>
                        </div>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-body" >
                                Entry Gate:
                            </div>
                        </div>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-body">
                                Duration: {{$duration}}
                            </div>
                        </div>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-body">
                                Current Fee: RM {{$fee}}
                            </div>
                        </div>
                        <br>
                        <br>
                        <strong>Having a problem?</strong> <a href="/problem"><button
                                class="btn btn-rounded blue-gradient"> <strong>Click Here</strong> </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

</div>
@endsection
