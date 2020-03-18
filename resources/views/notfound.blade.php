@extends('layouts.app')

@section('content')


<div class="container align-middle" style="height:70vh">
    <div class="row justify-content-center vertical-center my-auto position-relative" style="height:100%">
        <div class="col-md-8 text-center my-auto">
            <div class="container position-relative" >
                <div class="row">
                    <div class="align-self-center text-center col-sm-4 "><img style="max-height:45%;max-width:100%;margin-bottom:5px" src="/img/car2.svg">
                    </div>
                    <div class="align-self-center text-center col-sm-1"></div>
                    <div class="align-self-center text-center col-sm-7 border rounded mb-0 border-info">
                        <h1 class="robotofont"><strong>Uh Oh!</strong></h1>
                        <h3> License plate you are looking for are not found in our system. </h3>
                        <br>
                        <h3 style="color:#2F75E9" ><i class="robotofont"> Are you sure this vehicle is parked here? </i></h3>
                          <br>
                          <strong>Having a problem?</strong>  <a href="/problem"><button class="btn btn-rounded blue-gradient"> <strong>Click Here</strong> </button></a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <hr>

</div>
@endsection