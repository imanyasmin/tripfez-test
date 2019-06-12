<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::get();
        $user = User::orderBy('id', 'ASC')->get();
        
        return view ('room.index', compact ('rooms','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view ('room.create', compact ('rooms'));   
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'user_id' => 'required',
            'adult'      => 'required|numeric',
            'children' => 'required|numeric',
            'infant' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('room/create')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } 

        $adult = $request->adult;
        $children = $request->children;
        $infant = $request->infant;

        $total = $adult + $children;
        $totalIncInf = $adult + $children + $infant;
        $totalCust = $adult + $children + $infant;

        $maxRoom = 3;
        $maxGuest = 9;

        if($total > $maxGuest) {
            Session::flash('error', 'Fail, Maximum guests is '. $maxGuest .' (excluding infants)!');
            return Redirect::to('room/create');
        } elseif($adult <= $infant) {

            Session::flash('error', 'Fail, Room must have more adult than infant!');
            return Redirect::to('room/create');

        } elseif($children > $adult) {
            Session::flash('error', 'Fail, Must at least under one adult supervision!');
            return Redirect::to('room/create');
        }else{
            $rooms = array();
            $roomNumber = 0;

          while($totalIncInf > 0){ 
            if(!isset($rooms[$roomNumber])){
                $rooms[$roomNumber] = 0;
            }
            if($rooms[$roomNumber] == 5){ // Full
                $roomNumber++; // Next room
                $rooms[$roomNumber] = 0;
            }
            if($roomNumber >= $maxRoom){ // No rooms
                Session::flash('error', 'Fail, Maximum room for a booking is 3!');
                return Redirect::to('room/create');
            }
           $rooms[$roomNumber]++; 
            $totalIncInf--; 
        }

        $countRooms = count($rooms);

        // store
        $room = new Room;
        $room->user_id = $request->user_id;
        $room->adult = $request->adult;
        $room->children = $request->children;
        $room->infant = $request->infant;
        $room->room = $countRooms;
        $room->save();

        if($countRooms == 1){
            Session::flash('status', 'Success, '.$totalCust.' customers with '.$countRooms. ' room!');
            return Redirect::to('room');
        } else {
            Session::flash('status', 'Success, '.$totalCust.' customers with '. $countRooms. ' rooms!');
            return Redirect::to('room');
        }
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
