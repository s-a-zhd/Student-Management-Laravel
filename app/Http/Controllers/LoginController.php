<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class LoginController extends Controller
{
    public function index (Request $req){
        return view('login');
    }

    public function verify (Request $req){

        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|max:25|min:4',
        ]);

        $email = $req ->email;
        $password = $req ->password;
        $role = $req->role;

        $user = DB::table('registration')
                ->where('email',$email)
                ->where('password',$password)
                ->where('role',$role)
                ->first();

        if ($user !=null){
            if ($user->role == "Admin"){
                $notification=array(
                    'messege'=>'Successfully Logged in',
                    'alert-type'=>'success'
                     );
                     $req->session()->put('email' , $user->email);
                     $req->session()->put('role' , $user->role);
                return view('Admin.dashboard')->with ($notification);;
            }

            elseif ($user->role == "Teacher"){
                $notification=array(
                    'messege'=>'Successfully Logged in',
                    'alert-type'=>'success'
                     );
                     $req->session()->put('email' , $user->email);
                     $req->session()->put('role' , $user->role);
                return view('Admin.dashboard')->with ($notification);
            }

            elseif ($user->role == "Student"){
                $notification=array(
                    'messege'=>'Successfully Logged in',
                    'alert-type'=>'success'
                     );
                $req->session()->put('email' , $user->email);
                $req->session()->put('role' , $user->role);
                return view('Admin.dashboard')->with ($notification);
            }


           
            
        }
        else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
                 );
             return Redirect()->back()->with($notification);
        }

    }
}
