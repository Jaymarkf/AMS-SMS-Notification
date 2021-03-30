<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\YearLevel;
use App\Models\Course;


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
    $year_level = YearLevel::all();
     return view('admin/dashboard',compact('year_level'));
    }

    //paginate yearlevel
    function yearpaginate(){
        return YearLevel::paginate(5);
    }

    function api_student($data){
        $count = Student::where('id_number','=',$data)->count();
        if($count == 0){
            return "not found";
        }else{
            return "found";
        }
      
    }
    function store_yearlevel(Request $r){
        //check if exist
        $count = YearLevel::where('name','=',$r->year_name)->count();
        $yearlevel = new YearLevel;
        if($count == 0){
            $yearlevel->name = $r->year_name;
            $yearlevel->save();
            return "success";
        }else{
            //the year name is exist
            return "exist";
        }
    }

    function create_course(Request $request){
        $request->validate([
            'year_level' => 'required',
            'course'=> 'required',
       ]);
        //check if exist
        $data = Course::where('year_level_id','=',$request->year_level)->where('name','=', $request->course)->count();
        if($data == 0){
            Course::create(['year_level_id' => $request->year_level, 'name'=> $request->course]);
            return "created";
        }else{
            return "record-exist";
        }
        
    }
    function get_course(){
       return YearLevel::join('courses','year_levels.id','=','courses.year_level_id')->select('year_levels.*','courses.*','year_levels.name as yearname')->paginate(5);
    }

  
}
