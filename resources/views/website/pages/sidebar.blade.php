@php
    dd($Posts);
@endphp
<div id="sidebar" class="col-md-4">
    @include('website.pages.search')

    <div class="recent-post-container">
        <h4>Recent Posts</h4>

        @foreach($Posts as $post)
            <div class="recent-post">
                <a class="post-img" href="#">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"/>
                </a>
                <div class="post-content">
                    <h5><a href="{{ route('website.single', $post->id) }}">{{ $post->title }}</a></h5>
                    <span>
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <a href="{{ route('website.category', $post->category->id) }}">{{ $post->category->categories_name }}</a>
                    </span>
                    <span>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        {{ $post->created_at->format('d, M, Y') }}
                    </span>
                    <a class="read-more" href="{{ route('website.single', $post->id) }}">read more</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
