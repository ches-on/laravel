<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Contact;

class ContactController extends Controller
{
  // public function show(){
  //   return view('contact');
  // }

  public function store( Request $request){
   $data= $request->validate([
        'name'=> 'required',
        'email'=> 'email|required',
        'message'=>'required',
    ]);
    $name = $request->input('name');
    $email = $request->input('email');
    $message = $request->input('message');

    $contact = Contact::create($data);
    return redirect(route('welcome'));

    }
}
