<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
class AdminController extends Controller
{
    //
    function auth(Request $req){
        $req->validate([
            'username' => 'required',
            'password' => 'required|min:5|max:12',
        ]);
    
        $user = User::where('username','=',$req->username)->where('password','=',$req->password)->first();
        if($user){
           $req->session()->put('login',$user->id);
           return redirect('admin/dashboard');

        }else{
            return back()->with('fail',"Credentials are incorrect! Try again");
        }



        return redirect('admin/dashboard');
    }

   
    function student(){
    // $users = User::paginate(1);
     return view('admin/dashboard');
    }
     
    function settings(){
        // $users = User::paginate(1);
     return view('admin/dashboard');
    }



    function api_student($data){
        $count = Student::where('id_number','=',$data)->count();
        if($count == 0){
            return "not found";
        }else{
            return "found";
        }
      
    }

}
