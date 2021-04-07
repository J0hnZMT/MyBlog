@extends('layouts.frontend')
@section('content')
<!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Category: {{$title}}</h1>
        </div>
    </div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
            <div class="case-item-wrap">
                @if($category->post->count() > 0)
                    @foreach($category->post as $posts)    
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="{{$posts->featured}}" alt="our case" >
                                </div>
                                <h6 class="case-item__title"><a href="{{route('single.post',['slug'=>$posts->slug])}}">{{$posts->title}}</a></h6>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                                <div class="case-item">
                                    <h6 class="case-item__title">No Post for the Category yet!</h6>
                                </div>
                            </div>

                        </div>
                @endif
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            

        </main>
    </div>
</div>
@endsection