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
}
