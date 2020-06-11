<?php

namespace App\Http\Controllers;

use App\Plate;
use Auth;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;


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

    public function adminview()
    {
        $vehicles = Plate::orderBy('created_at', 'DESC')->with('user')->paginate(10);
        //return $vehicles;
        return view('adminvehicle', compact('vehicles'));
    }

    public function search(Request $request)
    {
        $results = (new Search())->registerModel(Plate::class, function(ModelSearchAspect $modelSearchAspect) {
            $modelSearchAspect->addSearchableAttribute('license_plate')
                ->with('user');
        })->search($request->input('q'));
        
        return view('adminvehiclesearch', compact('results'));
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

    //This function is to remove the plate from user's account
    //This will not remove the plate in the database
    public function remove($plateid)
    {
        $plate = Plate::find($plateid);
        //if for whatever reason the user try to use the delete license plate link with random number, this will stop it.
        if(!$plate==NULL){
            //check user_id is the same as the user_id binded to the plate
            //this is to make sure only the owner of the account can unbind the license plate from the account
            if ($plate->user_id == Auth::user()->id){
                //confirmed the plate is owned by the current user
                $plate->user_id = NULL;
                $plate->save();
                return redirect('home')->with('success','Vehicle license plate is removed from your account');
            }else{
                //plate is not owned by the user
                return redirect('home')->with('error', 'Unable to delete license plate. The license plate is not owned by this account');
            }
        }else{
            return redirect('home')->with('error', 'The vehicle license plate you are trying to remove is not in the system');
        }

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
