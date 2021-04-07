<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\User;
use App\Todos;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard')
                            ->with('settings', Setting::first())
                            ->with('post_count',Post::all()->count())
                            ->with('trash_count',Post::onlyTrashed()->get()->count())
                            ->with('category_count',Category::all()->count())
                            ->with('user_count',User::all()->count())
                            ->with('users',User::all())
                            ->with('todos',Todos::all())
                            ;
    }
}
