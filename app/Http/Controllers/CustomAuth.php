<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuth extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registeration(){
        return view("auth.registeration");
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $res=$user->save();
        if($res){
            return back()->with('success','Registered');
        }else{
            return back()->with('failed','something Wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        $user=User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                    $request->Session()->put('loginId',$user->id);
                    return redirect('dashboard');
            }else{
                return back()->with('failed','wrong Password');
            }
        }else{
            return back()->with('failed','Email Not registered');
        }
    }

    public function dashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view("dashboard",compact('data'));
    }
     public function logout(){
       if(Session ::has('loginId')){
             Session::pull('loginId');
             return redirect('login');
        }
    }
}
