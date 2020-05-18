<?php

namespace App\Http\Controllers;

use App\paymentlog;
use Illuminate\Http\Request;
use Auth;
class PaymentlogController extends Controller
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
     * @param  \App\paymentlog  $paymentlog
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $match = ['user_id' => Auth::user()->id];
        $logs = paymentlog::where($match)->get();
        return view('paymentlog', compact('logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\paymentlog  $paymentlog
     * @return \Illuminate\Http\Response
     */
    public function edit(paymentlog $paymentlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paymentlog  $paymentlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paymentlog $paymentlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paymentlog  $paymentlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(paymentlog $paymentlog)
    {
        //
    }
}
