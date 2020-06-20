<?php

namespace App\Http\Controllers;
use App\Plate;
use App\Log;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Auth;
use App\Price;
use App\Http\Filters\LogFilter;
class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $logs = Log::whereHas('user', function ($query) {
            $match = ['user_id' => Auth::user()->id];
            $query->where($match);
        })->with('plate')->orderBy('exittime', 'DESC')->paginate(5);
       // return $logs;
        $fees = [];
        //calculate fee(s) of each log and push into array
        //return $fees;
        return view('transaction', compact('logs'));
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
        $todayfee = 0;
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
            $logdayexit = new DateTime($log->exittime);
            $logdayexit = $logdayexit->format('Y-m-d');
            if ($logyear == $year){
                $logmonth =  new DateTime($log->entry);
                $logmonthexit =  new DateTime($log->exittime);
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
                if ($day == $logdayexit){
                    $todayfee += $log->fee; 
                }
            }
            
        }
        $currentmonth = $now->format('F');
        return view('dashboard',compact('months','todaycount','currentmonth', 'todayfee'));
        
    }


    public function search(Request $request)
    {
        $fee = 0;
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $search = $request->get('plate');
        $price = Price::find(1)->first();
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
                //return $hour;
                 //calculate first day
                if ($day == 0){
                    if ($minute > 15 && $hour == 0 || $hour == 1){
                        $fee = $fee + ($price->firstHour);
                    }else if ($hour > 1){
                        $fee = $fee + ($price->firstHour);
                        --$hour;
                        $fee = $fee + ($price->nextHour*$hour);
                        if ($minute > 15){
                            $fee = $fee + ($price->nextHour);
                        }
                    }
                    //$f = true;
                }else {
                    //calculate next day
                    //return $fee;
                    if ($minute > 15 ){
                        $fee = $fee + ($price->nextHour);
                    }
                    //return $fee;
                    if ($hour > 0 ){
                        $fee = $fee + ($price->nextHour*$hour);
                    }
                    //return $hour;
                    //return $fee;   
                }
                if ($fee > $price->maxHour){
                    $fee = $price->maxHour;
                }
                $fee = $fee + ($day*$price->maxHour);
                //return $fee;
                
                $entry = $entry->format('Y/m/d H:i');
                $gate = $search->gate;
                return view('found',compact('entry','plateid','duration', 'fee', 'gate'));
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
       $plate_id = $log->plate_id;
       //return $plate_id;
       $price = Price::find(1)->first();
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
        //calculate fee if more than 15 minutes)
        if ((($minute > 15 && $hour == 0) || ($hour == 1)) && $day == 0){
            $fee = $fee + ($price->firstHour);
            $f = true;
        }
        if ($minute > 15 ){
            $fee = $fee + ($price->nextHour);
        }
        //return $fee;
        if ($hour > 0 && $day != 0){
            $fee = $fee + ($price->nextHour*$hour);
        }
        //return $fee;   
        
        
        if ($fee > $price->maxHour){
            $fee = $price->maxHour;
        }

        $fee = $fee + ($day*$price->maxHour);
        //return $fee;
        $textexit = $exit->format('Y-m-d H:i:s');
        //return $fee;
        $plate = Plate::find($plate_id);
        //return $plate->license_plate;
        if($plate->user_id != NULL){
            //return "hey";
            $user = User::find($plate->user_id);
            //return $user->balance;
            if($user->balance >= $fee){
                $user->balance -= $fee;
                $user->save();
                $log->exittime = $textexit;
                $log->fee = $fee;
                $log->status = "EXIT";
                $log->gate = "Simulation";
                $log->user_id = $plate->user_id;
                $log->save();
                return redirect('/fakeexit')->with('success', 'Vehicle exit simulation : success');
            }else{
                return redirect('/fakeexit')->with('error', 'account balance not enough!');
            }
        }else{
            return redirect('/fakeexit')->with('error', 'Plate not registered to a user!');
        }
        
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

    public function viewAll()
    {
        
        
        $logs = Log::with('plate.user')->orderBy('id', 'DESC')->paginate(10);
        //return $logs;
        return view('viewlogs', compact('logs'));
    }

    public function viewAllFilter(LogFilter $filter)
    {
        $logs = $filter->sieve(Log::class)->with('plate.user')->orderBy('id', 'DESC')->paginate(10);
        //return $logs;
        return view('viewlogs', compact('logs'));
    }
}
