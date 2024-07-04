<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Contact;

class AdminProfileController extends Controller
{
    public function dashboard()
    {
        $posts = Post::paginate(5);
        $countposts=Post::count();
        $users= User::count();
        $contacts=Contact::count();

        return view('admin.dashboard', compact('posts','countposts','users', 'contacts'));
    }

    public function logout()
    {
       auth()->logout();
       return redirect()->route('getlogin')->with('success','you are logged out succesfully');
    }
}
