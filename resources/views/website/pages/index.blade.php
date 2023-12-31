@extends('website.layouts.header')

@section('content')
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        @foreach ($post as $dat)
                            @if (is_object($dat))
                                <div class="post-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="post-img" href="{{ route('news-web.show', $dat->id ) }}"><img src="{{ asset('images/' . $dat->image) }}" alt="{{ $dat->title }}"/></a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="inner-content clearfix">
                                                <h3><a href='single.php'>{{ $dat->title }}</a></h3>
                                                <div class="post-information">
                                                    <span>
                                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                                        <a href='category.php'>{{ $dat->categories->categories_name }}</a>
                                                    </span>
                                                    <span>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ $dat->created_at->format('d, M, Y') }}
                                                    </span>
                                                </div>
                                                <p class="description">
                                                   @php
                                                       echo htmlspecialchars_decode(Str::limit($dat->description, 100));
                                                   @endphp
                                                </p>
                                                <a class='read-more pull-right' href='{{ route('news-web.show' , $dat->id) }}'>read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                                <ul class='pagination admin-pagination'>
                                    @for ($i = 1; $i <= $post->lastPage(); $i++)
                                        <li class="{{ ($post->currentPage() == $i) ? 'active' : '' }}">
                                            <a href="{{ $post->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                </ul>
                    </div><!-- /post-container -->
                </div>
                @include('website.pages.sidebar')
            </div>
        </div>
    </div>
@endsection
