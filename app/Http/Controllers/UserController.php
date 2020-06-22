<?php

namespace App\Http\Controllers;
use App\User;
use App\Plate;
use App\Log;
use Auth;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;

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

    public function phoneupdate(Request $request)
    {
        $phone = $request->get('phone');
        $data = User::find(Auth::user()->id);
        if (strcmp($data->phone, $phone) != 0){
            $match = ['phone' => $request->get('phone')];
            //find the log for the license plate based on the id of the license plate above
            $search = User::where($match)->get()->first();
            if ($search == NULL){
                $data->phone = $request->get('phone');
                $data->save();
                return redirect('profile')->with('success', 'Email successfully updated');
            }else{
                return redirect('profile')->with('error', 'Phone number has already been used by a different account');
            }
        }else{
            return redirect('profile')->with('success', 'Phone number is the same with the current one. No changes made');
        }
    }

    public function adminview()
    {
        $match = ['isAdmin' => '0'];
        $users = User::where($match)->orderBy('created_at', 'DESC')->paginate(10);
        return view('adminuserview',compact('users'));
        //return $users;
    }

    public function adminviewuser($id)
    {
        $user = User::with('plates')->find($id);
        $logs = Log::whereHas('user', function ($query) use ($id) {
            $match = ['user_id' => $id];
            $query->where($match);
        })->with('plate')->orderBy('exittime', 'DESC')->paginate(5);
        //return $user;
        return view('adminviewuser',compact('user','logs'));
        return $user;
    }

    public function search(Request $request)
    {
        $match = ['isAdmin' => '0'];
        if ($request->input('q')!=NULL){
            $results = (new Search())->registerModel(User::class, function(ModelSearchAspect $modelSearchAspect) {
                $modelSearchAspect->addSearchableAttribute('name')->addSearchableAttribute('email');
            })
            ->search($request->input('q'));
            return view('adminusersearch', compact('results'));
        }else{
            return redirect('/admin-user-view');
        }
    }



}
