@extends('website.layouts.header')

@section('content')
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        @forelse ($post as $posts)
                            @if (is_object($posts))
                                <div class="post-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="post-img" href="{{ route('news-web.show', encrypt($posts->id) ) }}"><img
                                                    src="{{ $posts->image }}" alt="{{ $posts->title }}"/></a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="inner-content clearfix">
                                                <h3><a href='single.php'>{{ $posts->title ?? '-'}}</a></h3>
                                                <div class="post-information">
                                                    <span>
                                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                                        <a href='category.php'>{{ $posts->categories->categories_name ?? '-'}}</a>
                                                    </span>
                                                    <span>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ $posts->created_at->format('d, M, Y') ?? '-'}}
                                                    </span>
                                                </div>
                                                <p class="description">{{ implode(' ', array_slice(explode(' ', $posts->description) , 0, 40)) }}
                                                    ...</p>

                                                <a class='read-more pull-right'
                                                   href='{{ route('news-web.show' , encrypt($posts->id)) }}'>read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h3>Unfortunately, there is currently no news available.</h3>
                        @endforelse

                        @if($post->count() >= 4)
                            <ul class='pagination admin-pagination'>
                                @for ($i = 1; $i <= $post->lastPage(); $i++)
                                    <li class="{{ ($post->currentPage() == $i) ? 'active' : '' }}">
                                        <a href="{{ $post->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                            </ul>
                        @endif
                    </div>
                    <!-- /post-container -->
                </div>
                @include('website.pages.sidebar')
            </div>
        </div>
    </div>
@endsection
