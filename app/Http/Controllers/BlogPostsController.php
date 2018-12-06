<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;


class BlogPostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blogs)
    {
        
        $blogs =\App\Blog::where('owner_id',auth()->id())->get();

         
    
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blogs)
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blog $blogs)
    {
        request()->validate(['title'=>['required','min:3'],
        'description'=>['required','min:3']   
       ]);
        $blogs->create([
            'id' => request('id'),
            'title' => request('title'),
            'description' => request('description'),
            'owner_id' => auth()->id()

        ]);
        // $blogs=new Blog();
        // $blogs->id=request('id');
        // $blogs->title=request('title');
        // $blogs->description=request('description');
        // $blogs->owner_id=auth()->id();
        // $blogs->save();
        return redirect('/blog');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if($blogs->owner_id !== auth()->id(),403);
            //   abort_if($blogs->owner_id !== auth()->id(),403);
           $blogs = Blog::findOrFail($id);
            // $blogs = Blog::where('owner_id'==auth()->id())->get();

            $this->authorize('view',$blogs);
            // dd($blogs->owner_id);

        return view('blog.show',compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('blog.edit',compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blogs =  Blog::findOrFail($id);
        $blogs->update(request(['title','description']));
        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);
        $blogs->delete();
        return redirect('/blog');
    }
}
