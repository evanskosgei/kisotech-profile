<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('home', compact('blogs'));
    }
    public function create()
    {
        return view('addblog');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'content' => 'required'
        ]);


        try {
            $request = Blog::create($request->all());
            return redirect()->back()->with([
                'status' => '200',
                'message' => 'Saved Sucessfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status' => '500',
            ], 500);
        }
    }
    public function edit($id)
    {
        $blogs = Blog::find($id);
        // dd($blogs);
        return view('edit', compact('blogs'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'content' => 'required'
        ]);
    
        try {
            $blog = Blog::findOrFail($id);
            $blog->update($validated);
            
            return redirect()->back()->with('success', 'Blog updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update blog. Please try again.');
        }
    }
    public function delete($id)
    {
        $blog = Blog::find($id);
        try {
            $blog->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status' => '500',
            ], 500);
        }
    }
}
