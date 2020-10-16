<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Post;
use App\Theclass;
use App\Student;
use PDF;
use DB;
use Carbon\Carbon;
use Hash;
use App\Unit;
use App\Fee;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Exports\StudentsExport;
use App\Exports\StudentSearchExport;
use Maatwebsite\Excel\Facades\Excel;

class RegisteredStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index()
    {
        //
        $students=Student::with(['class', 'course'])->orderBy('id', 'desc')->paginate(6);
        $all_students=Student::orderBy('id', 'desc')->with('course')->get();
        // $september_2019=Student::whereBetween(DB::raw('date(created_at)'),
        // [ Carbon::createFromDate(2019, 8, 1)->toDateString(),
        // Carbon::createFromDate(2019, 12, 31)->toDateString()])->get();
        $september_2019=Student::where('intake', 'September')->where(DB::raw('YEAR(created_at)'), '=', '2019')->get();
        $january_2020=Student::whereBetween(DB::raw('date(created_at)'),
        [Carbon::createFromDate(2020, 1, 2)->toDateString(),
        Carbon::createFromDate(2020, 12, 31)->toDateString()])->get();
        return view('manage.registered_students.index')->with(compact('students', 'all_students', 'september_2019','january_2020'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student=Student::where('id', $id)->with('course')->first();
        return view('manage.registered_students.show')->withStudent($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $student= Student::where('id', $id)->with('course')->first();
       $fees=Fee::where('student_id', $id)->orderBy('id', 'desc')->paginate(6);
       $courses=Course::all();
       $classes=TheClass::all();
       $last_admission=DB::table('students')->latest()->first();
       $adm=$last_admission->admission_number;
      return view('manage.registered_students.edit')->withStudent($student)->withCourses($courses)->withClasses($classes)->withFees($fees)->with('adm', $adm);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'id_no'=>'required|max:255|unique:students,id_no,'.$id,
            'full_name'=>'required|max:255',
            'gender'=>'max:255',
            'phone_no'=>'required|max:255',
            'email'=>'required|email|max:255|unique:students,email,'.$id,
            'postal_address'=>'required|max:255',
            'county'=>'max:255',
            'passport'=>'image|max:1999',
            'intake'=>'max:255',
            'kcse_index'=>'required|max:255|unique:students,id_no,'.$id,
            'kcse_year'=>'required|max:255',
            'kcse_meangrade'=>'max:255',
            'id_pic'=>'max:1999',
            'kcse_pic'=>'max:1999',
            'nextofkin_phone'=>'max:255',
            'kcpe_index'=>'max:255',
            'kcpe_year'=>'max:255',
            'kcpe_pic'=>'max:255',
            'dateofbirth'=>'max:255',
            'marital_status'=>'max:255',
            'pry_sch'=>'max:255',
            'sec_sch'=>'max:255',
            'sec_start'=> 'max:255',
            'languages_spoken'=>'max:255',
            'physically_challeged'=>'max:255',
            'sponser'=>'max:255',
             'mother_info'=> 'max:255',
             'father_info'=>'max:255',
            'student_class'=>'max:255',
            'admittedon'=>'max:255',
            'admission_number'=>'max:255|unique:students,admission_number,'.$id,
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
                $kcse_imagename_to_store='no_kcpe.jpg';
            }

            if($request->hasFile('alfees_payment')){
                //get file name and extension
            $alpaymentfile_name_and_extension=$request->file('alfees_payment')->getClientOriginalName();
            //get file name 
            $alpaymentreceipt_file_name=pathinfo($alpaymentfile_name_and_extension, PATHINFO_FILENAME);
            //get extension
            $alpaymentreceipt_extension=$request->file('alfees_payment')->getClientOriginalExtension();
            //file name to be stored
            $alfees_payment=$alpaymentreceipt_file_name.'_'.time().'.'.$alpaymentreceipt_extension;
            $alpath=$request->file('alfees_payment')->storeAs('/public/student/paymentreceipt', $alfees_payment);
            
            }
            else{
                $alfees_payment='no_payment_receipt.jpg';
            }
           
            if($request->hasFile('fees_payment')){
                //get file name and extension
            $ffile_name_and_extension=$request->file('fees_payment')->getClientOriginalName();
            //get file name 
            $fpaymentreceipt_file_name=pathinfo($ffile_name_and_extension, PATHINFO_FILENAME);
            //get extension
            $fpaymentreceipt_extension=$request->file('fees_payment')->getClientOriginalExtension();
            //file name to be stored
            $ffees_payment=$fpaymentreceipt_file_name.'_'.time().'.'.$fpaymentreceipt_extension;
            $fpath=$request->file('fees_payment')->storeAs('/public/student/paymentreceipt', $ffees_payment);
            
            }
            else{
                $ffees_payment='no_payment_receipt.jpg';
            }

            $student=Student::find($id);
            $student->id_no=$request->id_no;
            $student->full_name=$request->full_name;
            if(!empty($request->gender))
            $student->gender=$request->gender;
            $student->phone_no=$request->phone_no;
            $student->email=$request->email;
            $student->postal_address=$request->postal_address;
            if(!empty($request->county))
            $student->county=$request->county;
            if($request->hasFile('passport')){
            $student->passport=$passport_imagename_to_store;
            }
            if(!empty($request->intake))
            $student->intake=$request->intake;
            $student->kcse_index=$request->kcse_index;
            $student->kcse_year=$request->kcse_year;
            if(!empty($request->kcse_meangrade))
            $student->kcse_meangrade=$request->kcse_meangrade;
            if($request->hasFile('id_pic')){
            $student->id_pic= $id_imagename_to_store;
            }
            if($request->hasFile('kcse_pic')){
            $student->kcse_pic=$kcse_imagename_to_store;
            }
            if(!empty($request->course_taken))
            $student->course_id=$request->course_taken;
            $student->nextofkin_phone=$request->nextofkin_phone;
            $student->kcpe_index=$request->kcpe_index;
            if($request->hasFile('kcpe_pic')){
                $student->kcpe_pic=$kcpe_imagename_to_store;
                }
            $student->kcpe_year=$request->kcpe_year;
            $student->dateofbirth=$request->dateofbirth;
            if(!empty($request->marital_status))
            $student->marital_status=$request->marital_status;
            $student->pry_sch=$request->pry_sch;
            $student->sec_sch=$request->sec_sch;
            $student->sec_start=$request->sec_start;
            $student->languages_spoken=$request->languages_spoken;
            if(!empty($request->physically_challenged))
            $student->physically_challenged=$request->physically_challenged;
            if(!empty($request->sponser))
            $student->sponser=$request->sponser;
            if(!empty($request->mother_info))
            $student->mother_info=$request->mother_info;
            if(!empty($request->father_info))
            $student->father_info=$request->father_info;
            if(!empty($request->student_class))
            $student->class_id=$request->student_class;
            $student->admitted_on=$request->admittedon;
            $student->admission_number=$request->admission_number;
            if($request->student_password=="on"){
                $password=Hash::make($request->email);
                $student->password=$password;
            }
            if($request->hasFile('alfees_payment')){
                $student->alpaymentreceipt=$alfees_payment;
            }
            if($request->hasFile('fees_payment')){
                $fee=new Fee();
                $fee->location=$ffees_payment;
                $fee->amount=$request->fee_amount;
                $fee->description=$request->fee_description;
                $fee->student_id=$student->id;
                $fee->save();
            }
                if($student->save()){
                    $student_fullname=preg_replace('/\s+/', '_', $student->full_name);
                    $pdf=PDF::loadView('manage.registered_students.admission', compact('student'));
                    Storage::put('public/admitted_students/'.$student->id.$student_fullname.'.pdf', $pdf->output());

                    if($fees_structure=Post::where('type', 'Other')->first()){
                        $fees_structure=$fees_structure->image_uploaded;
                    }else{
                        $fees_structure="";
                    }
                    $admission_documents=array();
                    $admission_documents[0]=$student->id;
                    $admission_documents[1]=preg_replace('/\s+/', '_', $student->full_name);
                    $admission_documents[2]=$fees_structure;
                    $course= Course::where('id', $student->course_id)->first();
                    $admission_documents[3]=$course->admission_letter;
                    return view('manage.registered_students.download')->with('admission_documents', $admission_documents);
                }
            else{
                return redirect()->route('manage.registered_students.edit', $student->id)->with('danger', 'Failed to update');
            
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Destroying students details
        $student=Student::find($id);
        $student->comments()->delete();
        if($student->delete()){
            return redirect()->route('registered.index')->with('success', 'deleted the student permanently!');
        }else{
            return redirect()->route('registered.index')->with('danger', 'Failed to delete!!');
        }
        
    }
    public function search(Request $request){
        $search_for=$request->the_search;
        if($search_for!=''){
            $students= Student::where('id_no', 'LIKE', '%'.$search_for.'%')
            ->orWhere('email', 'LIKE', '%'.$search_for.'%')
            ->orWhere('phone_no', 'LIKE', '%'.$search_for.'%')
             ->orWhere('gender', 'LIKE', '%'.$search_for.'%')
              ->orWhere('county', 'LIKE', '%'.$search_for.'%')
               ->orWhere('kcse_meangrade', 'LIKE', '%'.$search_for.'%')
                ->orWhere('kcse_year', 'LIKE', '%'.$search_for.'%')
                 ->orWhere('created_at', 'LIKE', '%'.$search_for.'%')
                 ->orWhere('intake', 'LIKE', '%'.$search_for.'%')
            ->orWhereHas('course', function($q) use($search_for){
                return $q->where('name', 'LIKE', '%' . $search_for . '%');
            })
            ->orWhereHas('class', function($q) use($search_for){
                return $q->where('code', 'LIKE', '%'.$search_for.'%');
            })
            ->paginate(100000)
            ->setpath('');
    $students->appends(array(
    'search_for'=>$request->the_search,));
    if(count($students)>0){
        \Session::put('students', $students);
        return view('manage.registered_students.search')->withStudents($students);
     
    }
   return view('manage.registered_students.search')->withMessage('no results found!');
  
}
}
public function export(){
    return Excel::download(new StudentsExport(), 'registeredstudents.xls');
}
public function searchExport(){
   $students=Session::get('students', null);
    return Excel::download(new StudentSearchExport($students), 'resultforstudentsearch.xls');
}
}