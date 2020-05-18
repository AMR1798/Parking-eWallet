<?php

namespace App\Http\Controllers;

use App\price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::find(1)->first();
        return view('configureprice', compact('prices'));
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
     * @param  \App\price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $first = $request->get('first');
        $next = $request->get('next');
        $max = $request->get('max');
        $prices = Price::find(1)->first();
        $prices->firstHour = $first;
        $prices->nextHour = $next;
        $prices->maxHour = $max;
        $prices->save();
        
        return redirect('pricing')->with('success', 'Pricing Updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(price $price)
    {
        //
    }
}
