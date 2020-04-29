<?php

namespace App\Http\Controllers;
use App\Plate;
use App\Log;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Auth;
class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //return $user;
        //$applications = Application::with('student','subject')->get();
        $logs = Log::whereHas('plate', function ($query) {
            $match = ['user_id' => Auth::user()->id, 'status' => 'EXIT'];
            $query->where($match);
        })->with('plate')->get();
        //return $logs;
        $fees = [];
        //calculate fee(s) of each log and push into array
        foreach($logs as $log){
            $fee = 0;
            $entrytime = strtotime($log->entry);
            $entry = new DateTime(date('Y-m-d H:i:s',$entrytime));
            $exittime = strtotime($log->exit);
            $exit = new DateTime(date('Y-m-d H:i:s',$exittime));
            //return $current;
            //calculate duration
            $interval = $entry->diff($exit);
            $duration = $interval->format('%a Days %H Hours %I Minutes');
            $day = intval($interval->format('%a'));
            $hour = intval($interval->format('%H'));
            $minute = intval($interval->format('%I'));

            //calculate fee based on day(s)
            $fee = $fee + ($day*24);
            //calculate fee (hardcoded for RM1 for 1 Hours)
            $fee = $fee+($hour*1);
            //if minutes is more than 30, count as an hour
            if($minute > 30 ){
            $fee += 1;
            }
            array_push($fees,$fee);
        }
        //return $fees;
        return view('transaction', compact('logs','fees'));
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
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }

    public function adminview()
    {
        //make array of months
        $months = array(
            "January" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "February" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "March" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "April" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "May" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "June" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "July" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "August" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "September" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "October" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "November" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
            "December" => array(
                "countvisitor" => 0,
                "totalfee" => 0,
            ),
        );
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $logs = Log::all();
        //return $logs;
        $now = new DateTime();
        $today = $now;
        $todaycount = 0;
        //count visitor for current year and sort by month
        foreach ($logs as $log) {
            //check current year
            $year = $now->format("Y");
            $day = $today->format("Y-m-d");
            //check log year
            $logyear =  new DateTime($log->entry);
            $logyear = $logyear->format('Y');
            $logday = new DateTime($log->entry);
            $logday = $logday->format('Y-m-d');
            if ($logyear == $year){
                $logmonth =  new DateTime($log->entry);
                $logmonthexit =  new DateTime($log->exit);
                $logmonth = $logmonth->format('F');
                $logmonthexit = $logmonthexit->format('F');
                switch ($logmonth) {
                    case "January":
                        $months['January']['countvisitor']++;
                        break;
                    case "February":
                        $months['February']['countvisitor']++;
                        break;
                    case "March":
                        $months['March']['countvisitor']++;
                        break;
                    case "April":
                        $months['April']['countvisitor']++;
                        break;
                    case "May":
                        $months['May']['countvisitor']++;
                        break;
                    case "June":
                        $months['June']['countvisitor']++;
                        break;
                    case "July":
                        $month['July']['countvisitor']++;
                        break;
                    case "August":
                        $months['August']['countvisitor']++;
                        break;
                    case "September":
                        $months['September']['countvisitor']++;
                        break;
                    case "October":
                        $months['October']['countvisitor']++;
                        break;
                    case "November":
                        $months['November']['countvisitor']++;
                        break;   
                    case "December":
                        $months['December']['countvisitor']++;
                        break;
                    default:    
                }
                switch ($logmonthexit) {
                    case "January":
                        $months['January']['totalfee'] += $log->fee;
                        break;
                    case "February":
                        $months['February']['totalfee'] += $log->fee;
                        break;
                    case "March":
                        $months['March']['totalfee'] += $log->fee;
                        break;
                    case "April":
                        $months['April']['totalfee'] += $log->fee;
                        break;
                    case "May":
                        $months['May']['totalfee'] += $log->fee;
                        break;
                    case "June":
                        $months['June']['totalfee'] += $log->fee;
                        break;
                    case "July":
                        $month['July']['totalfee'] += $log->fee;
                        break;
                    case "August":
                        $months['August']['totalfee'] += $log->fee;
                        break;
                    case "September":
                        $months['September']['totalfee'] += $log->fee;
                        break;
                    case "October":
                        $months['October']['totalfee'] += $log->fee;
                        break;
                    case "November":
                        $months['November']['totalfee'] += $log->fee;
                        break;   
                    case "December":
                        $months['December']['totalfee'] += $log->fee;
                        break;
                    default:    
                }
                if ($day == $logday){
                    $todaycount++;
                }
            }
            
        }
        $currentmonth = $now->format('F');
        return view('dashboard',compact('months','todaycount','currentmonth'));
        
    }


    public function search(Request $request)
    {
        $fee = 0;
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $search = $request->get('plate');
        
        //dd($request->get('plate'));

        //find the id of the license plate in the database
        $plateid = Plate::where('license_plate', $search)->get()->first();
        if (!$plateid == NULL){
            //return $plateid;
            $match = ['plate_id' => $plateid->id, 'status' => 'ENTER'];
            //find the log for the license plate based on the id of the license plate above
            $search = Log::where($match)->get()->first();
            if (!$search == NULL){
                $current = new DateTime(date("Y-m-d H:i:s"));
                $time = strtotime($search->entry);
                $entry = new DateTime(date('Y-m-d H:i:s',$time));
                //return $current;
                //calculate duration
                $interval = $entry->diff($current);
                $duration = $interval->format('%a Days %H Hours %I Minutes');
                $day = intval($interval->format('%a'));
                $hour = intval($interval->format('%H'));
                $minute = intval($interval->format('%I'));
                //return $day;
                //calculate fee based on day(s)
                $fee = $fee + ($day*24);
                //calculate fee (hardcoded for RM1 for 1 Hours)
                $fee = $fee+($hour*1);
                //if minutes is more than 30, count as an hour
                if($minute > 30 ){
                    $fee += 1;
                }
                $entry = $entry->format('Y/m/d H:i');
                return view('found',compact('entry','plateid','duration', 'fee'));
        }return view('notfound');
    }return view('notfound');
    }


    //Intended for simulation. Remove before publishing
    public function fakeExitView()
    {
        $match = ['status' => 'ENTER'];
        $logs = Log::where($match)->with('plate')->get();
        //return $logs;
        return view('fakeexit',compact('logs'));
        
    }
    //Intended for simulation. Remove before publishing
    public function fakeExit(Request $request)
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
       $id = $request->get('id');
       $log = Log::find($id);
       $exit = new DateTime(date("Y-m-d H:i:s"));
        $fee = 0;
        //return $exit;
        $time = strtotime($log->entry);
        $entry = new DateTime(date('Y-m-d H:i:s',$time));
        //return $entry->format('Y-m-d H:i:s');
        $interval = $entry->diff($exit);
        //$duration = $interval->format('%a Days %H Hours %I Minutes');
        $day = intval($interval->format('%a'));
        $hour = intval($interval->format('%H'));
        $minute = intval($interval->format('%I'));
        //return $day;    
        //calculate fee based on day(s)
        $fee = $fee + ($day*24);
        //calculate fee (hardcoded for RM1 for 1 Hours)
        $fee = $fee+($hour*1);
        //if minutes is more than 30, count as an hour
        if($minute > 30 ){
            $fee += 1;
        }
        $textexit = $exit->format('Y-m-d H:i:s');
        //return $fee;
        $log->exit = $textexit;
        $log->fee = $fee;
        $log->status = "EXIT";
        $log->save();
        return redirect('/fakeexit');
        
    }
    public function fakeEntry(Request $request)
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $log = new Log;
        $now = new DateTime();
        $now = $now->format("Y-m-d H:i:s");
        //return $now;
        $log->entry = $now;
        $log->status = "ENTER";
        //check if plate is already in database
        $match = ['license_plate' => $request->get('plate')];
        $search = Plate::where($match)->get()->first();
        if (!$search == NULL){
            $log->plate_id = $search->id;
        }else{
            $plate = new Plate;
            $plate->license_plate = $request->get('plate');
            $plate->save();
            $log->plate_id = $plate->id;
        }
        $log->save();
        return redirect('/fakeentry');
        
    }
}
