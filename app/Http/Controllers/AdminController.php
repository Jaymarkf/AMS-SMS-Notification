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
    if(isset($_GET['search'])){
        $qry = $_GET['search'];
      $year = YearLevel::all();
     $users = Student::where('students.id_number','like','%'.$qry.'%')
     ->orWhere('students.first_name','like','%'.$qry.'%')
     ->orWhere('students.middle_name','like','%'.$qry.'%')
     ->orWhere('students.last_name','like','%'.$qry.'%')
     ->orWhere('students.gender','like','%'.$qry.'%')
     ->orWhere('year_levels.name','like','%'.$qry.'%')
     ->orWhere('courses.name','like','%'.$qry.'%')
     ->orWhere('students.parents_contact_number','like','%'.$qry.'%')
     ->join('year_levels','students.year_level','=','year_levels.id')->join('courses','students.course_strand','=','courses.id')->select('students.*','students.id as student_id','year_levels.name as yearname','courses.name as coursename')->paginate(10);
     return view('admin/dashboard',compact('year','users'));
    }else{
     $year = YearLevel::all();
     $users = Student::join('year_levels','students.year_level','=','year_levels.id')->join('courses','students.course_strand','=','courses.id')->select('students.*','students.id as student_id','year_levels.name as yearname','courses.name as coursename')->paginate(10);
     return view('admin/dashboard',compact('year','users'));
    }
    }



    function sms(){
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
        $photo = $r->file('photo')->getClientOriginalExtension();
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
        //redirect to view
        return redirect('admin/student');
        
    }
    function edit_student($id){ 
            return Student::where('id','=',$id)->first();
    }
    function save_edit_student(Request $r){
       
        if(isset($r->file)){
            $imageName = time().'.'.$r->file->getClientOriginalExtension();
            $r->file('file')->move(public_path('images'), $imageName);
            Student::where('id','=',$r->e_student_id)->update(['photo'=>$imageName]);
            return 'success-upload';
        }else{
            Student::where('id','=',$r->e_student_id)->update(['id_number' => $r->student_id_number]);
           
           
        }
  
    }
    function delete_student(Request $request){
            Student::where('id','=',$request->delete_id)->delete();
    }
    function credit_balance(){
        $url = 'https://ghbulksms.com/index.php?option=com_spc&comm=spc_api&username=buddyk2013&password=uttoG123&balance=true';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $result= curl_exec($curl);
        return response()->json($result);
        curl_close($curl);
    }
    function send_sms(Request $request){
        $msg = $request->post_sms_message;
        $recipient = '';
        // '23354xxxxxxx,233230000000&message=testing';

        if(isset($request->year)){
            //send to specific
            $student = Student::where('year_level','=',$request->year)->where('course_strand','=',$request->course)->get();
           $data = array();
            foreach ($student as $key => $val){
                $data[] = $val['parents_contact_number'];
            }
            $recipient = implode(',',$data);
            $msgtoSent = preg_replace('/\s+/', '+', $msg);
            $url = 'https://ghbulksms.com/index.php?option=com_spc&comm=spc_api&username=buddyk2013&password=uttoG123&sender=Vroomllc&recipient='.$recipient.'&message='.$msgtoSent;
            // return $url;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            $result= curl_exec($curl);
            $res = substr($result, 0, 2); 
            return response()->json($res); //either OK or error
            curl_close($curl);

        }else{
            //all
          $student = Student::all();
          $num = array();
           foreach($student as $key => $val){
                $num[] = $val['parents_contact_number'];
           }
           $contact = implode(',',$num);
           $msgtoSent = preg_replace('/\s+/', '+', $msg);
           $url = 'https://ghbulksms.com/index.php?option=com_spc&comm=spc_api&username=buddyk2013&password=uttoG123&sender=Vroomllc&recipient='.$contact.'&message='.$msgtoSent;
           $curl = curl_init();
           curl_setopt($curl, CURLOPT_URL, $url);
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($curl, CURLOPT_HEADER, false);
           $result= curl_exec($curl);
        //    $res = substr($result, 0, 2); 
           return response()->json( $result); //either OK or error
           curl_close($curl);



        }

    }
  
}
