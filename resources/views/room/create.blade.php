@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Booking</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('room-store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="adult" class="col-md-4 col-form-label text-md-right">{{ __('Adult') }}</label>

                            <div class="col-md-6">

                             <input type="number" id="adult" class="form-control @error('adult') is-invalid @enderror" name="adult" value="{{Auth::user()->name}}" required autocomplete="adult" autofocus onchange="myFunction()"> 
                         </input>

                         @error('adult')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="children" class="col-md-4 col-form-label text-md-right">{{ __('Children') }}</label>

                    <div class="col-md-6">

                     <input type="numeric" id="children" class="form-control @error('children') is-invalid @enderror" name="children" required autocomplete="children" autofocus onchange="myFunction()"> 
                 </input>

                 @error('children')
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="infant" class="col-md-4 col-form-label text-md-right">{{ __('Infant') }}</label>

            <div class="col-md-6">

             <input type="number" id="infant" class="form-control @error('infant') is-invalid @enderror" name="infant" value="{{Auth::user()->name}}" required autocomplete="infant" autofocus onchange="myFunction()"> 
         </input>

         @error('infant')
         <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



        <div class="form-group row">
            <label for="infant" class="col-md-4 col-form-label text-md-right">Total Excluding Infant</label>

            <div class="col-md-6">

             <p id="totalAdultChild"> </p>
         </input>

         
    </div>
</div>

    <div class="form-group row">
            <label for="infant" class="col-md-4 col-form-label text-md-right">Total All</label>

            <div class="col-md-6">

             <p id="totalAll"> </p>
         </input>

         
    </div>
</div>






<input type="hidden" id="user_id" class="form-control" name="user_id" value="{{Auth::user()->id}}" required> 
</input>






                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="submit" class="btn btn-primary">
                                    {{ __('Send') }}
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

<script type="text/javascript">
    function myFunction() {
      var adult = document.getElementById("adult").value;
      var finalAdult = parseInt(adult);
      var children = document.getElementById("children").value;
      var finalChildren = parseInt(children);
      var infant = document.getElementById("infant").value;
      var finalInfant = parseInt(infant);
      var totalAdultChild = finalAdult + finalChildren;
      var totalAll = finalAdult + finalChildren + finalInfant;
      // var room = totalAll/9

      document.getElementById("totalAdultChild").innerHTML = totalAdultChild
      document.getElementById("totalAll").innerHTML = totalAll
      document.getElementById("room").innerHTML = room

    

}
</script>
@endsection
