<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

   
    function testp(){
        $users =  User::paginate(2);
        // return response()->json(['data'=>$test]);
        return view('test',compact('users'));
    }
}
