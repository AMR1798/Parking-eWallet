<?php

namespace App\Http\Controllers;

use App\paymentlog;
use Illuminate\Http\Request;
use Auth;
use DateTime;
class PaymentlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = paymentlog::orderBy('created_at', 'DESC')->with('user')->paginate(10);
        //$logs = paymentlog::all()->orderBy('created_at', 'DESC')
        //return $logs;
        return view('topuplog', compact('logs'));
    }

    public function adminview()
    {
        
        //make array of months
        $months = array(
            "January" => array(
                "countpayment" => 0
            ),
            "February" => array(
                "countpayment" => 0
            ),
            "March" => array(
                "countpayment" => 0
            ),
            "April" => array(
                "countpayment" => 0
            ),
            "May" => array(
                "countpayment" => 0
            ),
            "June" => array(
                "countpayment" => 0
                
            ),
            "July" => array(
                "countpayment" => 0
                
            ),
            "August" => array(
                "countpayment" => 0
                
            ),
            "September" => array(
                "countpayment" => 0
                
            ),
            "October" => array(
                "countpayment" => 0
                
            ),
            "November" => array(
                "countpayment" => 0
                
            ),
            "December" => array(
                "countpayment" => 0
                
            ),
        );
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $logs = paymentlog::all();
        //return $logs;
        $now = new DateTime();
        $today = $now;
        $todaycount = 0;
        $todayfee = 0;
        //count visitor for current year and sort by month
        foreach ($logs as $log) {
            //check current year
            $year = $now->format("Y");
            $day = $today->format("Y-m-d");
            //check log year
            $logyear =  new DateTime($log->created_at);
            $logyear = $logyear->format('Y');
            $logday = new DateTime($log->created_at);
            $logday = $logday->format('Y-m-d');
            if ($logyear == $year){
                $logmonth =  new DateTime($log->created_at);
                $logmonth = $logmonth->format('F');
                switch ($logmonth) {
                    case "January":
                        $months['January']['countpayment'] += $log->fee;
                        break;
                    case "February":
                        $months['February']['countpayment'] += $log->fee;
                        break;
                    case "March":
                        $months['March']['countpayment'] += $log->fee;
                        break;
                    case "April":
                        $months['April']['countpayment'] += $log->fee;
                        break;
                    case "May":
                        $months['May']['countpayment'] += $log->fee;
                        break;
                    case "June":
                        $months['June']['countpayment'] += $log->fee;
                        break;
                    case "July":
                        $month['July']['countpayment'] += $log->fee;
                        break;
                    case "August":
                        $months['August']['countpayment'] += $log->fee;
                        break;
                    case "September":
                        $months['September']['countpayment'] += $log->fee;
                        break;
                    case "October":
                        $months['October']['countpayment'] += $log->fee;
                        break;
                    case "November":
                        $months['November']['countpayment'] += $log->fee;
                        break;   
                    case "December":
                        $months['December']['countpayment'] += $log->fee;
                        break;
                    default:    
                }
                if ($day == $logday){
                    $todaycount += $log->fee;
                }
                
            }
            
        }
        $currentmonth = $now->format('F');
        return view('adminpayment',compact('months','todaycount','currentmonth'));
        
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
