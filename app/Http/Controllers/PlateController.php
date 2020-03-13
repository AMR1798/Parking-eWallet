<?php

namespace App\Http\Controllers;

use App\Plate;
use Auth;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        //
    }

    public function addPlate(Request $request)
    {
        $plate = $request->input('plate');

        $match = ['license_plate' => $plate];
        $search = Plate::where($match)->get()->first();
        //check if plate exist in the system
        if (!$search == NULL ){
            //this is when plate is already in the system
            //check if plate is already binded to another account
            if($search->user_id != NULL){
            //this is when plate is already binded to an account
            return view('addvehicle')->with('error','Vehicle license plate is already registered to a user');
            }else{
                //this is when plate is not binded to an account yet
                $search->user_id = Auth::user()->id;
                $search->save();
                return view('addvehicle')->with('success','Vehicle license plate added into your account');
            }
        }else{
            //this is when license plate is not in the system (not entered the parking yet)
            $new = new Plate;
            $new->license_plate = strtoupper($plate);
            $new->user_id = Auth::user()->id;
            $new->save();
            return view('addvehicle')->with('success','Vehicle license plate added into your account');
        }
        return $search;
    }
}
