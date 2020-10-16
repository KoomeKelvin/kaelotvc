<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Post;
use App\Student;
use PDF;
use Mail;
use Session;
use Illuminate\Support\Facades\Storage;
class FrontEndController extends Controller
{

    //
    public function departments()
    {
        $courses=Course::all();
        return view('frontend.departments.index')->withCourses($courses);
    }
public function gallery()
{
    $posts=Post::where('type', 'Gallery')->orderBy('id', 'desc')->take(10)->get();
    $announcements=Post::where('type', 'Announcement')->orderBy('id', 'desc')->take(3)->get();
    $collect=array();
    $collect[0]=$posts;
    $collect[1]=$announcements;
    return view('frontend.home.index')->with('collect', $collect);
   //return view('frontend.home.index')->withPosts($posts, $announcements);
}
public function applications(){
    $courses=Course::orderBy('id', 'asc')->paginate(6);
    return view('frontend.applications.index')->withCourses($courses);
}
public function search(Request $request){
    $search_for=$request->the_search;
    if($search_for!=''){
        $courses= Course::where('name', 'LIKE', '%'.$search_for.'%')
        ->orWhere('type', 'LIKE', '%'.$search_for.'%')
        ->orWhere('duration', 'LIKE', '%'.$search_for.'%')
         ->orWhere('minimum_grade', 'LIKE', '%'.$search_for.'%')
          ->orWhere('subjects_considered', 'LIKE', '%'.$search_for.'%')
           ->orWhere('department', 'LIKE', '%'.$search_for.'%')
        ->paginate(5)
        ->setpath('');
$courses->appends(array(
'search_for'=>$request->the_search,));
if(count($courses)>0){
    return view('frontend.applications.search')->withCourses($courses);
 
}
return view('frontend.applications.search')->withMessage('no results found!');

}
}
public function apply($id){
    $course=Course::find($id);
    return view('frontend.apply.index')->withCourse($course);
    //return view('frontend.apply.maintenance');
}
public function submit_application(Request $request){
$request->validate([
'id_no'=>'required|unique:students|max:255',
'full_name'=>'required|max:255',
'gender'=>'required|max:255',
'phone_no'=>'required|max:255',
'nextofkin_phone'=>'required|max:255',
'email'=>'required|email|unique:students|max:255',
'postal_address'=>'required|max:255',
'county'=>'required|max:255',
'passport'=>'required|image|max:1999',
'intake'=>'required|max:255',
'kcse_index'=>'required|unique:students|max:255',
'kcse_year'=>'required|max:255',
'kcse_meangrade'=>'required|max:255',
'kcpe_index'=>'required|max:255',
'kcpe_year'=>'required|max:255',
'kcpe_pic'=>'required|max:1999',
'id_pic'=>'required|max:1999',
'kcse_pic'=>'required|max:1999',
'dateofbirth'=>'required|max:255',
'marital_status'=>'required|max:255',
'pry_sch'=>'required|max:255',
'sec_sch'=>'required|max:255',
'sec_start'=>'required|max:255',
'languages_spoken'=>'required|max:255',
'physically_challenged'=>'required|max:255',
'alpaymentreceipt'=>'required|max:1999',
'mother_info'=>'required|max:255',
'father_info'=>'required|max:255',
]);

if($request->hasFile('passport')){
    //get file name and extension
$passport_file_name_and_extension=$request->file('passport')->getClientOriginalName();
//get file name 
$passport_file_name=pathinfo($passport_file_name_and_extension, PATHINFO_FILENAME);
//get extension
$passport_extension=$request->file('passport')->getClientOriginalExtension();
//file name to be stored
$passport_imagename_to_store=$passport_file_name.'_'.time().'.'.$passport_extension;
$path=$request->file('passport')->storeAs('/public/student/passport', $passport_imagename_to_store);

}
else{
    $passport_imagename_to_store='no_passportimage.jpg';
}
if($request->hasFile('id_pic')){
    //get file name and extension
$id_file_name_and_extension=$request->file('id_pic')->getClientOriginalName();
//get file name 
$id_file_name=pathinfo($id_file_name_and_extension, PATHINFO_FILENAME);
//get extension
$id_extension=$request->file('id_pic')->getClientOriginalExtension();
//file name to be stored
$id_imagename_to_store=$id_file_name.'_'.time().'.'.$id_extension;
$path=$request->file('id_pic')->storeAs('/public/student/id', $id_imagename_to_store);

}
else{
    $id_imagename_to_store='no_id.jpg';
}


if($request->hasFile('kcse_pic')){
    //get file name and extension
$kcse_file_name_and_extension=$request->file('kcse_pic')->getClientOriginalName();
//get file name 
$kcse_file_name=pathinfo($kcse_file_name_and_extension, PATHINFO_FILENAME);
//get extension
$kcse_extension=$request->file('kcse_pic')->getClientOriginalExtension();
//file name to be stored
$kcse_imagename_to_store=$kcse_file_name.'_'.time().'.'.$kcse_extension;
$path=$request->file('kcse_pic')->storeAs('/public/student/id', $kcse_imagename_to_store);

}
else{
    $kcse_imagename_to_store='no_kcse.jpg';
}

if($request->hasFile('kcpe_pic')){
    //get file name and extension
$kcpe_file_name_and_extension=$request->file('kcpe_pic')->getClientOriginalName();
//get file name 
$kcpe_file_name=pathinfo($kcpe_file_name_and_extension, PATHINFO_FILENAME);
//get extension
$kcpe_extension=$request->file('kcpe_pic')->getClientOriginalExtension();
//file name to be stored
$kcpe_imagename_to_store=$kcpe_file_name.'_'.time().'.'.$kcpe_extension;
$path=$request->file('kcpe_pic')->storeAs('/public/student/kcpe', $kcpe_imagename_to_store);

}
else{
    $kcpe_imagename_to_store='no_kcpe.jpg';
}

if($request->hasFile('alpaymentreceipt')){
    //get file name and extension
$paymentreceipt_file_name_and_extension=$request->file('alpaymentreceipt')->getClientOriginalName();
//get file name 
$paymentreceipt_file_name=pathinfo($paymentreceipt_file_name_and_extension, PATHINFO_FILENAME);
//get extension
$paymentreceipt_extension=$request->file('alpaymentreceipt')->getClientOriginalExtension();
//file name to be stored
$paymentreceipt_imagename_to_store=$paymentreceipt_file_name.'_'.time().'.'.$paymentreceipt_extension;
$path=$request->file('alpaymentreceipt')->storeAs('/public/student/paymentreceipt', $paymentreceipt_imagename_to_store);

}
else{
    $paymentreceipt_imagename_to_store='no_payment_receipt.jpg';
}

$student=new Student();
$student->id_no=$request->id_no;
$student->full_name=strtoupper($request->full_name);
$student->gender=strtoupper($request->gender);
$student->phone_no=$request->phone_no;
$student->email=$request->email;
$student->postal_address=$request->postal_address;
$student->county=strtoupper($request->county);
$student->passport=$passport_imagename_to_store;
$student->intake=strtoupper($request->intake);
$student->kcse_index=preg_replace("~/~", "", $request->kcse_index);
$student->kcse_year=$request->kcse_year;
$student->kcse_meangrade=$request->kcse_meangrade;
$student->id_pic= $id_imagename_to_store;
$student->kcse_pic=$kcse_imagename_to_store;
$student->course_id=$request->course_id;
$student->nextofkin_phone=$request->nextofkin_phone;
$student->kcpe_index=preg_replace("~/~", "", $request->kcpe_index);
$student->kcpe_pic=$kcpe_imagename_to_store;
$student->kcpe_year=$request->kcpe_year;
$student->dateofbirth=$request->dateofbirth;
$student->marital_status=strtoupper($request->marital_status);
$student->pry_sch=strtoupper($request->pry_sch);
$student->sec_sch=strtoupper($request->sec_sch);
$student->sec_start=$request->sec_start;
$student->languages_spoken=strtoupper($request->languages_spoken);
$student->physically_challenged=strtoupper($request->physically_challenged);
$student->mother_info=strtoupper($request->mother_info);
$student->father_info=strtoupper($request->father_info);
$student->sponser=strtoupper($request->sponser);
$student->alpaymentreceipt=$paymentreceipt_imagename_to_store;
if($student->save()){
   
    $student_fullname=preg_replace('/\s+/', '_', $student->full_name);
    $pdf=PDF::loadView('frontend.apply.admission', compact('student'));
    Storage::put('/public/admitted_students/'.$student->id.$student_fullname.'.pdf', $pdf->output());
    return view('frontend.apply.feedback')->with('student', $student);
}

}
public function contact()
{
    return view('frontend.contact_us.index');
}

public function feedback(Request $request)
{

    $request->validate([
        'name'=>'required',
        'subject'=>'required',
        'feedback_email'=>'required|email',
        'message'=>'min:10'
    ]);
    $data=array(
        'name'=>$request->name,
        'feedback_message'=>$request->message,
        'email'=>$request->feedback_email,
        'subject'=>$request->subject
    );
    $feedback=Mail::send('frontend.emails.feedback', $data, function($message) use ($data){
        $message->to('info@kaelotvc.ac.ke');
        $message->from($data['email']);
        $message->subject($data['subject']);
    });
     $request->session()->flash('success', 'Message well recieved, well be responding shortly in your email');
    return view('frontend.contact_us.index');


}

 
}