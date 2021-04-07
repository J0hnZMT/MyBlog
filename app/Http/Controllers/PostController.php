<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Auth;
use App\Setting;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with('posts',Post::all())->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags=Tag::all();
        if($categories->count() == 0 || $tags->count() == 0)
        {
            toastr()->info('You must have a category and tags in order to create a post!');
            return redirect()->back();
        }
        return view('admin.post.create')->with('categories', $categories)->with('tags',$tags)->with('settings', Setting::first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'tags'=> 'required'

        ]);
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts/', $featured_new_name);
        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/'.$featured_new_name,
            'category_id'=>$request->category_id ,
            'user_id'=>$request->user_id ,
            'slug'=>str_slug($request->title)
        ]);
        $post->tags()->attach($request->tags);
        toastr()->success('You Successfully created new Post :)');
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.post.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all())->with('settings', Setting::first());
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
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',

        ]);
        $post=Post::find($id);
        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        toastr()->success('You Successfully updated the Post.');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        toastr()->success('You Successfully deleted permanently the Post.');
        return redirect()->back();
    }
    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts',$posts)->with('settings', Setting::first()); 
    }
    public function archive($id)
    {
        $post = Post::find($id);
        $post->delete();
        toastr()->success('You Successfully trashed the Post.');
        return redirect()->route('posts');
    } 
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        toastr()->success('You Successfully restore the Post.');
        return redirect()->route('posts');
    }
}
