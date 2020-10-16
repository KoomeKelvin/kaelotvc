<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;
use Hash;
use Auth;
use App\File;
use App\Notifications\automaticPasswordNotification;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){
    // $this->middleware('role:manager', ['except'=>['index, show']]);
    // }
   


    public function index()
    {
        //
        $users=User::orderBy('id', 'desc')->paginate(6);
        return view('manage.users.dashboard')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
        'name'=> 'required|max:255',
    'email'=>'required|email|unique:users',
            ]);
           
            if(!empty($request->password)){
                $password=trim($request->password);   
            }else{
               // we create code to create the password randomly
                $length=10;
                $keyspace='ABCDEFGHJKMNPQRTUVWXYZacdefghijkmpqrstuvwxyz12346789';
                $str='';
                $max=mb_strlen($keyspace, '8bit')-1;
                for($i=0; $i<$length; ++$i){
                   $str.=$keyspace[random_int(0, $max)];
                }
           
            $password= $str;
            }
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($password);
           $user->save();
           if(empty($request->password)){
           $user->notify(new automaticPasswordNotification($str));
           }
           return redirect()->route('users.show', $user->id);
           


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id;
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user=User::where('id', $id)->with('roles')->first();
        //dd($user);
        return view('manage.users.show')->withUser($user);
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
        $user=User::where('id', $id)->with('roles')->first();
        $roles=Role::all();
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
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
        'name'=>'required|max:255',
        'email'=>'required|email|unique:users,email,'.$id
        ]);
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->options == 'auto_password'){
            $length=10;
            $keyspace='ABCDEFGHJKMNPQRTUVWXYZacdefghijkmpqrstuvwxyz12346789';
            $str='';
            $max=mb_strlen($keyspace, '8bit')-1;
            for($i=0; $i<$length; ++$i){
            $str.=$keyspace[random_int(0, $max)];
            }
        $user->password=Hash::make($str);
        $user->notify(new automaticPasswordNotification($str));
        }elseif($request->options == 'manual_password'){
            $user->password=Hash::make($request->password);
        }else{
            $user->password=$user->password;
        }
        $user->save();
    
        $user->syncRoles(explode(',', $request->roles_selected));
        return redirect()->route('users.show', $id);
// if(){
//     return redirect()->route('users.show', $user->id);
// }else{
//     Session::flash('danger', 'failed to edit the users infromation');
//     return redirect()->route('users.edit', $id);
// }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::find($id);
        if($user->delete()){
            return redirect()->route('users.index')->with('success', 'Deleted the user successfully!');
        }else{
            return redirect()->route('users.index')->with('danger', 'Failed to delete the user!!');
        }
    }

    // update user profile
    public function profile(){
       $user_id= Auth::user()->id;
       $user=User::where('id', $user_id)->with('file')->first();
       //$user=Auth::user()->with('file')->first();

       return view('manage.users.profile')->withUser($user);
    }
    public function profileUpdate(Request $request)
    {
        $user_id=Auth::user()->id;
        $request->validate([
        'name'=> 'required|max:255',
        'email'=>'required|email|unique:users,email,'.$user_id,
        'file_uploaded'=>'required|max:1999']);
        
        if($request->hasFile('file_uploaded')){
            // get file name and extension
            // Get file extension
            // file to store in db
            $file_name_with_extension=$request->file('file_uploaded')->getClientOriginalName();
            $file_name=pathinfo($file_name_with_extension, PATHINFO_FILENAME);
            $extension=$request->file('file_uploaded')->getClientOriginalExtension();
            $image_to_store=$file_name.'_Avatar'.time().$extension;
            $path=$request->file('file_uploaded')->storeAs('/public/AandStaff', $image_to_store);

        }else{
            $image_to_store='noimage.jpg';
        }
            
           $user_id=$user=Auth::user()->id;
           $user= User::where('id', $user_id )->first();
           $user->name=$request->name;
            $user->email=$request->email;
            if($request->options == 'auto_password'){
                $length=10;
                $keyspace='ABCDEFGHJKMNPQRTUVWXYZacdefghijkmpqrstuvwxyz12346789';
                $str='';
                $max=mb_strlen($keyspace, '8bit')-1;
                for($i=0; $i<$length; ++$i){
                $str.=$keyspace[random_int(0, $max)];
                }
            $user->password=Hash::make($str);
            $user->notify(new automaticPasswordNotification($str));
            }elseif($request->options == 'manual_password'){
                $user->password=Hash::make($request->password);
            }else{
                $user->password=$user->password;
            }
            $user->save();
            if($file= File::where('fileable_id', $user->id)->first()){
                $file->file_path=$image_to_store;
                $file->file_description="Avatar";
                $user->file()->save($file);
            }else{
                $file= new File();
                $file->file_path=$image_to_store;
                $file->file_description="Avatar";
                $user->file()->save($file);
            }
            
        //    $user->notify(new automaticPasswordNotification($str));
           return redirect()->route('user.profile')->with('success', 'updated details successfully!');

    }
}
