<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function getlogin(){
    return view('admin/auth/login');
   }

   public function postlogin(Request $request){
      $request->validate([
         'email'=> 'required|email',
         'password'=> 'required',
      ]);

         $validated=auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'admin'=>1
         ]);
         if($validated){
            return redirect()->route('dashboard')->with('success', 'You are succefully loggen in');
         }else{
            return redirect()->back()->with('error', 'Invalid credentials');
         }
     }

     public function index(){
      
     }
}
