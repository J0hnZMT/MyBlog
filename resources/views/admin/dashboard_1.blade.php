@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>POSTS</h5>
                        </div>
                        <div class="card-body">
                            <h1>{{$post_count}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>CATEGORIES</h5>
                        </div>
                        <div class="card-body">
                            <h1>{{$category_count}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>TRASHED</h5>
                        </div>
                        <div class="card-body">
                            <h1>{{$trash_count}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>USER</h5>
                        </div>
                        <div class="card-body">
                            <h1>{{$user_count}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
            
            
       
@endsection
