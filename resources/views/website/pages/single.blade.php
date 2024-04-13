@extends('website.layouts.header')

@section('content')
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3>{{ $post->title ?? '' }}</h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    {{ $post->categories->categories_name ?? '' }}
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{ $post->created_at->format('d, M, Y')}}
                                </span>
                            </div>

                            @if(isset($post->image))
                                <img class="single-feature-image" src="{{ $post->image }}" alt="{{ $post->title }}"/>
                            @endif
                            <p class="description">
                                {{ $post->description ?? ''}}
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                @include('website.pages.sidebar')
            </div>
        </div>
    </div>
@endsection
