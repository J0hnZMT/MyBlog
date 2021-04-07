<?php

//frontend
Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/post/{slug}', 'FrontEndController@show')->name('single.post');
Route::get('/category/{id}', 'FrontEndController@category')->name('single.category');
Route::get('/tag/{id}', 'FrontEndController@tag')->name('single.tag');
Route::get('/results', function(){
    $posts=\App\Post::where('title','like','%'.request('query').'%')->get();
    return view('results')->with('posts', $posts)
                        ->with('title', 'Search results:'.request('query'))
                        ->with('categories', \App\Category::take(5)->get())
                        ->with('settings', \App\Setting::first())
                        ->with('query', request('query'))
    ;
});


Auth::routes();

Route::group(['prefix'=>'admin', "middleware"=>'auth'],function(){
    Route::get('/dashboard', 'HomeController@index')->name('home');

    //Posts
    Route::get('/post/create','PostController@create')->name('post.create');
    Route::post('/post/store','PostController@store')->name('post.store');
    Route::get('/posts','PostController@index')->name('posts');
    Route::get('/post/archive/{id}','PostController@archive')->name('post.archive');
    Route::get('/post/trash','PostController@trash')->name('post.trash');
    Route::get('/post/delete/{id}','PostController@destroy')->name('post.delete');
    Route::get('/post/restore/{id}','PostController@restore')->name('post.restore');
    Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
    Route::post('/post/update{id}','PostController@update')->name('post.update');

    //Category
    Route::get('/category/create','CategoriesController@create')->name('category.create');
    Route::post('/category/store','CategoriesController@store')->name('category.store');
    Route::get('/categories','CategoriesController@index')->name('categories');
    Route::get('/category/edit/{id}','CategoriesController@edit')->name('category.edit');
    Route::get('/category/delete/{id}','CategoriesController@destroy')->name('category.delete');
    Route::post('/category/update/{id}','CategoriesController@update')->name('category.update');

    //Tags
    Route::get('/tags/create','TagsController@create')->name('tag.create');
    Route::post('/tags/store','TagsController@store')->name('tag.store');
    Route::get('/tags','TagsController@index')->name('tags');
    Route::get('/tags/edit/{id}','TagsController@edit')->name('tag.edit');
    Route::get('/tags/delete/{id}','TagsController@destroy')->name('tag.delete');
    Route::post('/tags/update/{id}','TagsController@update')->name('tag.update');

    //users
    Route::get('/users/create','UsersController@create')->name('users.create');
    Route::post('/users/store','UsersController@store')->name('users.store');
    Route::get('/users','UsersController@index')->name('users');
    Route::get('/users/edit/{id}','UsersController@edit')->name('users.edit');
    Route::get('/users/delete/{id}','UsersController@destroy')->name('users.delete');
    Route::post('/users/update/{id}','UsersController@update')->name('users.update');
    Route::get('/users/admin/{id}','UsersController@admin')->name('users.admin');
    Route::get('/users/not-admin/{id}','UsersController@not_admin')->name('users.not.admin');
    Route::get('/users/profile','ProfilesController@index')->name('users.profile');
    Route::post('/users/profile/update','ProfilesController@update')->name('users.profile.update');

    //settings
    Route::get('/settings','SettingsController@index')->name('settings');
    Route::post('/settings/update','SettingsController@update')->name('settings.update');

    //todos
    Route::post('/todo/create','TodosController@create')->name('todos');
    Route::get('/todo/delete/{id}','TodosController@destroy')->name('todos.delete');
    Route::get('/todo/update/{id}','TodosController@update')->name('todos.update');
    Route::post('/todo/save/{id}','TodosController@save')->name('todos.save');
    Route::get('/todo/completed/{id}','TodosController@completed')->name('todos.complete');
});

