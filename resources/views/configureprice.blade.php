@extends('layouts.dash')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-cascade ">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header blue-gradient">

                <!-- Title -->
                <h2 class="card-header-title mb-3 text-center">Configure Ticket Price</h2>

            </div>
            <!-- Card content -->
            <div class="card-body card-body-cascade text-center table-responsive text-nowrap">
                
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card h-100 text-white purple-gradient mb-3" style="max-width: 20rem;">
                            <div class="card-body text-left">
                                <h1><i class="fas fa-dollar-sign"></i></h1>
                                <h5 class="card-title">First Hour</h5>
                                <h3 class="card-title">RM {{$prices->firstHour}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card h-100 text-white blue-gradient mb-3" style="max-width: 20rem;">
                            <div class="card-body text-left">
                                <h1><i class="fas fa-forward"></i></h1>
                                <h5 class="card-title">Next Hours</h5>
                                <h3 class="card-title">RM {{$prices->nextHour}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card h-100 text-white sunny-morning-gradient mb-3" style="max-width: 20rem;">
                            <div class="card-body text-left">
                                <h1><i class="far fa-clock"></i></h1>
                                <h5 class="card-title">24 Hours</h5>
                                <h3 class="card-title">RM {{$prices->maxHour}}</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <form class="border border-light p-5" action="/setprice" method="POST">
                            @csrf
                            @method('PUT')
                            <p class="h4 mb-4">Set Prices</p>
                            <div class="container text-left" style="max-width:100%;width:40em;">
                                <label>First Hour</label>
                                <input type="number"  id="first" class="form-control mb-4" name="first" required>
                                </select>
                                
                                <label>Next Hours</label>
                                <input type="number"  id="next" class="form-control mb-4" name="next" required>
                            
                                <label>A Day (Max Price)</label>
                                <input type="number"  class="form-control mb-4" name="max" required>
                                <p><em>Recommended Max Price value: <p id="maxtext"></p></em></p>
                                <button class="btn btn-info btn-block" type="submit">Save</button>                                
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Card -->
    </div>
</div>
<br>
<hr>
<script>
    $(document).ready(function() {

    $('#first').keyup(function() {
      calculatemax();
    });

    $('#next').keyup(function() {
      calculatemax();
    });

    function calculatemax() {
      var first = $("#first").val();
      var next = $("#next").val();
      var max;
      var max = parseFloat(first) + parseFloat((10*next));
      console.log(first);
      console.log(max);
      if(isNaN(max)){
          $("#maxtext").text("0.00");
      }else{
          $("#maxtext").text(max.toFixed(2));
          console.log(max);
      }
    }
  });
</script>
@if (Session::has('success'))

<script>
    Swal.fire({
  title: 'Success!',
  text: '{{Session::get('success')}}',
  icon: 'success',
  confirmButtonText: 'OK'
})
</script>
@endif


@endsection
