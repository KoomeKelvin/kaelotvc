<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class StudentLoginController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest:student', ['except'=>['logout']]);
    }
    public function showLoginForm(){
        return view('auth.student-login');
    }
    public function login(Request $request){
        //  validate the credetials 
        $this->validate($request, [
            'email'=>'max:255|email',
            'password'=>'min:5',
        ]);
        // attempt to login the user 
        if(Auth::guard('student')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
           // if successful redirect to the intended location 
            return redirect()->intended(route('student_dashboard'));
        }
// If unsuccessful redirect back to the login with form data 
return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('student')->logout();
       // return $this->loggedOut($request) ?: redirect('/');
        return redirect('/');
    }

}
