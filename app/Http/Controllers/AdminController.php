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
     $year = YearLevel::all();
     return view('admin/dashboard',compact('year'));
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

    function edit_year(Request $request){
       $num = YearLevel::where('name','=',$request->year_name)->count();
       if($num == 0){
            //save
            YearLevel::where('id','=',$request->year_id)->update(['name' => $request->year_name]);
            return "success";
       }else{
           //year exist
           return "exist";
       }
    }
    function edit_course(Request $request){
        $num = Course::where('name','=',$request->c_name)->count();
        if($num == 0 ){
            //save
            Course::where('id','=',$request->c_id)->update(['name' => $request->c_name]);
            return "success";
        }else{
            //course exist
            return "exist";
        }
    }

    function check_connection_year_course($id){
        $count = Course::where('year_level_id','=',$id)->count();
        if($count > 0 ){
            return "cant-delete";
        }else{
            YearLevel::where('id','=',$id)->delete();
            return "success";
        }
    }
    function delete_course($id){
        Course::where('id','=',$id)->delete();
    }
    function get_course_key($id){
      $c = Course::where('year_level_id','=',$id)->count();
     if($c != 0 ){
         $data = Course::where('year_level_id','=',$id)->get();
         return response()->json($data);
     }
    }
     function save_student(Request $r){
        $r->validate([
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048'
        ]);
        $photo = $r->file('photo')->getClientOriginalName();
        $student = new Student;
        $url_photo = time().$photo; 
        $student->id_number = $r->rfid_number;
        $student->first_name = $r->first_name;
        $student->middle_name = $r->middle_name;
        $student->last_name = $r->last_name;
        $student->parents_contact_number = $r->contact;
        $student->gender = $r->gender;
        $student->year_level = $r->year;
        $student->course_strand = $r->course;
        $student->photo = $url_photo; 
        $r->photo->move(public_path('images'),$url_photo);  
        $student->save();
        
    }

  
}
