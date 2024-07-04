<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class InquiryController extends Controller
{
  public function show(){
    $inquiries=Contact::all();
    return view('admin.users.contacts',compact('inquiries'));
}
  
}