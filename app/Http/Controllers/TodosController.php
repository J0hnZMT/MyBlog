<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\User;
use App\Todos;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $todo = new Todos;

        $todo->todos = $request->todos;
        $todo->user_id = $request->user_id;
        $todo->save();
        toastr()->success('Your task was Created.');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $todo = Todos::find($id);
        return view('todo_update')
                    ->with('todo',$todo)
                    ->with('settings', Setting::first())
                    ->with('post_count',Post::all()->count())
                    ->with('trash_count',Post::onlyTrashed()->get()->count())
                    ->with('category_count',Category::all()->count())
                    ->with('user_count',User::all()->count())
                    ->with('users',User::all())
                    ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todos::find($id);
        $todo->delete();
        toastr()->success('Your task was Deleted.');
        return redirect()->back();
    }
    public function save(Request $request, $id)
    {

        $todo = Todos::find($id);
        $todo->todos = $request->todos;
        $todo->save();
        toastr()->success( 'Your task was Updated.');
        return redirect()->route('home');
    }

    public function completed($id)
    {
        $todo = Todos::find($id);
        $todo->completed=1;
        $todo->save();
        toastr()->success('Your task was marsk as Completed.');
        return redirect()->back();

    }
}
