<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DummyBank;
use Session;
class DummyBankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function bankTransaction(Request $request)
    {
        //dummy bank, it will check if the username and password is present in the database
        // acts like a real bank when it's not :(
        
        $fund = $request->get('fund');
        $username = $request->get('username');
        $password = $request->get('password');
        $bank = $request->get('bank');

        $query = ['username' => $username, 'password' => $password, 'bankname' => $bank ];

        //check if exist
        $results = DummyBank::where($query)->first();
        if ($results){
            //return $results;
            $bankname = $results->bankname;
            Session::put('bankname', $bankname);
            Session::put('fund', $fund);
            return redirect()->route('transactionaccepted');
        }else{
            return "no data found in dummybank";
        }
    }
}
