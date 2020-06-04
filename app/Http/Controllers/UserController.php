<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editprofile()
    {
        $data = User::with('plates')->find(Auth::user()->id);
        //return $data;
        return view('editprofile', compact('data'));
    }

    public function emailupdate(Request $request)
    {
        $email = $request->get('email');
        $data = User::find(Auth::user()->id);
        if (strcmp($data->email, $email) != 0){
            $match = ['email' => $request->get('email')];
            //find the log for the license plate based on the id of the license plate above
            $search = User::where($match)->get()->first();
            if ($search == NULL){
                $data->email = $request->get('email');
                $data->save();
                return redirect('profile')->with('success', 'Email successfully updated');
            }else{
                return redirect('profile')->with('error', 'Email has already been used by a different account');
            }
        }else{
            return redirect('profile')->with('success', 'Email is the same with the current one. No changes made');
        }
    }

}
