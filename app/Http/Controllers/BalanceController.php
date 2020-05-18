<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\paymentlog;
class BalanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addbalance(Request $request)
    {
        //check input is valid
        if ($request->get('fund')<=0){
            return redirect('/addbalance')->with('error','Please input a valid amount of fund');
        }elseif($request->get('fund')>0 && $request->get('fund')<5){
            return redirect('/addbalance')->with('error','Minimum fund can be added is RM5');
        }else{
            $fund = $request->get('fund');
            //return $fund;
            return redirect('/dummybank')->with('fund',$fund);
            //return redirect()->route('dummybank',compact('fund'));
        }
    }

    public function accept()
    {
        //this is when dummybank accept transaction
        $bankname = Session::get('bankname');
        $fund = Session::get('fund');
        //return $fund;
        $user = User::find(Auth::user()->id);
        $user->balance = $user->balance + $fund;
        $user->save();
        $paylog = new paymentlog;
        $paylog->user_id = Auth::user()->id;
        $paylog->fee = $fund;
        $paylog->bankname = $bankname;
        $paylog->save();
        return redirect('/home')->with('success','Your eWallet balance fund has been successfully added!');
    }
}
