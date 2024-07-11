<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(){
        $posts = Post::paginate(5);
        return view('admin.blog.sieve', compact('posts'));
    }

    public function great (Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'startdate' => 'required|date|before_or_equal:enddate',
            'enddate' => 'required|date|after_or_equal:startdate',
        ]);

        // Retrieve the validated start and end dates
        $startdate = $validatedData['startdate'];
        $enddate = $validatedData['enddate'];

        // Query the posts between the start and end dates
        $posts = Post::whereDate('created_at', '>=', $startdate)
            ->whereDate('created_at', '<=', $enddate)
            ->paginate(5);

        // Return the view with the filtered posts
        return view('admin.blog.sieve', compact('posts'));
    }

    public function filter(Request $request)
    {
        // Validate the request to ensure dates are in the correct format
        $request->validate([
            'startdate' => 'nullable|date',
            'enddate' => 'nullable|date|after_or_equal:startdate',
        ]);

        // Initialize the query
        $posts = Post::query();

        // Add conditions for start date and end date
        if ($request->has('startdate') && $request->startdate != null) {
            $posts->whereDate('created_at', '>=', $request->startdate);
        }

        if ($request->has('enddate') && $request->enddate != null) {
            $posts->whereDate('created_at', '<=', $request->enddate);
        }

        // Paginate the results
        $posts = $posts->paginate(5);

        // Return the view with the filtered posts
        return view('admin.blog.sieve', compact('posts'));
    }

}
