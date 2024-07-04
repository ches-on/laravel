<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function enable($id)
    {
        $user = User::find($id);
        $user->status = true;
        $user->save();

        return redirect()->back()->with('success', 'User enabled successfully.');
    }

    public function disable($id)
    {
        $user = User::find($id);
        $user->status = false;
        $user->save();

        return redirect()->back()->with('success', 'User disabled successfully.');
    }
}
