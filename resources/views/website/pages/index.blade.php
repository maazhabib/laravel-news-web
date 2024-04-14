@extends('website.layouts.header')

@section('content')
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        @forelse ($posts as $post)
                            @if (is_object($post))
                                <div class="post-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="post-img"
                                               href="{{ route('news-web.show', encrypt($post->id) ) }}"><img
                                                    src="{{ $post->image }}" alt="{{ $post->title }}"/></a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="inner-content clearfix">
                                                <h3><a href='single.php'>{{ $post->title ?? '-'}}</a></h3>
                                                <div class="post-information">
                                                    <span>
                                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                                        <a href='category.php'>{{ $post->categories->categories_name ?? '-'}}</a>
                                                    </span>
                                                    <span>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ $post->created_at->format('d, M, Y') ?? '-'}}
                                                    </span>
                                                </div>
                                                <p class="description">{{ implode(' ', array_slice(explode(' ', $post->description) , 0, 40)) }}
                                                    ...</p>

                                                <a class='read-more pull-right'
                                                   href='{{ route('news-web.show' , encrypt($post->id)) }}'>read
                                                    more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h3>Unfortunately, there is currently no news available.</h3>
                        @endforelse

                        <ul class='pagination admin-pagination'>
                            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                <li class="{{ ($posts->currentPage() == $i) ? 'active' : '' }}">
                                    <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <!-- /post-container -->
                </div>
                @include('website.pages.sidebar')
            </div>
        </div>
    </div>
@endsection
