<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Facades\validate;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'content' => 'required'
        ]);


        try {
            $request = Blog::create($request->all());
            return response()->json([
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $data = Blog::all();
        if ($data->isEmpty()) {
            return response()->json([
                'status' => '404',
                'message' => 'No blogs found'
            ], 404);
        }
        return response()->json([
            'status' => '200',
            'data' => $data,
            'message' => 'blogs fetched sucessfully'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog,)
    {
        $blog = Blog::findOrFail($blog);
        if ($blog->isEmpty()) {
            return response()->json([
                'status' => '404',
                'message' => 'Blog not foung'
            ], 404);
        }
        return response()->json([
            'status' => '200',
            'data' => $blog,
            'message' => 'Fetch sucessfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated =  $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $data = Blog::findOrFail($blog);
        try {
            $data->update($validated);
            return response()->json([
                'status' => '200',
                'message' => 'updated sucessfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::findOrFail($blog);
        try {
            $blog->delete();
            return response()->json([
                'status' => '200',
                'message' => 'Deleted Sucessfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
