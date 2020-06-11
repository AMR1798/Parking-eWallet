<?php

namespace App\Http\Controllers;
use App\User;
use App\Plate;
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

    public function adminview()
    {
        $users = User::orderBy('created_at', 'DESC')->with('plates')->paginate(10);
        return view('adminuserview',compact('users'));
        return $users;
    }

    public function search(Request $request)
    {
        $results = (new Search())->registerModel(User::class, function(ModelSearchAspect $modelSearchAspect) {
            $modelSearchAspect->addSearchableAttribute('name')->addSearchableAttribute('email')
                ->with('plates');
        })
        ->search($request->input('q'));

        
        return view('adminusersearch', compact('results'));

       
    }



}
