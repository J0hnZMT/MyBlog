<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use Auth;


class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        return view('index')
                ->with('title', Setting::first()->site_name)
                ->with('categories', Category::take(5)->get())
                ->with('first_post', Post::orderBy('created_at','desc')->first())
                ->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                ->with('third_post', Post::orderBy('created_at','desc')->skip(2)->take(2)->get()->first())
                ->with('first_cat', Category::take(1)->get()->first())
                ->with('second_cat', Category::skip(1)->take(1)->get()->first())
                ->with('third_cat', Category::skip(2)->take(1)->get()->first())
                ->with('settings', Setting::first())
                ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        $category=Category::find($id);
        return view('category')
                ->with('category',$category)
                ->with('title',$category->name)
                ->with('categories', Category::take(5)->get())
                ->with('settings', Setting::first())
                ->with('alltags',Tag::all())
                ;
    }
    public function tag($id)
    {
        $tags=Tag::find($id);
        return view('tags')
                ->with('all_tag',$tags)
                ->with('title',$tags->tag)
                ->with('categories', Category::take(5)->get())
                ->with('settings', Setting::first())
                ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    
    public function show($slug)
    {
        $post=Post::where('slug',$slug)->first();
        $next_id=Post::where('id','>',$post->id)->min('id');
        $prev_id=Post::where('id','<',$post->id)->max('id');
        return view('single')
                        ->with('post',$post)
                        ->with('title', $post->title)
                        ->with('categories', Category::take(5)->get())
                        ->with('settings', Setting::first())
                        ->with('next', Post::find($next_id))
                        ->with('prev', Post::find($prev_id))
                        ->with('alltags',Tag::all())
                        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
