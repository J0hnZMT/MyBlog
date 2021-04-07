@extends('layouts.frontend')
@section('content')
<!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Search Results: {{$query}}</h1>
        </div>
    </div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
            @if($posts->count() > 0)
                <div class="case-item-wrap">
                    
                        @foreach($posts as $posts)    
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
            @else
                <div class="case-item-wrap">
                    
                      
                        <div class="text-center">
                                <div class="case-item">
                                    
                                    <h2 class="case-item__title">No results found!</h2>
                                
                                </div>
                            </div>
                        </div>
                
                </div>
            @endif

            <!-- End Post Details -->
            
            

        </main>
    </div>
</div>
@endsection