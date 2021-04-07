@extends('layouts.frontend')
@section('content')
<!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tag: {{$title}}</h1>
        </div>
    </div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
            <div class="case-item-wrap">
                
                    @foreach($all_tag->posts as $posts)    
                        <div class="col-lg-4 col-md-2 col-sm-8 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{$posts->featured}}" alt="Featured_Image">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{route('single.post',['slug'=>$posts->slug])}}">{{$posts->title}}</a></h6>
                                
                                </div>
                            </div>
                        </div>
                    @endforeach
                
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            

        </main>
    </div>
</div>
@endsection