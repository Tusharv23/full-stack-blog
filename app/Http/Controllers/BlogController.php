<?php

namespace App\Http\Controllers;

use App\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = blog::all();
        return view('show', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new blog;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->author = $request->input('author');
        $blog->save();
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,blog $blog)
    {
        $id  = $request->input('blog_id');
        $blog = blog::where('id',$id)->first();
        return view('edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        $blog = blog::where('id',$request->input('blog_id'))->update(['title'=>$request->input('title'), 'description'=>$request->input('description'), 'author'=>$request->input('author')]);
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,blog $blog)
    {
        $blogId = $request->input('blog_id');
        blog::where('id',$blogId)->delete();
        return redirect('/blogs');
    }
}
