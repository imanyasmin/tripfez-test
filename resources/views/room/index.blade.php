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

                    <a href="{{route('room-create')}}">Book Room</a> <br/><br/>

                    @foreach($rooms as $room)

                    Date: {{ date('d-m-Y', strtotime($room->created_at))}}<br/>
                    Number of Room: {{ $room->room}}<br/>
                    Adult: {{ $room->adult }}<br/>
                    Children: {{ $room->children }}<br/>
                    Infant: {{ $room->infant }}<br/>
                    <hr>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
